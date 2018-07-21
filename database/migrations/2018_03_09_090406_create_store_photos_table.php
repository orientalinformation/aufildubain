<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_photos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('title', 65535)->nullable();
			$table->text('images', 65535)->nullable();
			$table->integer('order')->nullable()->default(0);
			$table->timestamps();
			$table->softDeletes();
			$table->integer('store_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_photos');
	}

}
