<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Ropa'],
            ['name' => 'Muebles'],
            ['name' => 'Electrónica'],
            ['name' => 'Juguetes'],
            ['name' => 'Herramientas'],
            ['name' => 'Jardín'],
            ['name' => 'Deportes'],
        ]);
    }
}
