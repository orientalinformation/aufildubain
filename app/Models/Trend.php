<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;

class Trend extends Model
{
	use Translatable,
		SoftDeletes,
		Sluggable;
	
	protected $translatable = [];

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
                'source' => ['slug']
            ]
        ];
    }
    
	public function solutionId(){
	    return $this->belongsTo(Solution::class);
	} 	  
}
