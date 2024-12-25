<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Ahmad',
                'email' => 'ahmad@live.iium.edu.my',
                'password' => Hash::make('12345678'),
                'phone_number' => '0123456789',
                'location' => 'Mahallah Ali',
                'gender' => 'male',
                'status' => 'student',
                'role' => 'student', // Added role
                'user_image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fatimah Zahra',
                'email' => 'fatimah@live.iium.edu.my',
                'password' => Hash::make('12345678'),
                'phone_number' => '0112233445',
                'location' => 'Mahallah Asiah',
                'gender' => 'female',
                'status' => 'student',
                'role' => 'student', // Added role
                'user_image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@live.iium.edu.my',
                'password' => Hash::make('12345678'),
                'phone_number' => '0145678901',
                'location' => 'Mahallah Faruq',
                'gender' => 'male',
                'status' => 'student',
                'role' => 'student', // Added role
                'user_image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aisha Khan',
                'email' => 'aisha@live.iium.edu.my',
                'password' => Hash::make('12345678'),
                'phone_number' => '0182345678',
                'location' => 'Mahallah Aminah',
                'gender' => 'female',
                'status' => 'student',
                'role' => 'student', // Added role
                'user_image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Muhammad Yusuf',
                'email' => 'yusuf@live.iium.edu.my',
                'password' => Hash::make('12345678'),
                'phone_number' => '0179876543',
                'location' => 'Mahallah Zubair',
                'gender' => 'male',
                'status' => 'student',
                'role' => 'student', // Added role
                'user_image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nabila Huda',
                'email' => 'nabila@live.iium.edu.my',
                'password' => Hash::make('12345678'),
                'phone_number' => '0198765432',
                'location' => 'Mahallah Nusaibah',
                'gender' => 'female',
                'status' => 'student',
                'role' => 'student', // Added role
                'user_image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ahmed Zaki',
                'email' => 'zaki@live.iium.edu.my',
                'password' => Hash::make('12345678'),
                'phone_number' => '0156781234',
                'location' => 'Mahallah Uthman',
                'gender' => 'male',
                'status' => 'student',
                'role' => 'student', // Added role
                'user_image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siti Aminah',
                'email' => 'aminah@live.iium.edu.my',
                'password' => Hash::make('12345678'),
                'phone_number' => '0139871234',
                'location' => 'Mahallah Aminah',
                'gender' => 'female',
                'status' => 'student',
                'role' => 'student', // Added role
                'user_image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@live.iium.edu.my',
                'password' => Hash::make('admin123'),
                'phone_number' => '0191234567',
                'location' => 'Admin Office',
                'gender' => 'male',
                'status' => 'admin',
                'role' => 'admin', // Added role
                'user_image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
