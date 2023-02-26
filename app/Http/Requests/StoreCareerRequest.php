<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|email:rfc,dns',
            'country' => 'required|max:255',
            'streetAddress' => 'required|max:255',
            'city' => 'required|max:255',
            'region' => 'required|max:255',
            'postalCode' => 'required|numeric',
            'phoneNumber' => 'required|numeric',
            'referredVia' => 'required|max:255',
            'optInMarketing' => 'required|boolean',
            'acceptedTermsAndConditions' => 'required|boolean',
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
            'referredVia.required' => 'The referral field is required',
        ];
    }
}
