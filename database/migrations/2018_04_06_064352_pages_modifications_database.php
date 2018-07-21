<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class PagesModificationsDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {

            $schema_builder = Schema::getConnection()
                ->getDoctrineSchemaManager()
                ->listTableDetails( $table->getTable() );

            if( $schema_builder->hasIndex('pages_slug_unique') )
                $table->dropUnique('pages_slug_unique');
        });

        // find DataType
        $dataType = DataType::where('name', 'pages')->first();

        if ($dataType) {

            // update
            $slug = DataRow::where('data_type_id', $dataType->id)
                                ->where('field', 'slug')
                                ->first();   
            $slug->details = '{"readonly":true,"template":{"slug":"columns-8-4","stack":"lf"},"slugify":{"origin":"title"}}';
            $slug->save();   

            //
            $meta_description = DataRow::where('data_type_id', $dataType->id)
                                ->where('field', 'meta_description')
                                ->first();
            $meta_description->type = 'text_area';          
            $meta_description->save();

            //
            $meta_keywords = DataRow::where('data_type_id', $dataType->id)
                                ->where('field', 'meta_keywords')
                                ->first();   
            $meta_keywords->type = 'text_area';   
            $meta_keywords->save();

            //                                                         
            $body = DataRow::where('data_type_id', $dataType->id)
                                ->where('field', 'body')
                                ->first();   
            $body->details = '{"template":{"slug":"columns-8-4","stack":"lf"}}';   
            $body->save();

            //
            $excerpt = DataRow::where('data_type_id', $dataType->id)
                                ->where('field', 'excerpt')
                                ->first();   
            $excerpt->details = '{"template":{"slug":"columns-8-4","stack":"rg"}}';   
            $excerpt->save();            
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
