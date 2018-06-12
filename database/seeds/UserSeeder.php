<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //Insert User Function
    public function insert($user)
    {
    	DB::table('users')->insert([
    		'email' => $user['email'],
        	'password' => $user['password'],
    	]);
    }
}
