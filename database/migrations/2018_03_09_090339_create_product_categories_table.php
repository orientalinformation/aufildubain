<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->timestamps();
			$table->softDeletes();
			$table->text('description', 65535)->nullable();
			$table->string('fullname', 191)->nullable();
			$table->string('image_alt', 191)->nullable();
			$table->string('meta_description', 191)->nullable();
			$table->string('meta_keywords', 191)->nullable();
			$table->string('meta_title', 191)->nullable();
			$table->integer('parent_id')->nullable();
			$table->string('slug', 191)->unique();
			$table->string('image', 191)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_categories');
	}

}
