<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
class RegisterRequest extends FormRequest
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
    public function rules()
    {
      return  [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','numeric'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'service_id' => ['required','array'],
      ];
    }

    public function messages()
    {
        return  [
            'name.required' => 'Name is Required',
            'email.required' => 'Email is Required',
            'phone.required' => 'Phone is Required',
            'password.required' => 'Password is Required',
            'service_id.required' => 'Service is Required',
            
      ];
    }
}
