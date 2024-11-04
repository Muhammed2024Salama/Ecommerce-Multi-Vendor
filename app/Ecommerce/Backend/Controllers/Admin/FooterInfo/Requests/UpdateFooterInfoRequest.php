<?php

namespace Ecommerce\Backend\Controllers\Admin\FooterInfo\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFooterInfoRequest extends FormRequest
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
            'logo' => ['nullable', 'image', 'max:3000'],
            'phone' => ['nullable', 'max:100'], // added nullable for consistency
            'email' => ['nullable', 'max:100'],
            'address' => ['nullable', 'max:300'],
            'copyright' => ['nullable', 'max:200'],
        ];
    }

}
