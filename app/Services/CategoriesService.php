<?php

namespace App\Services;
Use App\Models\ProductCategory;

class CategoriesService
{
	public function topCategories()
	{
		return ProductCategory::where('parent_id',0)->get();
	}

	public function subCategories($parentId)
	{
		return ProductCategory::where('parent_id',$parentId)->get();
	}


	public function getId($id)
	{
		return ProductCategory::where('id',$id)->first();
	}

	
	
}
