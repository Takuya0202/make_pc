<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ユーザー一覧を表示
    public function showUsersView():View
    {
        $users = User::all();

        return view('admin/users/index',compact('users'));
    }

    // ユーザー詳細の表示
    public function showUserView(string $user_id):View
    {
        $user = User::with(['reviews'])
            ->findOrFail($user_id);

        return view('admin/users/show',compact('user'));
    }
}
