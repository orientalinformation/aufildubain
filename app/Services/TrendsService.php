<?php

namespace App\Services;
use App\Models\Trend;

class TrendsService
{
    
    public function all() {
        return Trend::where('status', 2)->get();
    }

    public function topMenu() {
        return Trend::where('status', 2)->orderBy('id')->get();
    }
   
}