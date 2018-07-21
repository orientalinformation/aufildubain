<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class SolutionsModificationsDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solutions', function (Blueprint $table) {
            $table->text('meta_description', 65535)->nullable();
            $table->text('meta_keywords', 65535)->nullable();
            $table->string('meta_title', 191)->nullable();
        });

        // find DataType
        $dataType = DataType::where('name', 'solutions')->first();

        if ($dataType) {

            //remove start & end fields if exist
            $meta_description = DataRow::where('data_type_id', $dataType->id)
                                    ->where('field', 'meta_description')
                                    ->first();
            if ($meta_description) $meta_description->delete();

            //
            $meta_keywords = DataRow::where('data_type_id', $dataType->id)
                                ->where('field', 'meta_keywords')
                                ->first();
            if ($meta_keywords) $meta_keywords->delete();

            //
            $meta_title = DataRow::where('data_type_id', $dataType->id)
                            ->where('field', 'meta_title')
                            ->first();
            if ($meta_title) $meta_title->delete();

            //add
            $meta_title = new DataRow();
            $meta_title->data_type_id = $dataType->id;
            $meta_title->field = 'meta_title';
            $meta_title->type = 'text';
            $meta_title->display_name = 'Meta Title';
            $meta_title->required = 0;
            $meta_title->browse = 0;
            $meta_title->read = 1;
            $meta_title->edit = 1;
            $meta_title->add = 1;
            $meta_title->delete = 0;
            $meta_title->details = '{"template":{"slug":"columns-8-4","stack":"rg"}}';
            $meta_title->order = 17;
            $meta_title->save();

            $meta_description = new DataRow();
            $meta_description->data_type_id = $dataType->id;
            $meta_description->field = 'meta_description';
            $meta_description->type = 'text_area';
            $meta_description->display_name = 'Meta Description';
            $meta_description->required = 0;
            $meta_description->browse = 0;
            $meta_description->read = 1;
            $meta_description->edit = 1;
            $meta_description->add = 1;
            $meta_description->delete = 0;
            $meta_description->details = '{"template":{"slug":"columns-8-4","stack":"rg"}}';
            $meta_description->order = 18;
            $meta_description->save();

            $meta_keywords = new DataRow();
            $meta_keywords->data_type_id = $dataType->id;
            $meta_keywords->field = 'meta_keywords';
            $meta_keywords->type = 'text_area';
            $meta_keywords->display_name = 'Meta Keywords';
            $meta_keywords->required = 0;
            $meta_keywords->browse = 0;
            $meta_keywords->read = 1;
            $meta_keywords->edit = 1;
            $meta_keywords->add = 1;
            $meta_keywords->delete = 0;
            $meta_keywords->details = '{"template":{"slug":"columns-8-4","stack":"rg"}}';
            $meta_keywords->order = 19;
            $meta_keywords->save();                        

            // update
            $visible_menu = DataRow::where('data_type_id', $dataType->id)
                                ->where('field', 'visible_menu')
                                ->first();   
            $visible_menu->details = '{"template":{"slug":"columns-8-4","stack":"lf"},"on":"Oui","off":"Non"}';
            $visible_menu->order = 11;
            $visible_menu->save();                                                        
        }                
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solutions', function (Blueprint $table) {
            $table->dropColumn('meta_description');
            $table->dropColumn('meta_keywords');
            $table->dropColumn('meta_title');
        });
    }
}
