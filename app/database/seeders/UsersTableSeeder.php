<?php

namespace Database\Seeders;

use App\Models\PcList;
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
        $users = User::factory()->count(5)->create(['icon' => 'images/default-icon.png']);

            // 各ユーザーにPcListを5つ付与
        foreach ($users as $user) {
            for ($i = 1; $i <= 5; $i++) {
                PcList::create([
                    'user_id' => $user->id,
                    'name' => 'デフォルト' . $i,
                    'price' => 0,
                ]);
            }
        }
        // 管理者ユーザーの作成 存在しなかったら第二引数をデフォで使用
        $admin = User::create([
            'name' => env('ADMIN_USER','root'),
            'email' => env('ADMIN_EMAIL','root@sample.com'),
            'password' => Hash::make(env('ADMIN_PASSWORD','Adminpassword32936')),
            'icon' => 'images/default-icon.png',
            'is_admin' => true,
        ]);

        // 管理者にもリスト付与
        for ($i = 1; $i <= 5; $i++) {
            PcList::create([
                'user_id' => $admin->id,
                'name' => 'デフォルト' . $i,
                'price' => 0,
            ]);
        }
    }
}
