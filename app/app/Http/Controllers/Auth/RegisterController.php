<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\PcList;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterView():View
    {
        return view('auth/register');
    }

    public function register(RegisterRequest $request):RedirectResponse
    {
        // ユーザの作成。ファイルをアップロードしない場合、デフォルトで登録
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'icon' => $request->file('icon') ? $request->file('icon')->store('icons','public') : 'images/default-icon.png'
        ]);

        // デフォルトでpcListを全てのユーザに5つ持たせる
        for ($i=1; $i <= 5  ; $i++) {
            PcList::create([
                'user_id' => $user->id,
                'name' => 'デフォルト' . $i,
                'price' => 0,
            ]);
        }

        // ユーザーイベントの発火。メール認証などしたいときに使う
        event(new Registered($user));

        // ユーザをログイン状態にする
        Auth::login($user);

        // ホームページにリダイレクト
        return redirect()->route('app.home');
    }
}
