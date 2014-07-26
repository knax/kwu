<?php

class AdminTableSeeder extends Seeder {

	public function run()
	{
		Admin::create([
			'type' => 'superadmin',
			'user_id' => '1'
		]);
		Admin::create([
			'type' => 'adm',
			'user_id' => '2'
		]);
	}

}