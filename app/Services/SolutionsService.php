<?php

namespace App\Services;

use App\Models\Solution;
use Carbon\Carbon;

class SolutionsService
{

    public function menuItems()
    {
        return Solution::where('visible_menu', 1)->orderBy('solution_order')->get();
    }

    public function all()
    {
        return Solution::orderBy('solution_order')->get();
    }

}