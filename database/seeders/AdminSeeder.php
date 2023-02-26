<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Defaut Admin User
        User::create([
            'name'    => 'Super Admin',
            'email'   =>  'admin@gmail.com',
            'password'=>  Hash::make('Admin@123'),
        ]);
    }
}
