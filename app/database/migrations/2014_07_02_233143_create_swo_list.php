<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSwoList extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('swo_list', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('no');
			$table->string('serial_number')->nullable();
			$table->text('description')->nullable();
			$table->string('service_requested')->nullable();
			$table->integer('swo_id')->unsigned();
			$table->foreign('swo_id')
				  ->references('id')->on('swo')
				  ->onDelete('cascade');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('swo_list');
	}

}
