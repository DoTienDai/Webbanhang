<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_admin')->insert([
            'admin_name' => 'admin',
            'admin_email' => 'admin@admin.com',
            'admin_password' => Hash::make('123456'),
            'admin_phone' => '213456789',
        ]);
        DB::table('tbl_admin')->insert([
            'admin_name' => 'admin',
            'admin_email' => 'admin@gmail.com',
            'admin_password' => Hash::make('123456'),
            'admin_phone' => '213456789',
        ]);
    }
}
