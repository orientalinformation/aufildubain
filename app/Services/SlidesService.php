<?php

namespace App\Services;

use App\Models\SlideShow;
use Carbon\Carbon;

class SlidesService
{
    function byTitle($title) {
        return SlideShow::where('title', $title)->first();
    }

    function all() {
        return SlideShow::where('start_date', '<=', Carbon::now())
            ->where('end_date', '>=', Carbon::now())->orderBy('order')->get();
    }

}