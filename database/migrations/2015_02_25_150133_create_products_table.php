<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name', 200);
            $table->string('brand', 100);
            $table->string('description', 2000);
            $table->string('size', 50);
            $table->decimal('price',8,2);
            $table->string('type', 100);
            $table->string('design', 100);
            $table->boolean('stock');
            $table->integer('category')->unsigned();
            $table->foreign('category')->references('id')->on('scategories');
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
		Schema::drop('products');
	}

}
