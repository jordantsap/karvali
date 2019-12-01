<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $emailValidation = auth()->guard('customer')->user() ? 'required|email' : 'required|email|unique:customers';

        return [
            'email' => $emailValidation,
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postalcode' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'You already have an account with this email address. Please <a href="customer/login">login</a> to continue.',
        ];
    }
}
