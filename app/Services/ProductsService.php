<?php

namespace App\Services;
Use App\Models\Product;
Use App\Services\CategoriesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use App\Models\Brand;
use App\Models\ProductCategory;
use Illuminate\Support\Str;
use App\Services\UtilsService;
use App\Services\ProductsService;

class ProductsService
{
    protected $utils;

    public function __construct()
    {
        $this->utils = app('App\Services\UtilsService');
    }

    public function productByCategory($category_id) 
    {
        return Product::with('categoryId')->with('brandId')->where('category_id',$category_id)->where('images','<>','[]')->get();
    }

    public function productBySlug($slug) 
    {
        return Product::with('categoryId')->with('brandId')->where('slug',$slug)->first();
    }

    public function byBrandId($brandId) {
        return Product::with('categoryId')->with('brandId')->where('brand_id', $brandId)->where('images','<>','[]')->get();
    }

    public function import($filename, $cli = null) {
        //check for zip
        $mimeTypesZip = array(
            'application/zip',
            'application/x-zip-compressed',
            'multipart/x-zip',
            'application/x-compressed'
        );
        
        // check for xlsx
        $typeAllowed = array(
            'xls',
            'xlsx',
            'csv'
        );

        $extZip = pathinfo($filename, PATHINFO_EXTENSION);
        $baseNameZip = pathinfo($filename, PATHINFO_BASENAME);
        
        // check valid
        $mimeTypeZip = mime_content_type($filename);

        if ($extZip != 'zip' || !in_array($mimeTypeZip, $mimeTypesZip))
            return [
                'message' => "Upload Fail: Unsupported file format!",
                'alert-type' => 'error',
            ];

        // path
        $tempFolder = uniqid();
        $realPath = Storage::disk()->getDriver()->getAdapter()->getPathPrefix();
        $extractPath = $realPath . 'imports/' . $tempFolder;
        $missingImages = [];

        // create folder
        mkdir($extractPath, 0777, true);

        // zip
        $zip = new \ZipArchive;

        if ($zip->open($filename) === true) {
            
            if ($cli) echo __('Extracting ZIP archive..');

            $zip->extractTo($extractPath);
            $zip->close();
            if ($cli) echo __("done.\n");

            if ($cli) $cli->info(__('Processing import:'));

            //get file excel and check valid 
            $excelPath = $extractPath . '/produits.xls';

            if (!file_exists($excelPath))
                $excelPath = $extractPath . '/produits.xlsx';

            if (!file_exists($excelPath))
                $excelPath = $extractPath . '/produits.csv';

            if (!file_exists($excelPath)) {
                return [
                    'message' => __('file_not_exist'),
                    'alert-type' => 'error',
                ];
            }

            $ext = pathinfo($excelPath, PATHINFO_EXTENSION);
            $fileSize = filesize($excelPath);

            if ($fileSize == 0)
                return [
                    'message' => __('file_not_empty'),
                    'alert-type' => 'error',
                ];


            /**  Identify the type of $excelPath  **/
            $inputFileType = IOFactory::identify($excelPath);

            if ($inputFileType != 'Csv') {
                /**  Create a new Reader of the type that has been identified  **/
                $reader = IOFactory::createReader($inputFileType);
                $spreadsheet = $reader->load($excelPath);
                $writerCsv = IOFactory::createWriter($spreadsheet, 'Csv');
                $writerCsv->save($extractPath . '/produits.csv');
            }

            $fileSize = filesize($extractPath . '/produits.csv');

            // load data
            $csv = fopen($extractPath . '/produits.csv', "r");
            $counter = -1;
            $updateCounter = 0;
            $countError = 0;
            $processedBytes = 0;
            $percentage = 0;
            $startTime = time();

            while ($row = fgetcsv($csv)) {

                if ($counter < 0) {
                    $counter++;
                    continue;
                }

                // get data row
                $category = trim($row[0]);
                $subCategory = trim($row[1]);
                $brand = trim($row[2]);
                $titleProduct = trim($row[3]);
                $reference = trim($row[4]);
                $grip = trim($row[5]);
                $description = trim($row[6]);
                $mainComment = trim($row[7]);
                $comment1 = trim($row[8]);
                $comment2 = trim($row[9]);
                $comment3 = trim($row[10]);
                $comment4 = trim($row[11]);
                $comment5 = trim($row[12]);
                $more1 = trim($row[13]);
                $more2 = trim($row[14]);
                $more3 = trim($row[15]);
                $metaTitle = trim($row[16]);
                $metaDescription = trim($row[17]);
                $metaKeywords = trim($row[18]);
                $price = trim($row[19]);
                $ecotaxe = trim($row[20]);
                $type = trim($row[21]);
                $imageAlt = trim($row[22]);
                $images = trim($row[23]);
                $imagesSecondary = trim($row[24]);

                // get caterogy
                $categoryId = null;
                $categoryData = ProductCategory::whereRaw('UPPER(name) = ?', strtoupper($category))
                    ->where('parent_id', '=', 0)
                    ->first();
                   //get sub caterogy
                $subCategoryData = ProductCategory::whereRaw('UPPER(name) = ?', strtoupper($subCategory))
                    ->where('parent_id', '>', 0)
                    ->first();		
                // create	
                if (!empty($category)) {

                    if (is_null($categoryData)) {
                        
                        // category
                        $productCategory = new ProductCategory();
                        $productCategory->name = strtoupper($category);
                        $productCategory->fullname = strtoupper($category);
                        $productCategory->parent_id = 0;
                        $productCategory->save();

                        // set category id
                        $categoryId = $productCategory->id;
                        $categoryName = $productCategory->name;

                        if (!empty($subCategory)) {

                            $productSubCategory = new ProductCategory();
                            $productSubCategory->name = strtoupper($subCategory);
                            $productSubCategory->fullname = strtoupper($categoryName . ' / ' . $subCategory);
                            $productSubCategory->parent_id = $categoryId;
                            $productSubCategory->save();

                            // set category id
                            $categoryId = $productSubCategory->id;
                        }
                    } else {

                        // set category id
                        $categoryId = $categoryData->id;
                        $categoryName = $categoryData->name;

                        if (!is_null($subCategoryData) && $categoryId == $subCategoryData->parent_id) {

                            $categoryId = $subCategoryData->id;
                        } elseif (is_null($subCategoryData) && !empty($subCategory)) {

                            $productSubCategory = new ProductCategory();
                            $productSubCategory->name = strtoupper($subCategory);
                            $productSubCategory->fullname = strtoupper($categoryName . ' / ' . $subCategory);
                            $productSubCategory->parent_id = $categoryId;
                            $productSubCategory->save();

                            // set category id
                            $categoryId = $productSubCategory->id;
                        }
                    }
                }

                //get brand
                $brandId = null;
                $brandData = Brand::whereRaw('UPPER(title) = ?', strtoupper($brand))->first();

                if (!empty($brand)) {

                    if (is_null($brandData)) {

                        $createBrand = new Brand();
                        $createBrand->title = $brand;
                        $createBrand->ord = 0;
                        $createBrand->save();

                        // set brand id
                        $brandId = $createBrand->id;
                    } else
                        $brandId = $brandData->id;
                }

                // get description
                if (!empty($description)) $description = '<p>' . $description . '</p>';

                if (!empty($mainComment)) $mainComment = '<p>' . $mainComment . '</p>';

                if (!empty($comment1)) $comment1 = '<p>' . $comment1 . '</p>';

                if (!empty($comment2)) $comment2 = '<p>' . $comment2 . '</p>';

                if (!empty($comment3)) $comment3 = '<p>' . $comment3 . '</p>';
                if (!empty($comment4)) $comment4 = '<p>' . $comment4 . '</p>';

                if (!empty($comment5)) $comment5 = '<p>' . $comment5 . '</p>';

                $fullDescription = $description . $mainComment . $comment1 . $comment2 . $comment3 . $comment4 . $comment5;

                //check empty
                if (empty($titleProduct)) {
                    $counter++;
                    $countError++;
                    continue;
                }

                // save images and images Secondary
                $allowedImageMimeTypes = [
                    'image/jpeg',
                    'image/png'
                ];

                $expImgs = explode(";", $images);
                $expImgsSecon = explode(";", $imagesSecondary);
                $filesPathImgs = [];
                $filesImgsSecon = [];
                $resizeQuality = 75;

                if (!empty($images) && count($expImgs) > 0) {

                    foreach ($expImgs as $img) {

                        $pathImg = $extractPath . '/' . $img;

                        if (!file_exists($pathImg) || is_dir($pathImg)) {
                            $missingImages[$img] = $img;
                            continue;
                        }

                        $image = Image::make($pathImg);
                        $resizeWidth = $image->width();
                        $resizeHeight = $image->height();

                        if (in_array($image->mime, $allowedImageMimeTypes)) {

                            // set file name
                            $filename = Str::random(20);
                            $path = 'products/' . date('FY') . '/';
                            $filePath = $path . $filename . '.' . $image->extension;
                            array_push($filesPathImgs, $path . $filename . '.' . $image->extension);

                            //save data
                            $image = $image->resize(
                                $resizeWidth,
                                $resizeHeight,
                                function (Constraint $constraint) {
                                    $constraint->aspectRatio();
                                }
                            )->encode($image->extension, $resizeQuality);

                            Storage::disk(config('voyager.storage.disk'))->put(
                                $filePath,
                                (string)$image,
                                'public'
                            );
                        }
                    }
                }

                if (!empty($imagesSecondary) && count($expImgsSecon) > 0) {

                    foreach ($expImgsSecon as $img) {

                        $pathImg = $extractPath . '/' . $img;

                        if (!file_exists($pathImg) || is_dir($pathImg)) {
                            $missingImages[$img] = $img;
                            continue;
                        }

                        $image = Image::make($pathImg);
                        $resizeWidth = $image->width();
                        $resizeHeight = $image->height();

                        if (in_array($image->mime, $allowedImageMimeTypes)) {

                            // set file name
                            $filename = Str::random(20);
                            $path = 'products/' . date('FY') . '/';
                            $filePath = $path . $filename . '.' . $image->extension;
                            array_push($filesImgsSecon, $path . $filename . '.' . $image->extension);

                            //save data
                            $image = $image->resize(
                                $resizeWidth,
                                $resizeHeight,
                                function (Constraint $constraint) {
                                    $constraint->aspectRatio();
                                }
                            )->encode($image->extension, $resizeQuality);

                            Storage::disk(config('voyager.storage.disk'))->put(
                                $filePath,
                                (string)$image,
                                'public'
                            );
                        }
                    }
                }

                // create product
                $product = Product::where('reference', $reference)->first();
                $isNew = false;

                if (!$product) {
                    $product = new Product();
                    $isNew = true;
                }

                $product->brand_id = $brandId;
                $product->category_id = $categoryId;
                $product->description = $fullDescription;
                $product->ecotaxe = $ecotaxe;
                $product->grip = $grip;
                $product->image_alt = $imageAlt;
                $product->meta_description = $metaDescription;
                $product->meta_keywords = $metaKeywords;
                $product->meta_title = $metaTitle;
                $product->more_1 = $more1;
                $product->more_2 = $more2;
                $product->more_3 = $more3;
                $product->on_home = 0;
                $product->price = $price;
                $product->reference = $reference;
                $product->title = $titleProduct;
                $product->type = $type;
                $product->univers = 'Sanitaire';
                $product->visible = 1;
                $product->images = json_encode($filesPathImgs);
                $product->secondary_images = json_encode($filesImgsSecon);

                if ($product->save()) {
                    if (!$isNew) {
                        $updateCounter++;
                    } else {
                        $counter++;
                    }
                } else {
                    $countError++;
                    $counter++;
                }
                if ($cli) {
                    $eslapsed = time() - $startTime;
                    $processedBytes += strlen(implode('',$row));
                    $percentage = $processedBytes/$fileSize;
                    $maxSteps = 50;
                    $steps = round($maxSteps * $percentage);
                    $progressbar = '[' . str_repeat('=', $steps) . str_repeat(' ', $maxSteps - $steps) . ']';
                    $eta = (100 - ($percentage*100)) * $eslapsed / ($percentage*100);
                    echo "\r" . number_format($percentage*100,2) . "% ".$progressbar." ETA: ".gmdate("H:i:s", $eta);
                }
            }

            fclose($csv);
            echo "\n";

            if ($countError > 0)
                $message = "Ajouté avec succès " . ($counter - $countError) . " produit(s), mise à jour " . $updateCounter . " produit(s). " . $countError . " produit(s) ayant échoué";
            else
                $message = "Ajouté avec succès " . $counter . " produits, mise à jour " . $updateCounter . " produit(s).";

            // update number of product of brand
            $this->utils->calculateProductOfBrand();

            Storage::deleteDirectory($extractPath);

            return [
                'missing_images' => $missingImages,
                'message' => $message,
                'alert-type' => 'success',
            ];

        } else {
            return [
                'message' => __("Impossible d'extraire le fichier."),
                'alert-type' => 'error',
            ];
        }
    }
}