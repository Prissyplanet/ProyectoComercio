<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            ['name' => 'Forever21', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'IKEA', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'NIKE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'BigChill', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Mathmos', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Cotsoco', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'oxknit', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'parklees', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'MUXXN', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '8bitdo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Etsy', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
