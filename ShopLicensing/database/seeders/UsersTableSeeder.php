<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    // Create an admin user
    User::create([
        'name' => 'admin',
        'email' => 'admin@citybyo.co.zw',
        'password' => Hash::make('admin@123'), // Hash the password
        'is_admin' => 1,
    ]);

    // Create a regular user
    User::create([
        'name' => 'user',
        'email' => 'user@citybyo.co.zw',
        'password' => Hash::make('user123'), // Hash the password
        'is_admin' => 0,
    ]);
}
}
