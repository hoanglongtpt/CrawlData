<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserAdminRequet extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required',
            'account_balance' => 'required|numeric|min:0.0',
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
            'email.required' => 'Vui lòng nhập email.',
            'name.required' => 'Vui lòng nhập tên.',
            'account_balance.numeric' => __('messages.account_balance_numeric'),
            'account_balance.min' => __('messages.account_balance_min')
        ];
    }
}
