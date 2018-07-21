<?php

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'menu_id' => 1,
                'title' => 'Dashboard',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 1,
                'created_at' => '2018-02-23 07:19:47',
                'updated_at' => '2018-02-23 07:19:47',
                'route' => 'voyager.dashboard',
                'parameters' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'menu_id' => 1,
                'title' => 'Media',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-images',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 11,
                'created_at' => '2018-02-23 07:19:47',
                'updated_at' => '2018-03-08 04:26:21',
                'route' => 'voyager.media.index',
                'parameters' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'menu_id' => 1,
                'title' => 'Posts',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-news',
                'color' => NULL,
                'parent_id' => 17,
                'order' => 2,
                'created_at' => '2018-02-23 07:19:47',
                'updated_at' => '2018-02-26 06:17:20',
                'route' => 'voyager.posts.index',
                'parameters' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'menu_id' => 1,
                'title' => 'Users',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-person',
                'color' => NULL,
                'parent_id' => 18,
                'order' => 2,
                'created_at' => '2018-02-23 07:19:47',
                'updated_at' => '2018-02-23 07:36:37',
                'route' => 'voyager.users.index',
                'parameters' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'menu_id' => 1,
                'title' => 'Categories',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-categories',
                'color' => NULL,
                'parent_id' => 17,
                'order' => 1,
                'created_at' => '2018-02-23 07:19:47',
                'updated_at' => '2018-02-26 06:17:20',
                'route' => 'voyager.categories.index',
                'parameters' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'menu_id' => 1,
                'title' => 'Pages',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-file-text',
                'color' => NULL,
                'parent_id' => 17,
                'order' => 3,
                'created_at' => '2018-02-23 07:19:47',
                'updated_at' => '2018-02-26 06:17:20',
                'route' => 'voyager.pages.index',
                'parameters' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'menu_id' => 1,
                'title' => 'Roles',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lock',
                'color' => NULL,
                'parent_id' => 18,
                'order' => 1,
                'created_at' => '2018-02-23 07:19:47',
                'updated_at' => '2018-02-23 07:36:37',
                'route' => 'voyager.roles.index',
                'parameters' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'menu_id' => 1,
                'title' => 'Developer Tools',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tools',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 14,
                'created_at' => '2018-02-23 07:19:47',
                'updated_at' => '2018-03-08 04:26:21',
                'route' => NULL,
                'parameters' => '',
            ),
            8 => 
            array (
                'id' => 9,
                'menu_id' => 1,
                'title' => 'Menu Builder',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-list',
                'color' => NULL,
                'parent_id' => 8,
                'order' => 1,
                'created_at' => '2018-02-23 07:19:47',
                'updated_at' => '2018-02-23 07:26:24',
                'route' => 'voyager.menus.index',
                'parameters' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'menu_id' => 1,
                'title' => 'Database',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-data',
                'color' => NULL,
                'parent_id' => 8,
                'order' => 2,
                'created_at' => '2018-02-23 07:19:47',
                'updated_at' => '2018-02-23 07:26:24',
                'route' => 'voyager.database.index',
                'parameters' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'menu_id' => 1,
                'title' => 'Compass',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-compass',
                'color' => NULL,
                'parent_id' => 8,
                'order' => 3,
                'created_at' => '2018-02-23 07:19:47',
                'updated_at' => '2018-02-23 07:26:24',
                'route' => 'voyager.compass.index',
                'parameters' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'menu_id' => 1,
                'title' => 'Settings',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-settings',
                'color' => NULL,
                'parent_id' => 18,
                'order' => 3,
                'created_at' => '2018-02-23 07:19:47',
                'updated_at' => '2018-02-23 07:36:37',
                'route' => 'voyager.settings.index',
                'parameters' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'menu_id' => 1,
                'title' => 'Hooks',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-hook',
                'color' => NULL,
                'parent_id' => 8,
                'order' => 5,
                'created_at' => '2018-02-23 07:19:52',
                'updated_at' => '2018-02-26 06:20:26',
                'route' => 'voyager.hooks',
                'parameters' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'menu_id' => 1,
                'title' => 'Products',
                'url' => '/admin/products',
                'target' => '_self',
                'icon_class' => 'fas fa-cube',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 3,
                'created_at' => '2018-02-23 07:22:59',
                'updated_at' => '2018-03-06 03:37:53',
                'route' => NULL,
                'parameters' => '',
            ),
            14 => 
            array (
                'id' => 15,
                'menu_id' => 1,
                'title' => 'Product Categories',
                'url' => '/admin/product-categories',
                'target' => '_self',
                'icon_class' => 'far fa-folder-open',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 2,
                'created_at' => '2018-02-23 07:25:02',
                'updated_at' => '2018-03-05 11:34:14',
                'route' => NULL,
                'parameters' => '',
            ),
            15 => 
            array (
                'id' => 17,
                'menu_id' => 1,
                'title' => 'CMS',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'far fa-newspaper',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 12,
                'created_at' => '2018-02-23 07:35:24',
                'updated_at' => '2018-03-08 04:26:21',
                'route' => NULL,
                'parameters' => '',
            ),
            16 => 
            array (
                'id' => 18,
                'menu_id' => 1,
                'title' => 'System',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'fas fa-cogs',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 13,
                'created_at' => '2018-02-23 07:36:09',
                'updated_at' => '2018-03-08 04:26:21',
                'route' => NULL,
                'parameters' => '',
            ),
            17 => 
            array (
                'id' => 20,
                'menu_id' => 1,
                'title' => 'Brands',
                'url' => '/admin/brands',
                'target' => '_self',
                'icon_class' => 'fas fa-industry',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 6,
                'created_at' => '2018-02-26 03:02:22',
                'updated_at' => '2018-03-08 04:26:20',
                'route' => NULL,
                'parameters' => '',
            ),
            18 => 
            array (
                'id' => 22,
                'menu_id' => 1,
                'title' => 'Trends',
                'url' => '/admin/trends',
                'target' => '_self',
                'icon_class' => 'fas fa-chart-line',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 7,
                'created_at' => '2018-02-26 06:28:04',
                'updated_at' => '2018-03-08 04:26:20',
                'route' => NULL,
                'parameters' => '',
            ),
            19 => 
            array (
                'id' => 23,
                'menu_id' => 1,
                'title' => 'Templates',
                'url' => '/admin/templates',
                'target' => '_self',
                'icon_class' => 'voyager-megaphone',
                'color' => '#000000',
                'parent_id' => 8,
                'order' => 4,
                'created_at' => '2018-02-26 13:24:53',
                'updated_at' => '2018-02-26 13:35:58',
                'route' => NULL,
                'parameters' => '',
            ),
            20 => 
            array (
                'id' => 25,
                'menu_id' => 1,
                'title' => 'Stores',
                'url' => '/admin/stores',
                'target' => '_self',
                'icon_class' => 'fa fa-building',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 5,
                'created_at' => '2018-02-27 04:22:48',
                'updated_at' => '2018-03-08 04:26:20',
                'route' => NULL,
                'parameters' => '',
            ),
            21 => 
            array (
                'id' => 26,
                'menu_id' => 1,
                'title' => 'Slide Shows',
                'url' => '/admin/slide-shows',
                'target' => '_self',
                'icon_class' => 'far fa-images',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 8,
                'created_at' => '2018-02-27 04:32:02',
                'updated_at' => '2018-03-08 04:26:20',
                'route' => NULL,
                'parameters' => '',
            ),
            22 => 
            array (
                'id' => 27,
                'menu_id' => 1,
                'title' => 'Banners',
                'url' => '/admin/banners',
                'target' => '_self',
                'icon_class' => 'far fa-image',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 4,
                'created_at' => '2018-02-27 04:36:30',
                'updated_at' => '2018-03-05 11:34:23',
                'route' => NULL,
                'parameters' => '',
            ),
            23 => 
            array (
                'id' => 28,
                'menu_id' => 1,
                'title' => 'Flash Banners',
                'url' => '/admin/flash-banners',
                'target' => '_self',
                'icon_class' => 'voyager-play',
                'color' => '#000000',
                'parent_id' => 31,
                'order' => 1,
                'created_at' => '2018-02-27 04:43:17',
                'updated_at' => '2018-03-05 11:34:23',
                'route' => NULL,
                'parameters' => '',
            ),
            24 => 
            array (
                'id' => 29,
                'menu_id' => 1,
                'title' => 'Solutions',
                'url' => '/admin/solutions',
                'target' => '_self',
                'icon_class' => 'far fa-file-alt',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 9,
                'created_at' => '2018-02-27 04:56:44',
                'updated_at' => '2018-03-08 04:26:20',
                'route' => NULL,
                'parameters' => '',
            ),
            25 => 
            array (
                'id' => 30,
                'menu_id' => 1,
                'title' => 'Vouchers',
                'url' => '/admin/vouchers',
                'target' => '_self',
                'icon_class' => 'fas fa-ticket-alt',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 10,
                'created_at' => '2018-02-27 04:58:36',
                'updated_at' => '2018-03-08 04:26:20',
                'route' => NULL,
                'parameters' => '',
            ),
            26 => 
            array (
                'id' => 32,
                'menu_id' => 2,
                'title' => 'Solutions',
                'url' => 'salle-de-bains.html',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 14,
                'created_at' => '2018-02-28 04:17:21',
                'updated_at' => '2018-03-06 03:35:51',
                'route' => NULL,
                'parameters' => '',
            ),
            27 => 
            array (
                'id' => 33,
                'menu_id' => 2,
                'title' => 'Products',
                'url' => 'produits.html',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 15,
                'created_at' => '2018-02-28 04:17:37',
                'updated_at' => '2018-03-06 03:38:26',
                'route' => NULL,
                'parameters' => '',
            ),
            28 => 
            array (
                'id' => 35,
                'menu_id' => 2,
                'title' => 'Votre projet',
                'url' => 'votre-projet.html',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 16,
                'created_at' => '2018-02-28 04:45:09',
                'updated_at' => '2018-03-06 03:36:10',
                'route' => NULL,
                'parameters' => '',
            ),
            29 => 
            array (
                'id' => 36,
                'menu_id' => 2,
                'title' => 'Trouvez votre espace',
                'url' => 'trouvez-votre-magasin.html',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 17,
                'created_at' => '2018-02-28 04:45:20',
                'updated_at' => '2018-03-06 03:36:30',
                'route' => NULL,
                'parameters' => '',
            ),
            30 => 
            array (
                'id' => 37,
                'menu_id' => 2,
                'title' => 'Tendance du moment',
                'url' => 'tendance-moment.html',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 18,
                'created_at' => '2018-02-28 04:45:33',
                'updated_at' => '2018-03-06 03:36:49',
                'route' => NULL,
                'parameters' => '',
            ),
            31 => 
            array (
                'id' => 38,
                'menu_id' => 2,
                'title' => 'A propos',
                'url' => 'qui-sommes-nous.html',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 19,
                'created_at' => '2018-02-28 04:45:44',
                'updated_at' => '2018-03-06 03:37:07',
                'route' => NULL,
                'parameters' => '',
            ),
        ));
        
        
    }
}