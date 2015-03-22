<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scategories', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->integer('c_id')->unsigned();
            $table->foreign('c_id')->references('id')->on('mcategories');
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
		Schema::drop('scategories');
	}

}
