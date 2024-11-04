<?php

namespace Ecommerce\Backend\Controllers\Admin\Brand\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    private const LOGO_RULES = ['required', 'image', 'max:2000'];
    private const NAME_RULES = ['required', 'max:200'];
    private const IS_FEATURED_RULES = ['required'];
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
            'logo' => self::LOGO_RULES,
            'name' => self::NAME_RULES,
            'is_featured' => self::IS_FEATURED_RULES,
            'status' => self::STATUS_RULES,
        ];
    }
}
