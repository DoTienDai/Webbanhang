<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Khoa',
            'email' => 'phalemin1@gmail.com',
            'password' => Hash::make('lekhoa123'), // Đổi 'password' thành mật khẩu mong muốn
            'email_verified_at' => now(),
            'phone' => '1234567890', // Số điện thoại tùy chọn
            'birthdate' => '1990-01-01', // Ngày sinh tùy chọn
            'gender' => 'male', // Giới tính tùy chọn
            'active' => 1, // Trạng thái tài khoản
            'remember_token' => Str::random(10),
        ]);
        // Tạo người dùng thứ hai
        User::create([
            'name' => 'Phalemin2',
            'email' => 'phalemin2@gmail.com',
            'password' => Hash::make('lekhoa123'),
            'email_verified_at' => now(),
            'phone' => '0987654321', // Số điện thoại tùy chọn
            'birthdate' => '1995-05-05', // Ngày sinh tùy chọn
            'gender' => 'female', // Giới tính tùy chọn
            'active' => 0, // Trạng thái tài khoản
            'remember_token' => Str::random(10),
        ]);
    }

}
