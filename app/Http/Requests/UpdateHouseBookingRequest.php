<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateHouseBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        $booking = $this->route('houseBooking');

        return $booking
            && auth()->check()
            && (int) $booking->house->company->user_id === (int) auth()->id();
    }

    public function rules(): array
    {
        return [
            'decision' => ['required', Rule::in(['accept', 'cancel'])],
        ];
    }
}
