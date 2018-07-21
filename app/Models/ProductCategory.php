<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductCategory extends Model
{
	use Translatable,
		SoftDeletes,
		Sluggable;

    protected $translatable = ['name', 'grip', 'description', 'meta_title', 'meta_description', 'meta_keywords', 'image_alt'];

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
                'source' => 'name'
            ]
        ];
    }
    
  	public function parentId(){
	    return $this->belongsTo(ProductCategory::class);
	}

    public function productId(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }    
}
