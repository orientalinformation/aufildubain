<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (php_sapi_name() != "cli" && env('APP_ENV') != 'local') {

	if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off") {
		$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header('HTTP/1.1 301 Moved Permanently');
		header('Location: ' . $redirect);
		exit();
	}
	URL::forceScheme('https');
}

   
Route::group(['namespace'=>'Front'],function(){
	
	Route::get('/', ['as' => 'index', 'uses' => 'PagesController@index']);
	
	Route::get('salle-de-bain-{slug}.html', ['as' => 'store.view', 'uses' => 'StoresController@view']);

	Route::post('sendcontact', ['as' => 'sendcontact', 'uses' => 'PagesController@contact']);
	
    Route::get('tendances-moment/{slug}.html', ['as' => 'tendance.view', 'uses' => 'TrendsController@view']);
    
    Route::get('marques/{slug}.html', ['as' => 'brand.view', 'uses' => 'BrandsController@view']);

    Route::get('produits/{category}.html', ['as' => 'category.view', 'uses' => 'ProductsController@category']);
    
    Route::get('produits/{category}/{subCategory}.html', ['as' => 'subCategory.view', 'uses' => 'ProductsController@subCategory']);
    
    Route::get('produits/{category}/{subCategory}/{product}.html', ['as' => 'product.view', 'uses' => 'ProductsController@detail']);
    
    Route::get('salle-de-bains/{slug}.html', ['as' => 'project.view', 'uses' => 'ProjectsController@view']);

    Route::get('store.json', ['as' => 'store.json', 'uses' => 'StoresController@json']);

    Route::get('{slug}.html', ['as' => 'page.view', 'uses' => 'PagesController@index']);
});    



Route::group(['prefix' => 'admin'], function () {

    //Media
     Route::get('media/browser', 
        ['as'=>'voyager.media.browser', 'uses'=>'Voyager\VoyagerMediaController@browser']);

    // product
	Route::post('products/import',['as'=>'voyager.products.import', 'uses'=>'Back\ProductsController@import']);
	Route::post('products/export',['as'=>'voyager.products.export', 'uses'=>'Back\ProductsController@export']);

	//Store Photos
    Route::get('store-photos/{storeId}', 
        ['as'=>'voyager.store-photos.list', 'uses'=>'Back\StorePhotosController@index']);

    Route::get('store-photos/{storeId}/create', 
        ['as'=>'voyager.store-photos.add', 'uses'=>'Back\StorePhotosController@create']);

    Route::post('store-photos', 
        ['as'=>'voyager.store-photos.store', 'uses'=>'Back\StorePhotosController@store']);

    Route::put('store-photos/{id}', 
        ['as'=>'voyager.store-photos.update', 'uses'=>'Back\StorePhotosController@update']);

    // 
    Route::get('brands/update_number_products', 
        ['as'=>'voyager.brands.update_number_products', 'uses'=>'Back\BrandsController@updateNumOfProducts']);    

    Voyager::routes();

});
