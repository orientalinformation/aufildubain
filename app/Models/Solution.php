<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;

class Solution extends Model
{
	use Translatable,
		SoftDeletes,
		Sluggable;
	
	protected $translatable = ['name', 'trend_edito', 'slug'];

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

	public function parentSolutionId(){
	    return $this->belongsTo(Solution::class);
	} 
}
