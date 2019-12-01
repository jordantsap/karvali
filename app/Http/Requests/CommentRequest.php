<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
        $emailValidation = auth()->user() ? 'required|email' : 'required|email|unique:users';

        return [
            'email' => $emailValidation,
            'comment' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'You already have an account with this email address. Please <a href="customer/login">login</a> to continue.',
        ];
    }
}
