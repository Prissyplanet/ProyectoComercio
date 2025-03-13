<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'user_id' => 1, 
                'product_id' => 1, 
                'rating' => 5,
                'review' => 'Excellent vintage clock! Looks amazing in my living room.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'product_id' => 2,
                'rating' => 4,
                'review' => 'The typewriter is in great condition, but took a while to arrive.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'product_id' => 3,
                'rating' => 3,
                'review' => 'Nice antique radio, but not as functional as I expected.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
