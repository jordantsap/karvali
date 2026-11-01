<?php

namespace App\Http\Requests;

use App\Enums\HouseListing;
use App\Models\House;
use Illuminate\Foundation\Http\FormRequest;

class StoreHouseBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $house = $this->route('house');
        $forRent = $house instanceof House && $house->isForRent();

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'message' => ['nullable', 'string', 'max:2000'],
            'guests' => [$forRent ? 'required' : 'nullable', 'integer', 'min:1', 'max:100'],
            'offer_price' => ['nullable', 'numeric', 'min:0'],
            'check_in_date' => [$forRent ? 'required' : 'nullable', 'date'],
            'check_out_date' => [
                $forRent ? 'required' : 'nullable',
                'date',
                'after:check_in_date',
            ],
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $house = $this->route('house');
            if (!$house instanceof House) {
                return;
            }

            if ($house->isForSale() && $this->filled('check_in_date') && !$this->filled('check_out_date')) {
                $validator->errors()->add('check_out_date', 'Add a viewing end date or leave both dates empty.');
            }

            if ($house->listing_type === HouseListing::RENT && (int) $this->input('guests') < 1) {
                $validator->errors()->add('guests', 'Tell the company how many guests will stay.');
            }
        });
    }
}
