<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            [
                'title' => 'Descuento en Vintage Fashion',
                'image_url' => 'https://example.com/images/banner1.jpg',
                'link' => 'https://www.amazon.com/vintage-fashion',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Ofertas en muebles retro',
                'image_url' => 'https://example.com/images/banner2.jpg',
                'link' => 'https://www.mercadolibre.com/muebles-retro',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Ediciones especiales en vinilos',
                'image_url' => 'https://example.com/images/banner3.jpg',
                'link' => 'https://www.ebay.com/vinyl-collections',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
