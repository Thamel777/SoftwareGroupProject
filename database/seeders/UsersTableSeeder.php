<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   //Added fake data samples
        DB::table('users')->insert([
            //Admin
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin2!@#'),
                'usertype' => 'admin',
                'status' => 'active'
            ],

            //Employee
            [
                'name' => 'Employee',
                'email' => 'employee@gmail.com',
                'password' => Hash::make('employee2!@#'),
                'usertype' => 'employee',
                'status' => 'active'
            ],

            //Customer
            [
                'name' => 'Customer',
                'email' => 'customer@gmail.com',
                'password' => Hash::make('customer2!@#'),
                'usertype' => 'customer',
                'status' => 'active'
            ]
        ]);
    }
}
