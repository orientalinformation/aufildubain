<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Store;

class StoresController extends Controller
{
	public function view($slug)
	{
		
		$store = Store::where('slug',$slug)->with('brandId')->with('storePhotoId')->orderBy('zip', 'desc')->first();

		if (!$store) {
			abort(404);
		}

		$gps =  $store->getCoordinates();

		$store->lat = $gps[0]['lat'];
		$store->lng = $gps[0]['lng'];

		return view('front/store/view',compact('store'));
	}


	public function json()
	{
		return Store::all();
	}
}
