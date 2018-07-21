<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class CategoriesModificationsDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // find DataType
        $dataType = DataType::where('name', 'product_categories')->first();

        if ($dataType) {
            
            // update
            $slug = DataRow::where('data_type_id', $dataType->id)
                                ->where('field', 'slug')
                                ->first();   
            $slug->browse = 1;
            $slug->save();   
        } 
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
