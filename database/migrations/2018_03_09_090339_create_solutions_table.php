<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSolutionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solutions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('class_menu', 191)->nullable();
			$table->text('keywords', 65535)->nullable();
			$table->string('name');
			$table->integer('parent_solution_id')->nullable();
			$table->integer('solution_order')->nullable();
			$table->string('title', 191)->nullable();
			$table->text('trend_edito', 65535)->nullable();
			$table->integer('visible_menu')->nullable();
			$table->string('slug', 191)->unique();
			$table->timestamps();
			$table->softDeletes();
			$table->text('images', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('solutions');
	}

}
