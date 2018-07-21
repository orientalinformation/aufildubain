<?php

namespace App\Services;
Use App\Models\Product;
use App\Models\Brand;

class UtilsService
{

    public function human_filesize($bytes, $decimals = 2) {
        $sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
    }

    public function calculateProductOfBrand()
    {
        $brands =  Brand::all();

        if (count($brands) > 0) {
            
            foreach ($brands as $key => $brand) {

                $countProducts = Product::where('brand_id', '=', $brand->id)->count();
                $brand->num_of_products = $countProducts;
                $brand->save();
            }
        }
    }

    public function replaceTplVar($body) {
        // regex: slow, so try no to use it
        // $body = preg_replace("/{{\\s*?\\\$nb\\_salles\\s*?}}/i", setting('admin.number_of_showrooms'), $body);
        $body = str_replace('{{$nb_salles}}', setting('admin.number_of_showrooms'), $body);
        $body = str_replace('{{ $nb_salles }}', setting('admin.number_of_showrooms'), $body);
        $body = str_replace('{{$nb_salles }}', setting('admin.number_of_showrooms'), $body);
        $body = str_replace('{{ $nb_salles}}', setting('admin.number_of_showrooms'), $body);

        return $body;
    }
}