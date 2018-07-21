<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlideShowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slide_shows', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('btn_link', 191);
			$table->timestamps();
			$table->softDeletes();
			$table->string('btn_name', 191);
			$table->text('image', 65535)->nullable();
			$table->string('image_alt', 191)->nullable();
			$table->integer('order')->nullable();
			$table->string('sub_title', 191);
			$table->string('title', 191);
			$table->string('title_image_min', 191)->nullable();
			$table->text('thumbnail', 65535)->nullable();
			$table->text('inactive_thumbnail', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('slide_shows');
	}

}
