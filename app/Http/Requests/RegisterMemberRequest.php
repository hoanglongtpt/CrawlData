<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterMemberRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Trường yêu cầu',
            'email' => 'Phải là định dạng email',
            'max' => 'Tối đa 255 kí tự',
            'min' => 'Tối thiểu 6 kí tự',
            'accepted' => 'Vui lòng chấp nhận điều khoản trước khi sử dụng',
        ];
    }
}
