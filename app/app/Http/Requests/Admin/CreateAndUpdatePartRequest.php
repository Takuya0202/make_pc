<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateAndUpdatePartRequest extends FormRequest
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
            'name' => 'required|string|min:1|max:50',
            'detail' => 'required|string|min:1',
            'price' => 'required|numeric',
            'url' => 'required|url',
            'category_id' => 'required|exists:categories,id',
            'maker_id' => 'required|exists:makers,id',
            'image' => 'nullable|image|mimes:jpeg,png,gif,jpg|max:4096',
        ];
    }

    public function messages():array
    {
        return [
            'name.required' => 'パーツ名は必須です',
            'name.min' => 'パーツ名は１文字以上です',
            'name.max' => 'パーツ名は50文字以下です',

            'detail.required' => 'パーツ説明は必須です',
            'detail.min' => 'パーツ説明は１文字以上です',

            'price.required' => '価格は必須です',
            'price.numeric' => '価格は整数型にしてください',

            'url.required' => 'パーツurlは必須です',
            'url.url' => 'urlが正しくないです',

            'category_id.required' => 'カテゴリーは必須です',
            'category_id.exists' => 'カテゴリーが存在しません',

            'maker_id.required' => 'メーカーは必須です',
            'maker_id.exists' => 'メーカーが存在しません',

            'image.image' => 'イメージは画像ファイルを選択してください',
            'image.mimes' => 'イメージはjpeg,png,gifのいずれかの形式にしてください',
            'image.max' => 'イメージのサイズは4MB以下にしてください'
        ];
    }
}
