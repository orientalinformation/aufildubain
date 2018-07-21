<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrendsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trends', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 191);
			$table->string('slug', 191)->unique();
			$table->timestamps();
			$table->softDeletes();
			$table->text('description', 65535)->nullable();
			$table->text('feature', 65535)->nullable();
			$table->string('image_alt', 191)->nullable();
			$table->text('meta_description', 65535)->nullable();
			$table->text('meta_keywords', 65535)->nullable();
			$table->string('meta_title', 191)->nullable();
			$table->text('mini_description', 65535)->nullable();
			$table->string('reference', 191)->nullable();
			$table->integer('solution_id');
			$table->integer('status')->nullable();
			$table->text('images', 65535)->nullable();
			$table->text('logo', 65535)->nullable();
			$table->text('image_carousel', 65535)->nullable();
			$table->text('image_listing', 65535)->nullable();
			$table->dateTime('publication_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trends');
	}

}
