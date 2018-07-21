<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Voyager\VoyagerBreadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductCategory;
use Illuminate\Support\Str;
use App\Services\UtilsService;
use App\Services\ProductsService;

/**
* 
*/
class ProductsController extends VoyagerBreadController
{
    /**
     * @var App\Services\UtilsService
     */
    protected $utils;

    /**
     * @var App\Services\ProductsService
     */
    protected $products;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UtilsService $utils, ProductsService $products) 
    {
        $this->utils = $utils;
        $this->products = $products;
    }

    public function import(Request $request)
    {
        // get file
        $file = $_FILES['import_file'];

        if (isset($file) && ($file['error'] != 0 || $file['size'] == 0))
            return back()->with([
                'message' => "Folder zip not empty.",
                'alert-type' => 'error',
            ]);

        $filename = pathinfo($file['tmp_name'], PATHINFO_DIRNAME) . '/' . pathinfo($file['name'], PATHINFO_BASENAME);
        move_uploaded_file($file['tmp_name'], $filename);


        $extZip = pathinfo($filename, PATHINFO_EXTENSION);
        $baseNameZip = pathinfo($filename, PATHINFO_BASENAME);

        // check valid
        $mimeTypeZip = mime_content_type($filename);

        if ($extZip != 'zip' || !in_array($mimeTypeZip, $mimeTypesZip)) {
            return back()->with([
                'message'    => "Upload Fail: Unsupported file format!",
                'alert-type' => 'error',
            ]);
        }

        return back()->with( $this->products->import($filename) );
    }

    public function export(Request $request)
    {
        if (!Storage::disk(config('voyager.storage.disk'))->exists('products')) 
            Storage::disk(config('voyager.storage.disk'))->makeDirectory('products');

        $realPath = Storage::disk(config('voyager.storage.disk'))->getDriver()->getAdapter()->getPathPrefix();

        $csvFilepath = $realPath .'products/'. "products_export" .date('Ymd').'.csv';
        $xlsFilepath = $realPath .'products/'. "products_export" .date('Ymd').'.xls'; 

        $csvHeaders = [
            'Categorie',
               'sous-Catégorie',
               'Nom fournisseur',
               'Nom du produit',
               'Référence produit',
               'Designation',
               'Commentaire principal',
               'Commentaire 1',
               'Commentaire 2',
               'Commentaire 3',
               'Commentaire 4',
               'Commentaire 5',
               'Le + produit 1',
               'Le + produit 2',
               'Le + produit 3',
               'Année lancement'
        ];

        // $csv = fopen($csvFilepath, 'w');
        // fputcsv($csv, $csvHeaders);
        // $lines = 1;

        $products =  Product::all();
        
        foreach ($products as $product) {

            $line = [];
            $category = '';
            $subCategory = '';
            $brandName = '';
            $productName = $product->title;
            $productReference = $product->reference;


            // get relationship
            $productCategory = ProductCategory::find($product->category_id);
            $brand = Brand::find($product->brand_id);
            
            // set data
            if (!is_null($productCategory)) {

                $category = $productCategory->name;
                $parentCategory = ProductCategory::find($productCategory->parent_id);
                
                if (!is_null($parentCategory)) {

                    $category = $parentCategory->name;
                    $subCategory = $productCategory->name;
                }
            }

            if (!is_null($brand))
                $brandName = $brand->title;
            

            // set data into array line 
            $line[] = $category;
            $line[] = $subCategory;
            $line[] = $brandName;
            $line[] = $productName;
            $line[] = $productReference;



            //fputcsv($csv, $line);
        }

        //fclose($csv);

    }
}