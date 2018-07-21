<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;

class Voucher extends Model
{
	use Translatable,
		SoftDeletes;
	
	protected $translatable = [];
	
	protected $dates = ['deleted_at'];

	public function storeId(){
	    return $this->belongsTo(Store::class);
	} 	        
}
