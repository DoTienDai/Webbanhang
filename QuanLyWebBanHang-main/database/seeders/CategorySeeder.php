<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_category_product')->insert([
            'category_id' => 1,
            'category_name' => 'LAPTOP',
            'category_desc' => 5,
            'category_status' => 1,
        ]);
        DB::table('tbl_category_product')->insert([
            'category_id' => 2,
            'category_name' => 'DIEN THOAI',
            'category_desc' => 1,        
            'category_status' => 1,
        ]);
        DB::table('tbl_category_product')->insert([
            'category_id' => 3,
            'category_name' => 'PHU KIEN',
            'category_desc' => 3,         
            'category_status' => 1,
        ]);   DB::table('tbl_category_product')->insert([
            'category_id' => 4,
            'category_name' => 'LOA',
            'category_desc' => 2,
            'category_status' => 1,
        ]);
    }
}
