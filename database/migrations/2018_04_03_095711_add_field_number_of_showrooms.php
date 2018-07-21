<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use TCG\Voyager\Models\Setting;

class AddFieldNumberOfShowrooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create setting adim
        $setting = new Setting;
        $setting->key =  'admin.number_of_showrooms';
        $setting->display_name = 'Number of Showrooms';
        $setting->value = '';
        $setting->details = '';
        $setting->type = 'text';
        $setting->group = 'Admin';
        $setting->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
