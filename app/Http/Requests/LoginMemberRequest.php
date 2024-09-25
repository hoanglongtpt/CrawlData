<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginMemberRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:20',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Trường yêu cầu',
            'email' => 'Phải là định dạng email',
            'email.max' => 'Tối đa 255 kí tự',
            'password.min' => 'Tối thiểu 6 kí tự',
            'password.max' => 'Tối đa 20 kí tự',
        ];
    }
}
