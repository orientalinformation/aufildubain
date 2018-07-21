<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;

class SlideShow extends Model
{
	use SoftDeletes;
	
	// protected $translatable = ['title', 'sub_title', 'image_alt', 'btn_link', 'title_image_min'];

	protected $dates = ['deleted_at'];
}
