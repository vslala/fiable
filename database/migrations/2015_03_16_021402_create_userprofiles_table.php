<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserprofilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userprofiles', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('username');
            $table->integer('userID')->unsigned();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('experience', 1000)->nullable();
            $table->string('about', 5000);
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
		Schema::drop('userprofiles');
	}

}
