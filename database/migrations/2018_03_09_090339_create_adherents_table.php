<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdherentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adherents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('address', 191)->nullable();
			$table->string('address_2', 191)->nullable();
			$table->string('city', 128)->nullable();
			$table->string('contact', 191)->nullable();
			$table->string('email', 191)->nullable();
			$table->string('email_copy', 191)->nullable();
			$table->string('fax', 15)->nullable();
			$table->string('manager', 191)->nullable();
			$table->string('name', 191)->nullable();
			$table->string('phone', 15)->nullable();
			$table->string('state', 6)->nullable();
			$table->string('web', 191)->nullable();
			$table->string('zip', 6)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adherents');
	}

}
