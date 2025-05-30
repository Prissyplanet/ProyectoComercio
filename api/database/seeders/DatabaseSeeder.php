<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            BannerSeeder::class,
            TagSeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
            FavoriteSeeder::class,
            ReviewSeeder::class,
            WishlistSeeder::class
        ]);
    }
}
