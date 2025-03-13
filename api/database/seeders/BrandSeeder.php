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
            ['name' => 'Brand 1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Brand 2', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Brand 3', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
