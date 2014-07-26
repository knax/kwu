<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'username' => 'knax',
			'password' => Hash::make('standar'),
			'full_name' => 'Hasta Ragil'
		]);
		User::create([
			'username' => 'yuri',
			'password' => Hash::make('standar'),
			'full_name' => 'Yuri S'
		]);
		User::create([
			'username' => 'gigip',
			'password' => Hash::make('standar'),
			'full_name' => 'Ghiffari FB'
		]);
	}

}