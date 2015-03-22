<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('userID');
            $table->string('firstName', 255);
            $table->string('lastName', 255);
            $table->string('email', 255);
            $table->string('address_one', 500);
            $table->string('address_two', 500);
            $table->string('landmark', 500);
            $table->string('mobile');
            $table->integer('city')->unsigned();
            $table->integer('state')->unsigned();

			$table->timestamps();

            $table->foreign('city')->references('id')->on('cities');
            $table->foreign('state')->references('id')->on('states');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('addresses');
	}

}
