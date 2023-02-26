<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Defaut Admin User
        Customers::create([
            'name'    => 'Bharat Khairnar',
            'email'   =>  'bharatdkhairnar@gmail.com',
            'password'=>  Hash::make('12345678'),
        ]);
    }
}
