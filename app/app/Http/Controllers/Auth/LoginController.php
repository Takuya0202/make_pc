<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm():View
    {
        return view('auth/login');
    }

    public function login(LoginRequest $request)
    {
        // emailとpasswordを取得
        $credentials = $request->only('email','password');

        // 受け取ったパラメータから認証する
        if (Auth::attempt($credentials)) {
            // セッションを再度生成し、リダイレクト
            $request->session()->regenerate();
            return redirect()->route('app.home');
        }
        // ログインに失敗した時
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが違います'
        ]);
    }
}
