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

    // ユーザー情報検索
    public function search(Request $request):View
    {
        $name = $request->input('name');
        $sort = $request->input('sort');
        $query = User::query();

        // 名前検索
        if (!empty($name)) {
            $query->where('name' , 'like' , '%' . $name . '%');
        }

        // ソート 新しい順
        if ($sort == 'created_desc') {
            $query->orderBy('created_at','desc');
        } // 古い順
        elseif ($sort == 'created_asc') {
            $query->orderBy('created_at' , 'asc');
        } // 管理者のみを表示
        elseif ($sort == 'admin') {
            $query->where('is_admin',true);
        }

        $users = $query->get();

        return view('admin/users/index',compact('users'));
    }
}
