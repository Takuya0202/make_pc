<?php

namespace Database\Seeders;

use App\Models\Part;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 存在する各パーツについて三人ずつユーザがレビュー
        $parts = Part::all();
        foreach ($parts as $part) {
            $users = User::limit(3)->get();
            foreach ($users as $user){
                Review::factory()->create([
                    'user_id' => $user->id,
                    'part_id' => $part->id,
                ]);
            }
        }
    }
}
