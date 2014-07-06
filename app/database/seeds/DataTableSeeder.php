<?php

class DataTableSeeder extends Seeder {

	public function run()
	{
		// SWO Part
		foreach(range(1, 3) as $index)
		{
			$additionalData = [];
			foreach(range(1, 3) as $i)
			{
				$additionalData[] = [
				'no' => $index,
				'description' => 'good',
				'serial_number' => '12123' . $index,
				'service_requested' => 'dunno'
				];
			}
			Data::create([
				'no' => '25' . $index .'/SWO/ADM/07/2014',
				'date' =>  date('Y-m-d', strtotime('2014-07-0' . $index)),
				'departement' => 'ADM',
				'job_number' => '1',
				'customer_client' => 'yes',
				'additional_data' => json_encode($additionalData),
				'note' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat libero, officiis asperiores error consectetur aspernatur corporis, accusantium veniam cumque pariatur commodi, suscipit aperiam laborum, soluta reprehenderit labore sed ipsa vitae?',
				'requester_id' => $index,
				]);
			sleep(1);
		}

		foreach(range(1, 3) as $index)
		{
			$additionalData = [];
			foreach(range(1, 3) as $i)
			{
				$additionalData[] = [
				'no' => $index,
				'description' => 'good',
				'qty' => $i,
				'unit' => 'kilogram',
				'remarks' => 'dunno'
				];
			}
			Data::create([
				'no' => '25' . $index .'/MRF/ADM/07/2014',
				'date' =>  date('Y-m-d', strtotime('2014-07-0' . $index)),
				'departement' => 'ADM',
				'job_number' => '1',
				'customer_client' => 'yes',
				'additional_data' => json_encode($additionalData),
				'note' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat libero, officiis asperiores error consectetur aspernatur corporis, accusantium veniam cumque pariatur commodi, suscipit aperiam laborum, soluta reprehenderit labore sed ipsa vitae?',
				'requester_id' => $index,
				]);
			sleep(1);
		}
	}

}