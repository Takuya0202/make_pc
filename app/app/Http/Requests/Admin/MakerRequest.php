<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MakerRequest extends FormRequest
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
            'name' => 'required|max:16|unique:makers,name'
        ];
    }

    public function messages():array
    {
        return [
            'name.required' => 'メーカー名は必須です',
            'name.max' => 'メーカー名は16文字以下で入力してください',
            'name.unique' => 'このメーカー名はすでに存在しています'
        ];
    }
}
