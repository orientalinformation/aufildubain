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
		Schema::dropIfExists('trends');

		Schema::create('trends', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 191);
			$table->string('slug', 191)->nullable()->unique();
			$table->timestamps();
			$table->softDeletes();
			$table->text('description', 65535)->nullable();
			$table->text('meta_description', 65535)->nullable();
			$table->text('meta_keywords', 65535)->nullable();
			$table->string('meta_title', 191)->nullable();
			$table->integer('status')->nullable();
			$table->dateTime('start_date')->nullable();
			$table->dateTime('end_date')->nullable();
			$table->string('title_1', 191)->nullable();
			$table->text('description_1', 65535)->nullable();
			$table->text('image_1', 65535)->nullable();
			$table->string('title_2', 191)->nullable();
			$table->text('description_2', 65535)->nullable();
			$table->text('image_2', 65535)->nullable();
			$table->string('title_3', 191)->nullable();
			$table->text('description_3', 65535)->nullable();
			$table->text('image_3', 65535)->nullable();
			$table->string('title_4', 191)->nullable();
			$table->text('description_4', 65535)->nullable();
			$table->text('image_4', 65535)->nullable();
			$table->string('title_5', 191)->nullable();
			$table->text('description_5', 65535)->nullable();
			$table->text('image_5', 65535)->nullable();
			$table->string('title_6', 191)->nullable();
			$table->text('description_6', 65535)->nullable();
			$table->text('image_6', 65535)->nullable();
			$table->string('color_1', 20)->nullable();
			$table->string('color_2', 20)->nullable();
			$table->string('color_3', 20)->nullable();
			$table->string('color_4', 20)->nullable();
			$table->string('color_5', 20)->nullable();
			$table->string('color_6', 20)->nullable();
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
