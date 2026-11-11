<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Validation\Rule;

class UpdateHouseRequest extends StoreHouseRequest
{
    public function authorize(): bool
    {
        $house = $this->route('house');

        return $house
            && auth()->check()
            && (int) $house->company->user_id === (int) auth()->id();
    }

    public function rules(): array
    {
        return array_merge($this->houseRules(), [
            'company_id' => [
                'required',
                Rule::exists('companies', 'id')->where(fn ($query) => $query->where('user_id', auth()->id())),
                function ($attribute, $value, $fail) {
                    $company = Company::with('category.translations')->find($value);
                    if (!$company || !$company->isRentalCompany()) {
                        $fail('Houses can only be listed by a rental company you created.');
                    }
                },
            ],
        ]);
    }
}
