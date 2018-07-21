<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class BrandsModifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->integer('num_of_products')->nullable()->default(0);
        });
        // find DataType
        $dataType = DataType::where('name', '=', 'brands')->first();

        if ($dataType) {

            //remove
            $remove = DataRow::where('field', '=', 'num_of_products')->first();
            if ($remove) $remove->delete();
            
            //add
            $startRow = new DataRow();
            $startRow->data_type_id = $dataType->id;
            $startRow->field = 'num_of_products';
            $startRow->type = 'number';
            $startRow->display_name = 'Nombre de produits';
            $startRow->required = 0;
            $startRow->browse = 1;
            $startRow->read = 0;
            $startRow->edit = 0;
            $startRow->add = 0;
            $startRow->delete = 0;
            $startRow->details = '';
            $startRow->order = 13;
            $startRow->save();
        }        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brands', function (Blueprint $table) {
            //
        });
    }
}
