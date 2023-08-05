<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' => 'カフェにて',
            'body' => 'カフェインって本当に効果あるん？',
            'user_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('posts')->insert([
            'title' => 'うどん屋にて',
            'body' => '夏に温うどん食う爺さんすげえな',
            'user_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('posts')->insert([
            'title' => 'ラーメン屋にて',
            'body' => '店員さんが少ない店の方がうまいの何',
            'user_id' => 3,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('posts')->insert([
            'title' => '公園にて',
            'body' => 'ペット飼ってたら公園とかに行ってたんだろうな',
            'user_id' => 4,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('posts')->insert([
            'title' => 'ナメック星にて',
            'body' => 'オッス、オラ悟空',
            'user_id' => 5,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
