<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::create([
           'name'=>'Admin',
           'email'=>'admin@gmail.com',
           'phone'=>'1234567890',
           'email_verified_at'=>date("Y-m-d H:i:s"),
           'password'=>bcrypt('123456'),
           'user_type'=>'admin'
       ]);

      
    

    }
}
