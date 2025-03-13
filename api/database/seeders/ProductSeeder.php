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
                'name' => 'Reloj vintage',
                'description' => 'Un reloj de pared vintage de los años 50s.',
                'price' => 79.99,
                'image_url' => 'https://i.ebayimg.com/images/g/F78AAOSwCKNkVim1/s-l1200.png',
                'affiliate_link' => 'https://www.ebay.com/itm/394610118472',
                'category_id' => 1, 
                'brand_id' => 1, 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Máquina de escribir retro',
                'description' => 'Máquina de escribir en perfecto estado',
                'price' => 120.50,
                'image_url' => 'https://m.media-amazon.com/images/I/81AfEM1H1-L._AC_SL1500_.jpg',
                'affiliate_link' => 'https://www.ubuy.com.mx/sp/product/1GFOT5FS-besportble-vintage-typewriter-model-retro-typewriter-iron-art-typewriter-manual-typewriter-photo-pro',
                'category_id' => 2,
                'brand_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Radio',
                'description' => 'Una radio antigua en perfecto estado.',
                'price' => 500.00,
                'image_url' => 'https://m.media-amazon.com/images/I/61mw3l-aSJL._AC_UF894,1000_QL80_.jpg',
                'affiliate_link' => 'https://www.amazon.com.mx/Vintage-Walnut-Fashioned-Classic-Enhancement/dp/B0CPJ9GXXX',
                'category_id' => 3,
                'brand_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
