<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('userID');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->integer('pid')->unsigned();
            $table->tinyInteger('quantity');
            $table->integer('addressID')->unsigned();
            $table->decimal('totalAmount');
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
		Schema::drop('orders');
	}

}
