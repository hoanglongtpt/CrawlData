<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageDownloadRequest extends FormRequest
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
            'type' => 'required|string|max:255',  // 'type' phải có, là chuỗi, và tối đa 255 ký tự
            'name' => 'required|string|max:255',  // 'name' phải có, là chuỗi, và tối đa 255 ký tự
            'amount' => 'required|numeric|min:0', // 'amount' phải có, là số và không nhỏ hơn 0
            'link_login' => 'required|url',       // 'link_login' phải có, và phải là một URL hợp lệ
        ];
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'type.required' => 'Trường loại là bắt buộc.',
            'name.required' => 'Trường tên là bắt buộc.',
            'amount.required' => 'Trường số lượng là bắt buộc.',
            'amount.numeric' => 'Trường số lượng phải là số.',
            'link_login.required' => 'Trường liên kết đăng nhập là bắt buộc.',
            'link_login.url' => 'Trường liên kết đăng nhập phải là một URL hợp lệ.',
        ];
    }
}
