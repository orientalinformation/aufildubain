<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Trend;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class ChangeDatabaseInTrends extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trends', function (Blueprint $table) {
            $table->string('cover')->nullable();
            $table->text('content')->nullable();
        });

        // find DataType
        $dataType = DataType::where('name', 'trends')->first();

        if ($dataType) { 

            //remove fields if exist
            $cover = DataRow::where('data_type_id', $dataType->id)->where('field', 'cover')->first();
            if ($cover) $cover->delete();

            $content = DataRow::where('data_type_id', $dataType->id)->where('field', 'content')->first();
            if ($content) $content->delete();

            //add
            $startRow = new DataRow();
            $startRow->data_type_id = $dataType->id;
            $startRow->field = 'cover';
            $startRow->type = 'image';
            $startRow->display_name = 'Couverture';
            $startRow->required = 0;
            $startRow->browse = 0;
            $startRow->read = 1;
            $startRow->edit = 1;
            $startRow->add = 1;
            $startRow->delete = 0;
            $startRow->details = '';
            $startRow->order = 15;
            $startRow->save();  

            $startRow = new DataRow();
            $startRow->data_type_id = $dataType->id;
            $startRow->field = 'content';
            $startRow->type = 'text';
            $startRow->display_name = 'Contenu';
            $startRow->required = 0;
            $startRow->browse = 0;
            $startRow->read = 1;
            $startRow->edit = 1;
            $startRow->add = 1;
            $startRow->delete = 0;
            $startRow->details = '';
            $startRow->order = 15;
            $startRow->save();            
        }

        // get data
        $trends = Trend::all();

        foreach ($trends as $trend) {

            $arrs = [];
            $dataText = [
                'type' => 'text',
                'data' =>  array(
                    'title' => '',
                    'description' => $trend->description
                )
            ];
            array_push($arrs, $dataText);

            //
            $dataColor = [
                'type' => 'color',
                'data' =>  array(
                    'colors' =>array ( 
                        $trend->color_1,
                        $trend->color_2,
                        $trend->color_3,
                        $trend->color_4,
                        $trend->color_5,
                        $trend->color_6
                    )
                )
            ];
            array_push($arrs, $dataColor);

            //
            $dataImage1 = [
                'type' => 'picture',
                'data' =>  array(
                    'image' =>  $trend->image_1,
                    'title' => $trend->title_1,
                    'description' => $trend->description_1
                )
            ];
            array_push($arrs, $dataImage1);

            //
            $dataImage2 = [
                'type' => 'picture',
                'data' =>  array(
                    'image' =>  $trend->image_2,
                    'title' => $trend->title_2,
                    'description' => $trend->description_2
                )
            ];
            array_push($arrs, $dataImage2);

            //
            $dataImage3 = [
                'type' => 'picture',
                'data' =>  array(
                    'image' =>  $trend->image_3,
                    'title' => $trend->title_3,
                    'description' => $trend->description_3
                )
            ];
            array_push($arrs, $dataImage3);                

            //
            $dataImage4 = [
                'type' => 'picture',
                'data' =>  array(
                    'image' =>  $trend->image_4,
                    'title' => $trend->title_4,
                    'description' => $trend->description_4
                )
            ];
            array_push($arrs, $dataImage4); 

            //
            $dataImage5 = [
                'type' => 'picture',
                'data' =>  array(
                    'image' =>  $trend->image_5,
                    'title' => $trend->title_5,
                    'description' => $trend->description_5
                )
            ];
            array_push($arrs, $dataImage5);

            //
            $dataImage6 = [
                'type' => 'picture',
                'data' =>  array(
                    'image' =>  $trend->image_6,
                    'title' => $trend->title_6,
                    'description' => $trend->description_6
                )
            ];
            array_push($arrs, $dataImage6);                

            //
            $dataImage7 = [
                'type' => 'picture',
                'data' =>  array(
                    'image' =>  $trend->image_7,
                    'title' => $trend->title_7,
                    'description' => $trend->description_7
                )
            ];
            array_push($arrs, $dataImage7); 

            $trend->content = json_encode($arrs);
            $trend->save();
        }

        Schema::table('trends', function (Blueprint $table) {
            $table->dropColumn('color_1');
            $table->dropColumn('color_2');
            $table->dropColumn('color_3');
            $table->dropColumn('color_4');
            $table->dropColumn('color_5');
            $table->dropColumn('color_6');
            $table->dropColumn('title_1');
            $table->dropColumn('title_2');
            $table->dropColumn('title_3');
            $table->dropColumn('title_4');
            $table->dropColumn('title_5');
            $table->dropColumn('title_6');
            $table->dropColumn('title_7');
            $table->dropColumn('description_1');
            $table->dropColumn('description_2');
            $table->dropColumn('description_3');
            $table->dropColumn('description_4');
            $table->dropColumn('description_5');
            $table->dropColumn('description_6');
            $table->dropColumn('description_7');
            $table->dropColumn('image_1');
            $table->dropColumn('image_2');
            $table->dropColumn('image_3');
            $table->dropColumn('image_4');
            $table->dropColumn('image_5');
            $table->dropColumn('image_6');
            $table->dropColumn('image_7');
            $table->dropColumn('color_enable');
        });

        $color_1 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'color_1')
                    ->first();
        if ($color_1) $color_1->delete();

        $color_2 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'color_2')
                    ->first();
        if ($color_2) $color_2->delete();

        $color_3 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'color_3')
                    ->first();
        if ($color_3) $color_3->delete();

        $color_4 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'color_4')
                    ->first();
        if ($color_4) $color_4->delete();

        $color_5 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'color_5')
                    ->first();
        if ($color_5) $color_5->delete();

        $color_6 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'color_6')
                    ->first();
        if ($color_6) $color_6->delete();        

        $title_1 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'title_1')
                    ->first();
        if ($title_1) $title_1->delete();

        $title_2 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'title_2')
                    ->first();
        if ($title_2) $title_2->delete();        

        $title_3 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'title_3')
                    ->first();
        if ($title_3) $title_3->delete();

        $title_4 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'title_4')
                    ->first();
        if ($title_4) $title_4->delete();

        $title_5 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'title_5')
                    ->first();
        if ($title_5) $title_5->delete();

        $title_6 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'title_6')
                    ->first();
        if ($title_6) $title_6->delete();  

        $title_7 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'title_7')
                    ->first();
        if ($title_7) $title_7->delete();

        $description_1 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'description_1')
                    ->first();
        if ($description_1) $description_1->delete();  

        $description_2 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'description_2')
                    ->first();
        if ($description_2) $description_2->delete();

        $description_3 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'description_3')
                    ->first();
        if ($description_3) $description_3->delete();  
        
        $description_4 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'description_4')
                    ->first();
        if ($description_4) $description_4->delete();

        $description_5 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'description_5')
                    ->first();
        if ($description_5) $description_5->delete();  
        
        $description_6 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'description_6')
                    ->first();
        if ($description_6) $description_6->delete();

        $description_7 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'description_7')
                    ->first();
        if ($description_7) $description_7->delete();

        $image_1 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'image_1')
                    ->first();
        if ($image_1) $image_1->delete(); 

        $image_2 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'image_2')
                    ->first();
        if ($image_2) $image_2->delete();   
        
        $image_3 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'image_3')
                    ->first();
        if ($image_3) $image_3->delete(); 

        $image_4 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'image_4')
                    ->first();
        if ($image_4) $image_4->delete(); 

        $image_5 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'image_5')
                    ->first();
        if ($image_5) $image_5->delete(); 

        $image_6 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'image_6')
                    ->first();
        if ($image_6) $image_6->delete();     

        $image_7 = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'image_7')
                    ->first();
        if ($image_7) $image_7->delete();

        $color_enable = DataRow::where('data_type_id', $dataType->id)
                    ->where('field', 'color_enable')
                    ->first();
        if ($color_enable) $color_enable->delete();                                                           
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trends', function (Blueprint $table) {
            //
        });
    }
}
