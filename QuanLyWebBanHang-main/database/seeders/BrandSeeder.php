<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('tbl_brand')->insert([
            'brand_id' => 1,
            'brand_name' => 'Dell',
            'brand_desc' => 1,
            'brand_status' => 1,
        ]);
        DB::table('tbl_brand')->insert([
            'brand_id' => 2,
            'brand_name' => 'ASUS',
            'brand_desc' => 1,
            'brand_status' => 1,
        ]);
        DB::table('tbl_brand')->insert([
            'brand_id' => 3,
            'brand_name' => 'HP',
            'brand_desc' => 1,
            'brand_status' => 1,
        ]);
        DB::table('tbl_brand')->insert([
            'brand_id' => 4,
            'brand_name' => 'MAC',
            'brand_desc' => 1,
            'brand_status' => 1,
        ]);
    }
}
