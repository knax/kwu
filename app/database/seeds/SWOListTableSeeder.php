<?php

class SWOListTableSeeder extends Seeder {

	public function run()
	{
		foreach(range(1, 3) as $index)
		{
			SWOList::create([
				'no' => $index,
				'description' => 'good',
				'serial_number' => '123123',
				'service_requested' => 'dunno',
				'swo_id' => 1
				]);
		}
		foreach(range(1, 3) as $index)
		{
			SWOList::create([
				'no' => $index,
				'description' => 'standard',
				'serial_number' => '321321',
				'service_requested' => 'dunno',
				'swo_id' => 2
				]);
		}
		foreach(range(1, 3) as $index)
		{
			SWOList::create([
				'no' => $index,
				'description' => 'bad',
				'serial_number' => '222222',
				'service_requested' => 'dunno',
				'swo_id' => 3
				]);
		}
	}

}