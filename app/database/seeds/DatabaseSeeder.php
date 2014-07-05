<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('MRFTableSeeder');
		$this->call('SWOTableSeeder');
		$this->call('MRFListTableSeeder');
		$this->call('SWOListTableSeeder');
		$this->call('AdminTableSeeder');
	}

}
