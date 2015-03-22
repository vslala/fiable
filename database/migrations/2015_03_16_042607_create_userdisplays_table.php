<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserdisplaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userdisplays', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('userID')->unsigned();
            $table->string('username');
            $table->string('name',500)->nullable();
            $table->string('url', 800)->nullable();
			$table->timestamps();
            $table->foreign("userID")->references("id")->on("users")->onDelete("cascade");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('userdisplays');
	}

}
