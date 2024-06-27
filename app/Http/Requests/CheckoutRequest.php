<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        $verifiedEmail = auth()->user() ? ['required', 'email'] : ['require', 'email', 'unique:users'];

        return [
            'email' => $verifiedEmail,
            'first_name' => 'required',
            'address'=> 'required',
            'city' => 'required',
            'last_name' => 'required',
            'country' => 'required',
            'phone' => 'required'
        ];
    }

      public function messages()
      {
        return [
            'email.unique' => 'You already have an account with this email address. Please <a href="/login" >login</a> to continue.',
        ];
      }
}
