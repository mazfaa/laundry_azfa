<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@role.test',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        $admin->assignRole('admin');

        $cashier = User::create([
            'name' => 'Cashier',
            'username' => 'cashier',
            'email' => 'cashier@role.test',
            'password' => bcrypt('password'),
            'role' => 'cashier',
            'remember_token' => Str::random(10),
        ]);

        $cashier->assignRole('cashier');

        $owner = User::create([
            'name' => 'Owner',
            'username' => 'owner',
            'email' => 'owner@role.test',
            'password' => bcrypt('password'),
            'role' => 'owner',
            'remember_token' => Str::random(10),
        ]);

        $owner->assignRole('owner');
    }
}
