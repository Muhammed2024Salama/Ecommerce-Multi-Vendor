<?php

namespace Ecommerce\Backend\Controllers\Admin\BlogCategory\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogCategoryRequest extends FormRequest
{
    private const NAME_RULES = ['required', 'max:200', 'unique:blog_categories'];
    private const STATUS_RULES = ['required'];

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
            'name' => self::NAME_RULES,
            'status' => self::STATUS_RULES,
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.unique' => 'Category already exists!',
        ];
    }
}

