<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;


class BrandsController extends Controller
{
    public function view(Request $request, $slug)
    {
        $brand = Brand::where('slug', $slug)->first();

        if (!$brand)
            abort(404);

        $products = Product::where('brand_id', $brand->id)->where('visible', 1)->paginate(25);

        if ($request->input('page', false)) {
            return view('front/products/partial', compact('products'));
        }

        return view('front/brands/view', compact('brand', 'slug', 'products'));
    }

}
