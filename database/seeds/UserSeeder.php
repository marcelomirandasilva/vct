<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
			

		// Create default user for each role
		$user = \App\Models\User::create([
			'name'              	=>  'MARCELO MIRANDA',
			'email'             	=>  'marcelo.miranda.pp@gmail.com',
			'password'          	=>  bcrypt('teste123'),
			'remember_token'    	=>  str_random(10),
			'avatar'            	=>  '',
		]);

		
	}
}
