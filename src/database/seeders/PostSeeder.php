<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([[
            'user_id'=>'1',
            'title'=>'title1',
            'thumbnail'=>'filename.jpg',
            'departure_day'=>'2022/02/22',
            'return_day'=>'2022/02/24',
            'created_at'=>'2022/02/02 22:22:22'
        ],
        [
            'user_id'=>'1',
            'title'=>'title2',
            'thumbnail'=>'filename2.jpg',
            'departure_day'=>'2022/02/22',
            'return_day'=>'2022/02/24',
            'created_at'=>'2022/02/02 22:22:22'
        ],]);
    }
}
