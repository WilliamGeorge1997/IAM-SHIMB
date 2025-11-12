<?php

namespace Modules\User\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed'],
            'phone' => ['nullable', 'string', 'max:255', 'unique:users,phone'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:1024'],
            'identity_number' => ['nullable', 'string', 'unique:users,identity_number'],
            'username' => ['nullable', 'string', 'unique:users,username'],
            'national_number' => ['nullable', 'string', 'unique:users,national_number'],
            'birth_date' => ['nullable', 'date'],
            'file' => ['nullable', 'file', 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx', 'max:1024'],

        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'email' => 'Email Address',
            'password' => 'Password',
            'phone' => 'Phone',
            'image' => 'Image',
            'identity_number' => 'Identity Number',
            'username' => 'Username',
            'national_number' => 'National Number',
            'birth_date' => 'Birth Date',
            'file' => 'File',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            returnValidationMessage(
                false,
                trans('validation.rules_failed'),
                $validator->errors()->messages(),
                'unprocessable_entity'
            )
        );
    }
}
