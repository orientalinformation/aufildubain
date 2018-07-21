<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;

class Banner extends Model
{
	use Translatable,
		SoftDeletes;
	
	protected $translatable = ['name', 'code'];

	protected $dates = ['deleted_at'];
}
