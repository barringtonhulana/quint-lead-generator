<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCareerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email:rfc,dns',
            'country' => 'required|max:255',
            'street_address' => 'required|max:255',
            'city' => 'required|max:255',
            'region' => 'required|max:255',
            'postal_code' => 'required|numeric',
            'phone_number' => 'required|numeric',
            'referred_via' => 'required|max:255',
            'opt_in_marketing' => 'required|boolean',
            'accepted_terms_and_conditions' => [
                'required',
                'boolean',
                Rule::in([true])
            ],
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array<string, string>
    */
    public function messages(): array
    {
        return [
            'referred_via.required' => 'The referral field is required',
        ];
    }
}
