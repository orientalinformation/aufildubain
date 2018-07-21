<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;

class Brand extends Model
{
	use Translatable,
		SoftDeletes,
		Sluggable;
	
	protected $translatable = ['title', 'description', 'meta_title', 'meta_description', 'meta_keywords', 'slug'];

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
                'source' => 'slug'
            ]
        ];
    }	
    public function storeId() {

        return $this->belongsToMany('App\Models\Store','store_brands','brand_id','store_id');
    }
}
