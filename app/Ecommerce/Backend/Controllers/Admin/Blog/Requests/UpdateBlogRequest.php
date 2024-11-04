<?php

namespace Ecommerce\Backend\Controllers\Admin\Blog\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{
    private const IMAGE_RULES = ['nullable', 'image', 'max:3000'];
    private const TITLE_RULES = 'required|max:200|unique:blogs,title';
    private const CATEGORY_RULES = ['required'];
    private const DESCRIPTION_RULES = ['required'];
    private const SEO_TITLE_RULES = ['nullable', 'max:200'];
    private const SEO_DESCRIPTION_RULES = ['nullable', 'max:200'];

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
        $id = $this->route('id'); // Assuming the route parameter is 'id'

        return [
            'image' => self::IMAGE_RULES,
            'title' => self::TITLE_RULES . ",$id",
            'category' => self::CATEGORY_RULES,
            'description' => self::DESCRIPTION_RULES,
            'seo_title' => self::SEO_TITLE_RULES,
            'seo_description' => self::SEO_DESCRIPTION_RULES,
        ];
    }
}
