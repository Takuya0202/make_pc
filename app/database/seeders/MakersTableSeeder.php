<?php

namespace Database\Seeders;

use App\Models\Maker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MakersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makers = [
            ['name' => 'intel'],
            ['name' => 'AMD'],
            ['name' => 'nvidia'],
            ['name' => 'Radeon']
        ];
        foreach ($makers as $maker) {
            Maker::create($maker);
        }
    }
}
