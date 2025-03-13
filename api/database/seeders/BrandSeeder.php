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
        ]);
    }
}
