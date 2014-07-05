<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMrfList extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mrf_list', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('no');
			$table->text('description')->nullable();
			$table->integer('qty')->nullable();
			$table->string('unit')->nullable();
			$table->string('remarks')->nullable();
			$table->integer('mrf_id')->unsigned();
			$table->foreign('mrf_id')
				  ->references('id')->on('mrf')
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
		Schema::drop('mrf_list');
	}

}
