<?php

// namespace App\Database\Seeder;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::trancate();

        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('test'),
        ]);
    }
}
