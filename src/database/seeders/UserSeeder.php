<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([[
            'name'=>'test1',
            'email'=>'test1@test.com',
            'password'=>Hash::make('password123'),
            'created_at'=>'2022/02/02 22:22:22'
        ],
        [
            'name'=>'test2',
            'email'=>'test2@test.com',
            'password'=>Hash::make('password123'),
            'created_at'=>'2022/02/02 22:22:22'
        ],]);
    }
}
