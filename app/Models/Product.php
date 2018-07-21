<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
	use Translatable,
		SoftDeletes,
		Sluggable;

	protected $translatable = ['title', 'type', 'reference', 'grip', 'description', 'more_1', 'more_2', 'more_3', 'image_alt', 'meta_title', 'meta_description', 'meta_keywords'];	

	protected $dates = ['deleted_at'];

 	/**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['title', 'brandId.title']
            ]
        ];
    }
    
  	public function brandId(){
	    return $this->belongsTo(Brand::class,'brand_id', 'id');
	}

	public function categoryId(){
	    return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
	}	 
}
