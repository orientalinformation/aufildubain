<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrendsModificationsSeventhImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trends', function (Blueprint $table) {
            $table->string('image_7');
            $table->string('title_7');
            $table->text('description_7');
            $table->tinyInteger('color_enable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trends', function (Blueprint $table) {
            $table->dropColumn('image_7');
            $table->dropColumn('title_7');
            $table->dropColumn('description_7');
            $table->dropColumn('color_enable');
        });
    }
}
