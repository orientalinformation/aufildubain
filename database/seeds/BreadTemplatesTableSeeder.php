<?php

use Illuminate\Database\Seeder;

class BreadTemplatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bread_templates')->delete();
        
        \DB::table('bread_templates')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Columns 8/4',
                'slug' => 'columns-8-4',
                'view' => '<div class="row">
<div class="col-sm-8 col-md-8 col-lg-8">
<div class="panel panel-body">@stack("lf")</div>
</div>
<div class="col-sm-4 col-md-4 col-lg-4">
<div class="panel panel-body">@stack("rg")</div>
</div>
</div>',
                'created_at' => '2018-02-26 13:24:53',
                'updated_at' => '2018-02-26 13:47:19',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Columns 6/6',
                'slug' => 'columns-6-6',
                'view' => '<div class="row">
<div class="col-sm-6 col-md-6 col-lg-6">
<div class="panel panel-body">@stack("lf")</div>
</div>
<div class="col-sm-6 col-md-6 col-lg-6">
<div class="panel panel-body">@stack("rg")</div>
</div>
</div>',
                'created_at' => '2018-02-26 13:24:53',
                'updated_at' => '2018-02-26 13:46:21',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Columns 4/8',
                'slug' => 'columns-4-8',
                'view' => '<div class="row">
<div class="col-sm-4 col-md-4 col-lg-4">
<div class="panel panel-body">@stack("r01_rg")</div>
</div>
<div class="col-sm-8 col-md-8 col-lg-8">
<div class="panel panel-body">@stack("r01_lf")</div>
</div>
</div>
<div class="row">
<div class="col-sm-4 col-md-4 col-lg-4">
<div class="panel panel-body">@stack("r02_rg")</div>
</div>
<div class="col-sm-8 col-md-8 col-lg-8">
<div class="panel panel-body">@stack("r02_lf")</div>
</div>
</div>',
                'created_at' => '2018-02-26 13:24:53',
                'updated_at' => '2018-02-26 13:24:53',
            ),
        ));
        
        
    }
}