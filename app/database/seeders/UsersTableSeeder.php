<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // userのシーダー作成。アイコン以外はファクトリを使用
        User::factory()->count(5)->create(['icon' => 'default-icon.png']);
    }
}
