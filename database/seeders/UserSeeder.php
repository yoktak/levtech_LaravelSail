<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->create();

        DB::table('users')->insert([
            'name' => 'Takumi Yokochi',
            'email' => 'yokotaku327@gmail.com',
            'password' => Hash::make('Verywellmuch10tt'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
