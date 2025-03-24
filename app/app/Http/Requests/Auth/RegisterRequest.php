<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:1|max:10',
            'email' => 'required|email|string|unique:users',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->numbers(),
            ],
            'icon' => 'image|mimes:jpeg,png,gif,jpg|max:4096',
        ];
    }

    public function messages(): array
    {
        return[
            'name.required' => '名前は必須です',
            'name.min' => '名前は1文字以上で入力してください',
            'name.max' => '名前は10文字以内で入力してください',

            'email.required' => 'メールアドレスは必須です',
            'email.email' => 'メールアドレスの形式が正しくありません',
            'email.unique' => '既に存在しているメールアドレスです',

            'password.required' => 'パスワードは必須です',
            'password.confirmed' => 'パスワードが一致しません',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.*' => 'パスワードは8文字以上、大文字・小文字・数字を含めてください',

            'icon.image' => 'アイコンは画像ファイルを選択してください',
            'icon.mimes' => 'アイコンはjpeg,png,gif,jpgのいずれかの形式にしてください',
            'icon.max' => 'アイコンのサイズは2MB以下にしてください'
        ];
    }
}
