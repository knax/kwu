<?php

class MRFListTableSeeder extends Seeder {

	public function run()
	{
		foreach(range(1, 3) as $index)
		{
			MRFList::create([
				'no' => $index,
				'description' => 'good',
				'qty' => 1,
				'unit' => 'kilogram',
				'remarks' => 'dunno',
				'mrf_id' => 1
				]);
		}
		foreach(range(1, 3) as $index)
		{
			MRFList::create([
				'no' => $index,
				'description' => 'standard',
				'qty' => 2,
				'unit' => 'pound',
				'remarks' => 'dunno',
				'mrf_id' => 2
				]);
		}
		foreach(range(1, 3) as $index)
		{
			MRFList::create([
				'no' => $index,
				'description' => 'bad',
				'qty' => 3,
				'unit' => 'ampere',
				'remarks' => 'dunno',
				'mrf_id' => 3
				]);
		}
	}

}