<?php

class MRFTableSeeder extends Seeder {

	public function run()
	{
		foreach(range(1, 3) as $index)
		{
			MRF::create([
				'no' => '25' . $index .'/MRF/ADM/07/2014',
				'date' =>  date('Y-m-d', strtotime('2014-07-0' . $index)),
				'departement' => 'ADM',
				'job_number' => '1',
				'customer_client' => 'yes',
				'approved' => false,
				'note' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat libero, officiis asperiores error consectetur aspernatur corporis, accusantium veniam cumque pariatur commodi, suscipit aperiam laborum, soluta reprehenderit labore sed ipsa vitae?',
				'requester_id' => $index,
			]);
			sleep(1);
		}
	}

}