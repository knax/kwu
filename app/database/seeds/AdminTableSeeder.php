<?php

class AdminTableSeeder extends Seeder {

	public function run()
	{
		Admin::create([
			'type' => 'superadmin',
			'users_id' => '1'
		]);
		Admin::create([
			'type' => 'adm',
			'users_id' => '2'
		]);
	}

}