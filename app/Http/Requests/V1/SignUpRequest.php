<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'confirmPassword' => ['required', 'same:password'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'confirm_password' => $this->confirmPassword
        ]);
    }
}
