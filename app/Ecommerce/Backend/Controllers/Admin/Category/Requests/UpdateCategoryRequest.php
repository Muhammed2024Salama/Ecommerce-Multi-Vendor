<?php

namespace Ecommerce\Backend\Controllers\Admin\Category\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    private const ICON_RULES = ['required', 'not_in:empty'];
    private const NAME_RULES = ['required', 'max:200', 'unique:categories,name,{id}'];
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
            'icon' => self::ICON_RULES,
            'name' => str_replace('{id}', $this->route('id'), self::NAME_RULES),
            'status' => self::STATUS_RULES,
        ];
    }
}
