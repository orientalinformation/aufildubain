<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class SolutionDeleteStartEndDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // find DataType
        $dataType = DataType::where('name', 'solutions')->first();

        if ($dataType) {
            //remove start & end fields if exist
            $start_date = DataRow::where('data_type_id', $dataType->id)->where('field', 'start_date')->first();
            if ($start_date) $start_date->delete();

            $end_date = DataRow::where('data_type_id', $dataType->id)->where('field', 'end_date')->first();
            if ($end_date) $end_date->delete();
        }

        Schema::table('solutions', function (Blueprint $table) {
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
