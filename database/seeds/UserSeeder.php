<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{


    public function run()
    {
        $admin = User::create([
            'name' => 'fiqri',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'address' =>'bandung',
            'phone' => '08212131',
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('user'),
            'address' =>'bandung',
            'phone' => '08212131',
        ]);
        $user->assignRole('user');
    }

}
