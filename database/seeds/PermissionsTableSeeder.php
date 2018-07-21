<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2018-02-23 07:19:47',
                'updated_at' => '2018-02-23 07:19:47',
                'permission_group_id' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'browse_pages',
                'table_name' => 'pages',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'read_pages',
                'table_name' => 'pages',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'edit_pages',
                'table_name' => 'pages',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'add_pages',
                'table_name' => 'pages',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'delete_pages',
                'table_name' => 'pages',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'browse_posts',
                'table_name' => 'posts',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'key' => 'read_posts',
                'table_name' => 'posts',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'key' => 'edit_posts',
                'table_name' => 'posts',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'key' => 'add_posts',
                'table_name' => 'posts',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'key' => 'delete_posts',
                'table_name' => 'posts',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'key' => 'browse_categories',
                'table_name' => 'categories',
                'created_at' => '2018-02-23 07:19:48',
                'updated_at' => '2018-02-23 07:19:48',
                'permission_group_id' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'key' => 'read_categories',
                'table_name' => 'categories',
                'created_at' => '2018-02-23 07:19:49',
                'updated_at' => '2018-02-23 07:19:49',
                'permission_group_id' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'key' => 'edit_categories',
                'table_name' => 'categories',
                'created_at' => '2018-02-23 07:19:49',
                'updated_at' => '2018-02-23 07:19:49',
                'permission_group_id' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'key' => 'add_categories',
                'table_name' => 'categories',
                'created_at' => '2018-02-23 07:19:49',
                'updated_at' => '2018-02-23 07:19:49',
                'permission_group_id' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'key' => 'delete_categories',
                'table_name' => 'categories',
                'created_at' => '2018-02-23 07:19:49',
                'updated_at' => '2018-02-23 07:19:49',
                'permission_group_id' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2018-02-23 07:19:49',
                'updated_at' => '2018-02-23 07:19:49',
                'permission_group_id' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2018-02-23 07:19:49',
                'updated_at' => '2018-02-23 07:19:49',
                'permission_group_id' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2018-02-23 07:19:49',
                'updated_at' => '2018-02-23 07:19:49',
                'permission_group_id' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2018-02-23 07:19:49',
                'updated_at' => '2018-02-23 07:19:49',
                'permission_group_id' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2018-02-23 07:19:49',
                'updated_at' => '2018-02-23 07:19:49',
                'permission_group_id' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'key' => 'browse_hooks',
                'table_name' => NULL,
                'created_at' => '2018-02-23 07:19:52',
                'updated_at' => '2018-02-23 07:19:52',
                'permission_group_id' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'key' => 'browse_products',
                'table_name' => 'products',
                'created_at' => '2018-02-23 07:22:59',
                'updated_at' => '2018-02-23 07:22:59',
                'permission_group_id' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'key' => 'read_products',
                'table_name' => 'products',
                'created_at' => '2018-02-23 07:22:59',
                'updated_at' => '2018-02-23 07:22:59',
                'permission_group_id' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'key' => 'edit_products',
                'table_name' => 'products',
                'created_at' => '2018-02-23 07:22:59',
                'updated_at' => '2018-02-23 07:22:59',
                'permission_group_id' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'key' => 'add_products',
                'table_name' => 'products',
                'created_at' => '2018-02-23 07:22:59',
                'updated_at' => '2018-02-23 07:22:59',
                'permission_group_id' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'key' => 'delete_products',
                'table_name' => 'products',
                'created_at' => '2018-02-23 07:22:59',
                'updated_at' => '2018-02-23 07:22:59',
                'permission_group_id' => NULL,
            ),
            45 => 
            array (
                'id' => 66,
                'key' => 'browse_brands',
                'table_name' => 'brands',
                'created_at' => '2018-02-26 03:38:03',
                'updated_at' => '2018-02-26 03:38:03',
                'permission_group_id' => NULL,
            ),
            46 => 
            array (
                'id' => 67,
                'key' => 'read_brands',
                'table_name' => 'brands',
                'created_at' => '2018-02-26 03:38:03',
                'updated_at' => '2018-02-26 03:38:03',
                'permission_group_id' => NULL,
            ),
            47 => 
            array (
                'id' => 68,
                'key' => 'edit_brands',
                'table_name' => 'brands',
                'created_at' => '2018-02-26 03:38:03',
                'updated_at' => '2018-02-26 03:38:03',
                'permission_group_id' => NULL,
            ),
            48 => 
            array (
                'id' => 69,
                'key' => 'add_brands',
                'table_name' => 'brands',
                'created_at' => '2018-02-26 03:38:03',
                'updated_at' => '2018-02-26 03:38:03',
                'permission_group_id' => NULL,
            ),
            49 => 
            array (
                'id' => 70,
                'key' => 'delete_brands',
                'table_name' => 'brands',
                'created_at' => '2018-02-26 03:38:03',
                'updated_at' => '2018-02-26 03:38:03',
                'permission_group_id' => NULL,
            ),
            50 => 
            array (
                'id' => 91,
                'key' => 'browse_product_categories',
                'table_name' => 'product_categories',
                'created_at' => '2018-02-26 07:57:57',
                'updated_at' => '2018-02-26 07:57:57',
                'permission_group_id' => NULL,
            ),
            51 => 
            array (
                'id' => 92,
                'key' => 'read_product_categories',
                'table_name' => 'product_categories',
                'created_at' => '2018-02-26 07:57:57',
                'updated_at' => '2018-02-26 07:57:57',
                'permission_group_id' => NULL,
            ),
            52 => 
            array (
                'id' => 93,
                'key' => 'edit_product_categories',
                'table_name' => 'product_categories',
                'created_at' => '2018-02-26 07:57:57',
                'updated_at' => '2018-02-26 07:57:57',
                'permission_group_id' => NULL,
            ),
            53 => 
            array (
                'id' => 94,
                'key' => 'add_product_categories',
                'table_name' => 'product_categories',
                'created_at' => '2018-02-26 07:57:57',
                'updated_at' => '2018-02-26 07:57:57',
                'permission_group_id' => NULL,
            ),
            54 => 
            array (
                'id' => 95,
                'key' => 'delete_product_categories',
                'table_name' => 'product_categories',
                'created_at' => '2018-02-26 07:57:57',
                'updated_at' => '2018-02-26 07:57:57',
                'permission_group_id' => NULL,
            ),
            55 => 
            array (
                'id' => 96,
                'key' => 'browse_bread_templates',
                'table_name' => 'bread_templates',
                'created_at' => '2018-02-26 13:24:54',
                'updated_at' => '2018-02-26 13:24:54',
                'permission_group_id' => NULL,
            ),
            56 => 
            array (
                'id' => 97,
                'key' => 'read_bread_templates',
                'table_name' => 'bread_templates',
                'created_at' => '2018-02-26 13:24:54',
                'updated_at' => '2018-02-26 13:24:54',
                'permission_group_id' => NULL,
            ),
            57 => 
            array (
                'id' => 98,
                'key' => 'edit_bread_templates',
                'table_name' => 'bread_templates',
                'created_at' => '2018-02-26 13:24:54',
                'updated_at' => '2018-02-26 13:24:54',
                'permission_group_id' => NULL,
            ),
            58 => 
            array (
                'id' => 99,
                'key' => 'add_bread_templates',
                'table_name' => 'bread_templates',
                'created_at' => '2018-02-26 13:24:54',
                'updated_at' => '2018-02-26 13:24:54',
                'permission_group_id' => NULL,
            ),
            59 => 
            array (
                'id' => 100,
                'key' => 'delete_bread_templates',
                'table_name' => 'bread_templates',
                'created_at' => '2018-02-26 13:24:54',
                'updated_at' => '2018-02-26 13:24:54',
                'permission_group_id' => NULL,
            ),
            60 => 
            array (
                'id' => 101,
                'key' => 'browse_trends',
                'table_name' => 'trends',
                'created_at' => '2018-02-27 04:10:06',
                'updated_at' => '2018-02-27 04:10:06',
                'permission_group_id' => NULL,
            ),
            61 => 
            array (
                'id' => 102,
                'key' => 'read_trends',
                'table_name' => 'trends',
                'created_at' => '2018-02-27 04:10:06',
                'updated_at' => '2018-02-27 04:10:06',
                'permission_group_id' => NULL,
            ),
            62 => 
            array (
                'id' => 103,
                'key' => 'edit_trends',
                'table_name' => 'trends',
                'created_at' => '2018-02-27 04:10:06',
                'updated_at' => '2018-02-27 04:10:06',
                'permission_group_id' => NULL,
            ),
            63 => 
            array (
                'id' => 104,
                'key' => 'add_trends',
                'table_name' => 'trends',
                'created_at' => '2018-02-27 04:10:06',
                'updated_at' => '2018-02-27 04:10:06',
                'permission_group_id' => NULL,
            ),
            64 => 
            array (
                'id' => 105,
                'key' => 'delete_trends',
                'table_name' => 'trends',
                'created_at' => '2018-02-27 04:10:06',
                'updated_at' => '2018-02-27 04:10:06',
                'permission_group_id' => NULL,
            ),
            65 => 
            array (
                'id' => 116,
                'key' => 'browse_slide_shows',
                'table_name' => 'slide_shows',
                'created_at' => '2018-02-27 04:32:02',
                'updated_at' => '2018-02-27 04:32:02',
                'permission_group_id' => NULL,
            ),
            66 => 
            array (
                'id' => 117,
                'key' => 'read_slide_shows',
                'table_name' => 'slide_shows',
                'created_at' => '2018-02-27 04:32:02',
                'updated_at' => '2018-02-27 04:32:02',
                'permission_group_id' => NULL,
            ),
            67 => 
            array (
                'id' => 118,
                'key' => 'edit_slide_shows',
                'table_name' => 'slide_shows',
                'created_at' => '2018-02-27 04:32:02',
                'updated_at' => '2018-02-27 04:32:02',
                'permission_group_id' => NULL,
            ),
            68 => 
            array (
                'id' => 119,
                'key' => 'add_slide_shows',
                'table_name' => 'slide_shows',
                'created_at' => '2018-02-27 04:32:02',
                'updated_at' => '2018-02-27 04:32:02',
                'permission_group_id' => NULL,
            ),
            69 => 
            array (
                'id' => 120,
                'key' => 'delete_slide_shows',
                'table_name' => 'slide_shows',
                'created_at' => '2018-02-27 04:32:02',
                'updated_at' => '2018-02-27 04:32:02',
                'permission_group_id' => NULL,
            ),
            70 => 
            array (
                'id' => 121,
                'key' => 'browse_banners',
                'table_name' => 'banners',
                'created_at' => '2018-02-27 04:36:30',
                'updated_at' => '2018-02-27 04:36:30',
                'permission_group_id' => NULL,
            ),
            71 => 
            array (
                'id' => 122,
                'key' => 'read_banners',
                'table_name' => 'banners',
                'created_at' => '2018-02-27 04:36:30',
                'updated_at' => '2018-02-27 04:36:30',
                'permission_group_id' => NULL,
            ),
            72 => 
            array (
                'id' => 123,
                'key' => 'edit_banners',
                'table_name' => 'banners',
                'created_at' => '2018-02-27 04:36:30',
                'updated_at' => '2018-02-27 04:36:30',
                'permission_group_id' => NULL,
            ),
            73 => 
            array (
                'id' => 124,
                'key' => 'add_banners',
                'table_name' => 'banners',
                'created_at' => '2018-02-27 04:36:30',
                'updated_at' => '2018-02-27 04:36:30',
                'permission_group_id' => NULL,
            ),
            74 => 
            array (
                'id' => 125,
                'key' => 'delete_banners',
                'table_name' => 'banners',
                'created_at' => '2018-02-27 04:36:30',
                'updated_at' => '2018-02-27 04:36:30',
                'permission_group_id' => NULL,
            ),
            75 => 
            array (
                'id' => 131,
                'key' => 'browse_solutions',
                'table_name' => 'solutions',
                'created_at' => '2018-02-27 04:56:43',
                'updated_at' => '2018-02-27 04:56:43',
                'permission_group_id' => NULL,
            ),
            76 => 
            array (
                'id' => 132,
                'key' => 'read_solutions',
                'table_name' => 'solutions',
                'created_at' => '2018-02-27 04:56:43',
                'updated_at' => '2018-02-27 04:56:43',
                'permission_group_id' => NULL,
            ),
            77 => 
            array (
                'id' => 133,
                'key' => 'edit_solutions',
                'table_name' => 'solutions',
                'created_at' => '2018-02-27 04:56:43',
                'updated_at' => '2018-02-27 04:56:43',
                'permission_group_id' => NULL,
            ),
            78 => 
            array (
                'id' => 134,
                'key' => 'add_solutions',
                'table_name' => 'solutions',
                'created_at' => '2018-02-27 04:56:44',
                'updated_at' => '2018-02-27 04:56:44',
                'permission_group_id' => NULL,
            ),
            79 => 
            array (
                'id' => 135,
                'key' => 'delete_solutions',
                'table_name' => 'solutions',
                'created_at' => '2018-02-27 04:56:44',
                'updated_at' => '2018-02-27 04:56:44',
                'permission_group_id' => NULL,
            ),
            80 => 
            array (
                'id' => 136,
                'key' => 'browse_vouchers',
                'table_name' => 'vouchers',
                'created_at' => '2018-02-27 04:58:36',
                'updated_at' => '2018-02-27 04:58:36',
                'permission_group_id' => NULL,
            ),
            81 => 
            array (
                'id' => 137,
                'key' => 'read_vouchers',
                'table_name' => 'vouchers',
                'created_at' => '2018-02-27 04:58:36',
                'updated_at' => '2018-02-27 04:58:36',
                'permission_group_id' => NULL,
            ),
            82 => 
            array (
                'id' => 138,
                'key' => 'edit_vouchers',
                'table_name' => 'vouchers',
                'created_at' => '2018-02-27 04:58:36',
                'updated_at' => '2018-02-27 04:58:36',
                'permission_group_id' => NULL,
            ),
            83 => 
            array (
                'id' => 139,
                'key' => 'add_vouchers',
                'table_name' => 'vouchers',
                'created_at' => '2018-02-27 04:58:36',
                'updated_at' => '2018-02-27 04:58:36',
                'permission_group_id' => NULL,
            ),
            84 => 
            array (
                'id' => 140,
                'key' => 'delete_vouchers',
                'table_name' => 'vouchers',
                'created_at' => '2018-02-27 04:58:36',
                'updated_at' => '2018-02-27 04:58:36',
                'permission_group_id' => NULL,
            ),
            85 => 
            array (
                'id' => 146,
                'key' => 'browse_stores',
                'table_name' => 'stores',
                'created_at' => '2018-02-28 07:47:27',
                'updated_at' => '2018-02-28 07:47:27',
                'permission_group_id' => NULL,
            ),
            86 => 
            array (
                'id' => 147,
                'key' => 'read_stores',
                'table_name' => 'stores',
                'created_at' => '2018-02-28 07:47:27',
                'updated_at' => '2018-02-28 07:47:27',
                'permission_group_id' => NULL,
            ),
            87 => 
            array (
                'id' => 148,
                'key' => 'edit_stores',
                'table_name' => 'stores',
                'created_at' => '2018-02-28 07:47:27',
                'updated_at' => '2018-02-28 07:47:27',
                'permission_group_id' => NULL,
            ),
            88 => 
            array (
                'id' => 149,
                'key' => 'add_stores',
                'table_name' => 'stores',
                'created_at' => '2018-02-28 07:47:27',
                'updated_at' => '2018-02-28 07:47:27',
                'permission_group_id' => NULL,
            ),
            89 => 
            array (
                'id' => 150,
                'key' => 'delete_stores',
                'table_name' => 'stores',
                'created_at' => '2018-02-28 07:47:27',
                'updated_at' => '2018-02-28 07:47:27',
                'permission_group_id' => NULL,
            ),
            90 => 
            array (
                'id' => 151,
                'key' => 'browse_store_photos',
                'table_name' => 'store_photos',
                'created_at' => '2018-03-08 04:25:16',
                'updated_at' => '2018-03-08 04:25:16',
                'permission_group_id' => NULL,
            ),
            91 => 
            array (
                'id' => 152,
                'key' => 'read_store_photos',
                'table_name' => 'store_photos',
                'created_at' => '2018-03-08 04:25:16',
                'updated_at' => '2018-03-08 04:25:16',
                'permission_group_id' => NULL,
            ),
            92 => 
            array (
                'id' => 153,
                'key' => 'edit_store_photos',
                'table_name' => 'store_photos',
                'created_at' => '2018-03-08 04:25:16',
                'updated_at' => '2018-03-08 04:25:16',
                'permission_group_id' => NULL,
            ),
            93 => 
            array (
                'id' => 154,
                'key' => 'add_store_photos',
                'table_name' => 'store_photos',
                'created_at' => '2018-03-08 04:25:16',
                'updated_at' => '2018-03-08 04:25:16',
                'permission_group_id' => NULL,
            ),
            94 => 
            array (
                'id' => 155,
                'key' => 'delete_store_photos',
                'table_name' => 'store_photos',
                'created_at' => '2018-03-08 04:25:16',
                'updated_at' => '2018-03-08 04:25:16',
                'permission_group_id' => NULL,
            ),
        ));
        
        
    }
}