<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;

class AddPartToListRequest extends FormRequest
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
            'pc_list_id' => 'required|exists:pc_lists,id',
            'part_id' => 'required|exists:parts,id',
            'quantity' => 'required|integer|min:1'
        ];
    }

    public function messages():array
    {
        return [
            'pc_list_id.required' => 'リストidは必須です.',
            'pc_list_id.exists' => '選択されたリストが存在しません。',

            'part_id.required' => 'パーツidは必須です。',
            'part_id.exists' => '選択された商品が存在しません。',

            'quantity.required' => '数量を選択してください。',
            'quantity.min' => '数量は１以上を選択してください。'
        ];
    }
}
