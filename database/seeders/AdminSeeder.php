<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     =>  'admin',             
            'Email'    =>  'admin@gmail.com',
            'name'     =>  'admin',             
            'password' =>  bcrypt('admin1234'),
            'role'     =>  'admin'
        ]);
    }
}
