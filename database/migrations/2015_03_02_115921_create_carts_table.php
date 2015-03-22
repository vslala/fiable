<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cart', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('userID')->nullable();
            $table->integer('pid')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('brand')->nullable();
            $table->tinyInteger('quantity')->nullable();
            $table->string('size')->nullable();
            $table->decimal('price')->nullable();
            $table->string('type')->nullable();
            $table->string('design')->nullable();
            $table->string('image')->nullable();
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
		Schema::drop('cart');
	}

}
