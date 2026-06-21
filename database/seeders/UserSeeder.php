<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John',
            'email' => 'john@email.com',
            'password' => Hash::make('password'),
            /* طريقة اخرى  */
            /* 'password' => bcrypt('password'), */
        ]);

        DB::table('users')->insert([
            'name' => 'ahmad',
            'email' => 'ahmad@email.com',
            'password' => Hash::make('password123'),
        ]);     
    }
}
