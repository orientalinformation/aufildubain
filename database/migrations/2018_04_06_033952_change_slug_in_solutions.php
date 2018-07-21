<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSlugInSolutions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solutions', function (Blueprint $table) {
            $schema_builder = Schema::getConnection()
                ->getDoctrineSchemaManager()
                ->listTableDetails( $table->getTable() );

            if( $schema_builder->hasIndex('solutions_slug_unique') )
                $table->dropUnique('solutions_slug_unique');
        });
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
