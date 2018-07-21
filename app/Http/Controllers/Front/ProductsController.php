<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductsController extends Controller
{
    public function category(Request $request, $slug)
    {
        $category = ProductCategory::select('id')->where('slug', $slug)->first();

        $subCategories = ProductCategory::where('parent_id', $category->id)->pluck('id')->toArray();

        array_push($subCategories, $category->id);

        $products = Product::whereIn('category_id',$subCategories)->where('visible',1)->where('images','<>','[]')->paginate(15);

        $category = ProductCategory::where('slug', $slug)->first();

        if (!$category)
            abort(404);

        if ($request->input('page', false)) {
            return view('front/products/partial', compact('category', 'products'));
        }

        return view('front/products/category', compact('category','products'));
    }

    public function subCategory(Request $request, $slugCategory, $slugSubCategory)
    {
        $category = ProductCategory::where('slug', $slugSubCategory)->first();
        
        if ($category) {

            $products = Product::where('category_id',$category->id)->where('visible',1)->where('images','<>','[]')->paginate(15);

            if ($request->input('page', false)) {
                return view('front/products/partial', compact('category', 'slugCategory', 'products'));
            }

            return view ('front/products/category', compact('category','slugCategory','products'));
        } else {
            $slugProduct = $slugSubCategory;
            $slugSubCategory = '';
            $product = Product::where('slug',$slugProduct)->first();            

            if ($product) {
                $category = $product->categoryId;
                $productSubs = Product::where('category_id',$product->category_id)->inRandomOrder()->where('visible',1)
                    ->where('images','<>','[]')->where('images','<>','')->whereNotNull('images')->paginate(15);
                return view ('front/products/detail', compact('category','slugSubCategory','product','productSubs'));
            }
        }
        return abort(404);
    }

    public function detail($slugCategory, $slugSubCategory, $slugProduct)
    {

        $category = ProductCategory::where('slug',$slugCategory)->first();

        $subCategories = ProductCategory::where('slug',$slugSubCategory)->first();
        
        $productSubs = Product::where('category_id',$subCategories->id)->inRandomOrder()->where('visible',1)
            ->where('images','<>','[]')->where('images','<>','')->whereNotNull('images')->paginate(15);

        $product = Product::where('slug',$slugProduct)->first();

        if (!$product) {
            abort(404);
        }
          
        return view ('front/products/detail', compact('category','slugSubCategory','product','productSubs'));
    }

}
