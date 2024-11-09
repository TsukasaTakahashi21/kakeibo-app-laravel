<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpendingRequest extends FormRequest
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
            'spending_name' => 'required|string|max: 50',
            'category_name' => 'required|',
            'amount' => 'required|integer',
            'date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'spending_name.required' => '支出名が入力されていません',
            'category_name.required' => 'カテゴリーが選択されていません',
            'amount.required' => '金額が入力されていません',
            'date.required' => '日付が入力されていません',
        ];
    }
}
