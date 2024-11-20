<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomeRequest extends FormRequest
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
            'income_source' => 'required|exists:income_sources,id',
            'amount' => 'required|integer',
            'date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'income_source.required' => '収入源が選択されていません',
            'income_source.exists' => '選択された収入源が存在しません',
            'amount.required' => '金額が入力されていません',
            'date.required' => '日付が入力されていません',
        ];
    }
}
