<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // userのシーダー作成。アイコン以外はファクトリを使用
        User::factory()->count(5)->create(['icon' => 'images/default-icon.png']);
        // 管理者ユーザーの作成 存在しなかったら第二引数をデフォで使用
        User::create([
            'name' => env('ADMIN_USER','root'),
            'email' => env('ADMIN_EMAIL','root@sample.com'),
            'password' => Hash::make(env('ADMIN_PASSWORD','Adminpassword32936')),
            'icon' => 'images/default-icon.png',
            'is_admin' => true,
        ]);
    }
}
