<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCompanyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {

        $rules = [
            'en.title' => 'required',
            'en.meta_description' => 'required',
            'en.meta_keywords'=>'required',
            'en.manager'=>'required',
            'en.description'=>'required',
            'website'=>'',
            'user_id' => [
                // The user_id should be the authenticated user's ID
                Rule::in([auth()->id()])
            ],
            'email' =>'required|email',
            'telephone' => ['nullable'],//, 'regex:/^(?:(?:\+|00)30|030)?\d{10}$/'],
            'facebook'=>'',
            'twitter' => '',
            'company_type' => 'integer',
            'active' => 'integer',
            'days' => 'required|array',
            'open_times' => 'array',
            'close_times' => 'array',
//            'open_times.*.*' => 'nullable|required_with:days.*|date_format:H:i',
//            'close_times.*.*' => 'nullable|required_with:days.*|date_format:H:i|after:open_times.*.*',
            'header'=>'image|nullable',
            'logo'=>['image','nullable'],
            'image1'=>['image','nullable'],
            'image2'=>['image','nullable'],
            'image3'=>['image','nullable'],
            'imgfile.*'=>['image','sometimes'],
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.title'] = 'string';
            $rules[$locale . '.meta_description'] = 'string';
            $rules[$locale . '.meta_keywords'] = 'string';
            $rules[$locale . '.manager'] = 'string';
            $rules[$locale . '.description'] = 'string';
        }

        return $rules;
    }
}
