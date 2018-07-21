<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Solution;

class ProjectsController extends Controller
{


    public function view($slug)
    {
        $project = Solution::where('slug', $slug)->first();

        if (!$project)
            abort(404);

        return view('front/projects/view', compact('project'));
    }
}
