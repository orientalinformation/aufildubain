<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBrandsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brands', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('description', 65535)->nullable();
			$table->text('meta_description', 65535)->nullable();
			$table->text('meta_keywords', 65535)->nullable();
			$table->text('meta_title', 65535)->nullable();
			$table->integer('ord')->unsigned();
			$table->string('title');
			$table->timestamps();
			$table->softDeletes();
			$table->text('image', 65535)->nullable();
			$table->string('slug', 191)->nullable()->unique();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('brands');
	}

}
