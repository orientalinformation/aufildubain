<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class SolutionsStartEndDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solutions', function (Blueprint $table) {
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
        });

        // find DataType
        $dataType = DataType::where('name', 'solutions')->first();

        if ($dataType) {
            
            //remove start & end fields if exist
            $start_date = DataRow::where('data_type_id', $dataType->id)->where('field', 'start_date')->first();
            if ($start_date) $start_date->delete();

            $end_date = DataRow::where('data_type_id', $dataType->id)->where('field', 'end_date')->first();
            if ($end_date) $end_date->delete();
            
            //add
            $startRow = new DataRow();
            $startRow->data_type_id = $dataType->id;
            $startRow->field = 'start_date';
            $startRow->type = 'date';
            $startRow->display_name = 'Date de début';
            $startRow->required = 0;
            $startRow->browse = 1;
            $startRow->read = 1;
            $startRow->edit = 1;
            $startRow->add = 1;
            $startRow->delete = 0;
            $startRow->details = '{"template":{"slug":"columns-8-4","stack":"rg"}}';
            $startRow->order = 15;
            $startRow->save();

            $endRow = new DataRow();
            $endRow->data_type_id = $dataType->id;
            $endRow->field = 'end_date';
            $endRow->type = 'date';
            $endRow->display_name = 'Date de fin';
            $endRow->required = 0;
            $endRow->browse = 1;
            $endRow->read = 1;
            $endRow->edit = 1;
            $endRow->add = 1;
            $endRow->delete = 0;
            $endRow->details = '{"template":{"slug":"columns-8-4","stack":"rg"}}';
            $endRow->order = 16;
            $endRow->save();

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
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
}
