<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMrfTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mrf', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('no');
			$table->date('date');
			$table->string('departement');
			$table->string('job_number');
			$table->string('customer_client');
			$table->text('note');
			$table->integer('approved_by')->unsigned()->nullable();
			$table->integer('requester_id')->unsigned();
			$table->foreign('approved_by')
				  ->references('id')->on('users')
				  ->onDelete('no action');
			$table->foreign('requester_id')
				  ->references('id')->on('users')
				  ->onDelete('no action');
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
		Schema::drop('mrf');
	}

}
