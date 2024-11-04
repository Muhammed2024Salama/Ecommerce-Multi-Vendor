<?php

namespace Ecommerce\Backend\Controllers\Admin\ChildCategory\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChildCategoryRequest extends FormRequest
{
    private const CATEGORY_RULES = ['required'];
    private const SUB_CATEGORY_RULES = ['required'];
    private const NAME_RULES = ['required', 'max:200', 'unique:child_categories,name,{id}'];
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
            'category' => self::CATEGORY_RULES,
            'sub_category' => self::SUB_CATEGORY_RULES,
            'name' => str_replace('{id}', $this->route('id'), self::NAME_RULES),
            'status' => self::STATUS_RULES,
        ];
    }
}
