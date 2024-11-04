<?php

namespace Ecommerce\Backend\Controllers\Admin\CashOnDelivery\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCodSettingRequest extends FormRequest
{
    private const STATUS_RULES = ['required', 'integer'];

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
            'status' => self::STATUS_RULES,
        ];
    }
}
