<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Vintage Clock',
                'description' => 'A beautiful vintage wall clock from the 1950s.',
                'price' => 79.99,
                'image_url' => 'https://example.com/images/vintage-clock.jpg',
                'affiliate_link' => 'https://affiliate.example.com/vintage-clock',
                'category_id' => 1, // Asegúrate de que la categoría existe
                'brand_id' => 1, // Asegúrate de que la marca existe
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Retro Typewriter',
                'description' => 'Classic retro typewriter in perfect condition.',
                'price' => 120.50,
                'image_url' => 'https://example.com/images/retro-typewriter.jpg',
                'affiliate_link' => 'https://affiliate.example.com/retro-typewriter',
                'category_id' => 2,
                'brand_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Antique Radio',
                'description' => 'A rare antique radio with wooden finish.',
                'price' => 199.99,
                'image_url' => 'https://example.com/images/antique-radio.jpg',
                'affiliate_link' => 'https://affiliate.example.com/antique-radio',
                'category_id' => 3,
                'brand_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
