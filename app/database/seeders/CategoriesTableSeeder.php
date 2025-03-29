<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'cpu'],
            ['name' => 'gpu'],
            ['name' => 'マザーボード'],
            ['name' => 'cpuファン'],
            ['name' => 'cpuグリス'],
            ['name' => 'メモリ'],
            ['name' => 'M.2 SSD'],
            ['name' => '電源'],
            ['name' => 'PCケース'],
            ['name' => 'モニター'],
        ];
        foreach ($categories as $categpry) {
            Category::create($categpry);
        }
    }
}
