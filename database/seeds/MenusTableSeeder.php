<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2018-02-23 07:19:47',
                'updated_at' => '2018-02-23 07:19:47',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'front',
                'created_at' => '2018-02-28 04:16:41',
                'updated_at' => '2018-02-28 04:16:53',
            ),
        ));
        
        
    }
}