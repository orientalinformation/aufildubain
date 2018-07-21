<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trend;

class TrendsController extends Controller
{


    public function view($slug)
    {
        $trend = Trend::where('slug', $slug)->first();

        if (!$trend)
            abort(404);

        return view('front/tendances/view', compact('trend'));
    }
}
