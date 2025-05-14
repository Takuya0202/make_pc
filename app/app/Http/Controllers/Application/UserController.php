<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // ログインユーザの表示
    public function showUserView():View
    {
        $user = Auth::user();

        return view('app/user',compact('user'));
    }

    // 更新
    public function update(UpdateUserRequest $request , string $user_id):RedirectResponse
    {
        $user = User::findOrFail($user_id);
        // 受け取ったデータを連想配列にする
        $data = $request->validated();
        // 画像が更新された場合はリクエストから取得。存在しなかったらそのままにする
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('icons' , 'public');
        } else {
            $data['icon'] = $user->icon;
        }
        $user->update($data);

        return redirect()->route('app.home');
    }
}
