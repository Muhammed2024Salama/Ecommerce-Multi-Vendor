<?php

namespace Ecommerce\Backend\Controllers\Admin\FooterGridTwo\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFooterGridTwoRequest extends FormRequest
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
            'name' => ['required', 'max:200'],
            'url' => ['required', 'url'],
            'status' => ['required'],
        ];
    }

}
