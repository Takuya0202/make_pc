<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
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
            'body' => 'nullable|string|max:2048',
            'rating' => 'required|integer|min:1|max:5',
        ];
    }

    public function messages(): array
    {
        return [
            'body.max' => 'レビューは2048文字以内で入力してください。',

            'rating.required' => '評価は必須項目です。',
            'rating.integer' => '評価は整数で入力してください。',
            'rating.min' => '評価は最低１以上にしてください。',
            'rating.max' => '評価は５以下にして下さい。',
        ];
    }
}
