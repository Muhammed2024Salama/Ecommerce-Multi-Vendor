<?php

namespace Ecommerce\Backend\Controllers\Admin\FooterSocial\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFooterSocialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'icon' => ['required', 'max:200'],
            'name' => ['required', 'max:200'],
            'url' => ['required', 'active_url'],
            'status' => ['required'],
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'icon.required' => 'The icon field is required.',
            'icon.max' => 'The icon may not be greater than 200 characters.',
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 200 characters.',
            'url.required' => 'The URL field is required.',
            'url.active_url' => 'The URL must be a valid and active URL.',
            'status.required' => 'The status field is required.',
        ];
    }
}
