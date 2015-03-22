<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserimagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userimages', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('userID')->unsigned();
            $table->string('username');
            $table->string('name');
            $table->string('url')->unique();
            $table->string('description', 3000);
            $table->foreign("userID")->references("id")->on("users")->onDelete("cascade");
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
		Schema::drop('userimages');
	}

}
