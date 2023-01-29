<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        //
        User::insert([
            'user_name'=>'admin1',
            'user_email'=>'admin1@gmail.com',
            'password'=>Hash::make('admin1'),
            'user_gender'=>'Male',
            'user_DOB'=>'1997-09-09',
            'user_country'=>'Australia',
            'user_type'=>'admin',
        ]);
    }
}
