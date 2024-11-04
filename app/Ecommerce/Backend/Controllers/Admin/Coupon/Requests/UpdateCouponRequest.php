<?php

namespace Ecommerce\Backend\Controllers\Admin\Coupon\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
{
    private const NAME_RULES = ['required', 'max:200'];
    private const CODE_RULES = ['required', 'max:200'];
    private const QUANTITY_RULES = ['required', 'integer'];
    private const MAX_USE_RULES = ['required', 'integer'];
    private const START_DATE_RULES = ['required'];
    private const END_DATE_RULES = ['required'];
    private const DISCOUNT_TYPE_RULES = ['required', 'max:200'];
    private const DISCOUNT_RULES = ['required', 'integer'];
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
            'name' => self::NAME_RULES,
            'code' => self::CODE_RULES,
            'quantity' => self::QUANTITY_RULES,
            'max_use' => self::MAX_USE_RULES,
            'start_date' => self::START_DATE_RULES,
            'end_date' => self::END_DATE_RULES,
            'discount_type' => self::DISCOUNT_TYPE_RULES,
            'discount' => self::DISCOUNT_RULES,
            'status' => self::STATUS_RULES,
        ];
    }
}
