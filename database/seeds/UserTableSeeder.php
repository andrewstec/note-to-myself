<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'email' => 'andrewstec@gmail.com',
			'password' => Hash::make('password'),
			'account_confirmed' => 1,
			'confirmation_code' => '2312312312',
			));
	}
}