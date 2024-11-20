<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'category_name' => 'required|string|max:50|unique:categories,name',
        ];
    }

    public function messages(): array
    {
        return [
            'category_name.required' => 'カテゴリ名が入力されていません',
            'category_name.unique' => 'すでに登録済みのカテゴリです',
        ];
    }
}
