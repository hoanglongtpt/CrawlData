<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CorrectCurrentPassword;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class ChangePasswordMemberRequest extends FormRequest
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
            'old_password' => ['required', 'string', new CorrectCurrentPassword],
            'new_password' => 'required|string|digits:6',
            'confirm_password' => 'required|string|same:new_password',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => __('messages.old_password_required'),
            'new_password.required' => __('messages.new_password_required'),
            'new_password.digits' => __('messages.new_password_digits'),
            'confirm_password.required' => __('messages.confirm_password_required'),
            'confirm_password.same' => __('messages.confirm_password_same'),
        ];
    }
}
