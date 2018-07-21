<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->integer('brand_id')->nullable();
			$table->integer('category_id')->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('ecotaxe', 191)->nullable();
			$table->text('grip', 65535)->nullable();
			$table->text('images', 65535)->nullable();
			$table->text('secondary_images', 65535)->nullable();
			$table->string('image_alt', 191)->nullable();
			$table->text('meta_description', 65535)->nullable();
			$table->text('meta_keywords', 65535)->nullable();
			$table->string('meta_title', 191)->nullable();
			$table->text('more_1', 65535)->nullable();
			$table->text('more_2', 65535)->nullable();
			$table->text('more_3', 65535)->nullable();
			$table->integer('on_home')->nullable();
			$table->string('price', 191)->nullable();
			$table->string('reference', 191)->nullable();
			$table->string('title', 191)->nullable();
			$table->string('type', 191)->nullable();
			$table->string('univers', 191)->nullable();
			$table->integer('visible')->nullable();
			$table->string('slug', 191)->index();
			$table->timestamps();
			$table->softDeletes();
			$table->string('year_of_manufacture', 10)->nullable();
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
