<?php

namespace App\Services;
use App\Models\Brand;
class BrandsService
{
	public function all()
	{
		return Brand::orderBy('title')->get();
	}

}