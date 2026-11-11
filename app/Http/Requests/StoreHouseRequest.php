<?php

namespace App\Http\Requests;

use App\Enums\HouseListing;
use App\Enums\Status;
use App\Models\Company;
use App\Models\House;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreHouseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
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

    protected function houseRules(): array
    {
        $rules = [
            'listing_type' => ['required', Rule::in([HouseListing::RENT, HouseListing::SALE])],
            'price' => ['required', 'numeric', 'min:0'],
            'price_period' => [
                'nullable',
                Rule::requiredIf(fn () => $this->input('listing_type') === HouseListing::RENT),
                Rule::in([House::PERIOD_NIGHT, House::PERIOD_MONTH]),
            ],
            'bedrooms' => ['required', 'integer', 'min:0', 'max:100'],
            'bathrooms' => ['required', 'integer', 'min:0', 'max:100'],
            'area_sqm' => ['nullable', 'numeric', 'min:0'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'active' => ['nullable', 'boolean'],
            'header' => ['nullable', 'image', 'max:4096'],
            'image1' => ['nullable', 'image', 'max:4096'],
            'image2' => ['nullable', 'image', 'max:4096'],
            'image3' => ['nullable', 'image', 'max:4096'],
            'en.title' => ['required', 'string', 'max:255'],
            'en.description' => ['nullable', 'string'],
            'en.meta_description' => ['nullable', 'string', 'max:255'],
            'en.meta_keywords' => ['nullable', 'string', 'max:255'],
            'el.title' => ['nullable', 'string', 'max:255'],
            'el.description' => ['nullable', 'string'],
            'el.meta_description' => ['nullable', 'string', 'max:255'],
            'el.meta_keywords' => ['nullable', 'string', 'max:255'],
        ];

        $house = $this->route('house');
        if ($house instanceof House) {
            $rules['listing_type'][] = function ($attribute, $value, $fail) use ($house) {
                if ($value === $house->listing_type) {
                    return;
                }

                $open = $house->bookings()
                    ->whereIn('status', [Status::PENDING, Status::COMPLETED])
                    ->exists();

                if ($open) {
                    $fail('Cancel open bookings before changing rent or sale.');
                }
            };
        }

        return $rules;
    }
}
