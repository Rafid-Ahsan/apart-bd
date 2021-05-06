<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'admin',
            'mobile_number' => '01648633791',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')
        ]);

        DB::table('users')->insert([
            'first_name' => 'moderator',
            'mobile_number' => '12345678910',
            'email' => 'mod@mod.com',
            'password' => Hash::make('mod')
        ]);

        DB::table('users')->insert([
            'first_name' => 'user',
            'mobile_number' => '12345678910',
            'email' => 'user@user.com',
            'password' => Hash::make('user')
        ]);
    }
}
