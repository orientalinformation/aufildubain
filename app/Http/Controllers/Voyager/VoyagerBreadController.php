<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerBreadController as BaseVoyagerBreadController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;


class VoyagerBreadController extends BaseVoyagerBreadController
{
    use BreadRelationshipParser;
    //***************************************
    //               ____
    //              |  _ \
    //              | |_) |
    //              |  _ <
    //              | |_) |
    //              |____/
    //
    //      Browse our Data Type (B)READ
    //
    //****************************************

    public function index(Request $request)
    {
        // GET THE SLUG, ex. 'posts', 'pages', etc.
        $slug = $this->getSlug($request);

        // get limit
        $limit = $request->get('limit', 10);

        // GET THE DataType based on the slug
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('browse', app($dataType->model_name));

        $getter = $dataType->server_side ? 'paginate' : 'get';

        $search = (object) ['value' => $request->get('s'), 'key' => $request->get('key'), 'filter' => $request->get('filter')];
        $searchable = $dataType->server_side ? array_keys(SchemaManager::describeTable(app($dataType->model_name)->getTable())->toArray()) : '';
        $orderBy = $request->get('order_by');
        $sortOrder = $request->get('sort_order', null);

        // Next Get or Paginate the actual content from the MODEL that corresponds to the slug DataType
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $query = $model::select('*');

            $relationships = $this->getRelationships($dataType);

            // If a column has a relationship associated with it, we do not want to show that field
            $this->removeRelationshipField($dataType, 'browse');

            if ($search->value && $search->key && $search->filter) {
                $search_filter = ($search->filter == 'equals') ? '=' : 'LIKE';
                $search_value = ($search->filter == 'equals') ? $search->value : '%'.$search->value.'%';
                $query->where($search->key, $search_filter, $search_value);
            }

            if ($orderBy && in_array($orderBy, $dataType->fields())) {
                $querySortOrder = (!empty($sortOrder)) ? $sortOrder : 'DESC';
                $dataTypeContent = call_user_func([
                    $query->with($relationships)->orderBy($orderBy, $querySortOrder),
                    $getter,
                ], $limit);
            } elseif ($model->timestamps) {
                $dataTypeContent = call_user_func([$query->latest($model::CREATED_AT), $getter], $limit);
            } else {
                $dataTypeContent = call_user_func([$query->with($relationships)->orderBy($model->getKeyName(), 'DESC'), $getter], $limit);
            }

            // Replace relationships' keys for labels and create READ links if a slug is provided.
            $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType);
        } else {
            // If Model doesn't exist, get data from table name
            $dataTypeContent = call_user_func([DB::table($dataType->name), $getter]);
            $model = false;
        }

        // Check if BREAD is Translatable
        if (($isModelTranslatable = is_bread_translatable($model))) {
            $dataTypeContent->load('translations');
        }

        // Check if server side pagination is enabled
        $isServerSide = isset($dataType->server_side) && $dataType->server_side;

        $view = 'voyager::bread.browse';

        if (view()->exists("voyager::$slug.browse")) {
            $view = "voyager::$slug.browse";
        }

        return Voyager::view($view, compact(
            'dataType',
            'dataTypeContent',
            'isModelTranslatable',
            'search',
            'orderBy',
            'sortOrder',
            'searchable',
            'isServerSide',
            'limit'
        ));
    }

    public function insertUpdateData($request, $slug, $rows, $data)
    {
        $multi_select = [];

        /*
         * Prepare Translations and Transform data
         */
        $translations = is_bread_translatable($data)
                        ? $data->prepareTranslations($request)
                        : [];

        foreach ($rows as $row) {
            $options = json_decode($row->details);

            // if the field for this row is absent from the request, continue
            // checkboxes will be absent when unchecked, thus they are the exception
            if (!$request->hasFile($row->field) && !$request->has($row->field) && $row->type !== 'checkbox') {
                continue;
            }

            $content = $this->getContentBasedOnType($request, $slug, $row);

            if ($row->type == 'relationship' && $options->type != 'belongsToMany') {
                $row->field = @$options->column;
            }

            /*
             * merge ex_images and upload images
             */
            if ($row->type == 'multiple_images' && !is_null($content)) {

                if (isset($data->{$row->field})) 
                    $content = $content; 
            }

            if (is_null($content)) {
                // If the multiple_images upload is null and it has a current image keep the current image
                if ($row->type == 'multiple_images' && is_null($request->input($row->field)) && isset($data->{$row->field})) {
                    $content = $data->{$row->field};
                }

                // If the file upload is null and it has a current file keep the current file
                if ($row->type == 'file') {
                    $content = $data->{$row->field};
                }

                if ($row->type == 'password') {
                    $content = $data->{$row->field};
                }
            }

            if ($row->type == 'relationship' && $options->type == 'belongsToMany') {
                // Only if select_multiple is working with a relationship
                $multi_select[] = ['model' => $options->model, 'content' => $content, 'table' => $options->pivot_table];
            } else {
                $data->{$row->field} = $content;
            }
        }

        $data->save();

        // Save translations
        if (count($translations) > 0) {
            $data->saveTranslations($translations);
        }

        foreach ($multi_select as $sync_data) {
            $data->belongsToMany($sync_data['model'], $sync_data['table'])->sync($sync_data['content']);
        }

        return $data;
    }

    public function getContentBasedOnType(Request $request, $slug, $row)
    {
        $content = null;
        if (!($row->type == 'image' || $row->type == 'multiple_images')) {
            return parent::getContentBasedOnType($request, $slug, $row);
        }

        switch ($row->type) {

            case 'multiple_images':

                // get data input and options
                $imagesRequest = $request->input($row->field);
                $fileImages = json_decode($imagesRequest);
                $options = json_decode($row->details);
                $resizeQuality = isset($options->quality) ? intval($options->quality) : 75;

                if (count($fileImages) <= 0) 
                    break;
                
                foreach ($fileImages as $fileImage) {

                    $imgPubPath = public_path('storage'.$fileImage);

                    if (!file_exists($imgPubPath)) 
                        continue;

                    $image = Image::make($imgPubPath);
                    $resizeWidth = null;
                    $resizeHeight = null;

                    if (isset($options->resize) && 
                        (isset($options->resize->width) || isset($options->resize->height))) {

                        if (isset($options->resize->width)) {
                            $resizeWidth = $options->resize->width;
                        }
                        if (isset($options->resize->height)) {
                            $resizeHeight = $options->resize->height;
                        }
                    } else {

                        $resizeWidth = $image->width();
                        $resizeHeight = $image->height();
                    }

                    if (isset($options->thumbnails)) {

                        foreach ($options->thumbnails as $thumbnails) {

                            // get info img
                            $createImgThumb = false;
                            $dirName = pathinfo($fileImage, PATHINFO_DIRNAME);
                            $extension = pathinfo($fileImage, PATHINFO_EXTENSION);
                            $fileName = pathinfo($fileImage, PATHINFO_FILENAME);
                            $pathThumb = $dirName.'/'.$fileName.'-'.
                                            $thumbnails->name.'.'.$extension;
                            $pubPathThumb = public_path('storage'.$pathThumb);                   

                            if (isset($thumbnails->name) && isset($thumbnails->scale)) {

                                // check image thumbnail exist
                                if (!file_exists($pubPathThumb)) {
                                    
                                    $createImgThumb = true;
                                    $scale = intval($thumbnails->scale) / 100;
                                    $thumbResizeWidth = $resizeWidth;
                                    $thumbResizeHeight = $resizeHeight;

                                    if ($thumbResizeWidth != null && $thumbResizeWidth != 'null') {
                                        $thumbResizeWidth = intval($thumbResizeWidth * $scale);
                                    }

                                    if ($thumbResizeHeight != null && $thumbResizeHeight != 'null') {
                                        $thumbResizeHeight = intval($thumbResizeHeight * $scale);
                                    }

                                    $image = Image::make($imgPubPath)->resize(
                                        $thumbResizeWidth,
                                        $thumbResizeHeight,
                                        function (Constraint $constraint) use ($options) {
                                            $constraint->aspectRatio();
                                            if (isset($options->upsize) && !$options->upsize) {
                                                $constraint->upsize();
                                            }
                                        }
                                    )->encode($extension, $resizeQuality);
                                }
                            } elseif (isset($options->thumbnails) && 
                                    isset($thumbnails->crop->width) && 
                                    isset($thumbnails->crop->height)) {

                                // check image thumbnail exist
                                if (!file_exists($pubPathThumb)) {

                                    $createImgThumb = true;
                                    $crop_width = $thumbnails->crop->width;
                                    $crop_height = $thumbnails->crop->height;

                                    $image = Image::make($imgPubPath)
                                        ->fit($crop_width, $crop_height)
                                        ->encode($extension, $resizeQuality);
                                }
                            }

                            // save img
                            if ($createImgThumb) {

                                Storage::disk(config('voyager.storage.disk'))->put(
                                    $pathThumb,
                                    (string) $image,
                                    'public'
                                );
                            }
                        }
                    }                    
                }

                return $imagesRequest;

            case 'image':

                // get data input and options
                $imageRequest = $request->input($row->field);
                $imgPubPath = public_path('storage'.$imageRequest);
                $options = json_decode($row->details);
                $resizeQuality = isset($options->quality) ? intval($options->quality) : 75;

                if (empty($imageRequest) || !file_exists($imgPubPath))
                    break;
                
                $image = Image::make($imgPubPath);
                $resizeWidth = null;
                $resizeHeight = null;

                if (isset($options->resize) && 
                    (isset($options->resize->width) || isset($options->resize->height))) {

                    if (isset($options->resize->width)) {
                        $resizeWidth = $options->resize->width;
                    }
                    if (isset($options->resize->height)) {
                        $resizeHeight = $options->resize->height;
                    }
                } else {

                    $resizeWidth = $image->width();
                    $resizeHeight = $image->height();
                }

                if (isset($options->thumbnails)) {

                    foreach ($options->thumbnails as $thumbnails) {

                        // get info img
                        $createImgThumb = false;
                        $dirName = pathinfo($imageRequest, PATHINFO_DIRNAME);
                        $extension = pathinfo($imageRequest, PATHINFO_EXTENSION);
                        $fileName = pathinfo($imageRequest, PATHINFO_FILENAME);
                        $pathThumb = $dirName.'/'.$fileName.'-'.
                                        $thumbnails->name.'.'.$extension;
                        $pubPathThumb = public_path('storage'.$pathThumb);                   

                        if (isset($thumbnails->name) && isset($thumbnails->scale)) {

                            // check image thumbnail exist
                            if (!file_exists($pubPathThumb)) {
                                
                                $createImgThumb = true;
                                $scale = intval($thumbnails->scale) / 100;
                                $thumbResizeWidth = $resizeWidth;
                                $thumbResizeHeight = $resizeHeight;

                                if ($thumbResizeWidth != null && $thumbResizeWidth != 'null') {
                                    $thumbResizeWidth = intval($thumbResizeWidth * $scale);
                                }

                                if ($thumbResizeHeight != null && $thumbResizeHeight != 'null') {
                                    $thumbResizeHeight = intval($thumbResizeHeight * $scale);
                                }

                                $image = Image::make($imgPubPath)->resize(
                                    $thumbResizeWidth,
                                    $thumbResizeHeight,
                                    function (Constraint $constraint) use ($options) {
                                        $constraint->aspectRatio();
                                        if (isset($options->upsize) && !$options->upsize) {
                                            $constraint->upsize();
                                        }
                                    }
                                )->encode($extension, $resizeQuality);
                            }
                        } elseif (isset($options->thumbnails) && 
                                isset($thumbnails->crop->width) && 
                                isset($thumbnails->crop->height)) {

                            // check image thumbnail exist
                            if (!file_exists($pubPathThumb)) {

                                $createImgThumb = true;
                                $crop_width = $thumbnails->crop->width;
                                $crop_height = $thumbnails->crop->height;

                                $image = Image::make($imgPubPath)
                                    ->fit($crop_width, $crop_height)
                                    ->encode($extension, $resizeQuality);
                            }
                        }

                        // save img
                        if ($createImgThumb) {

                            Storage::disk(config('voyager.storage.disk'))->put(
                                $pathThumb,
                                (string) $image,
                                'public'
                            );
                        }
                    }
                }
                $content = $imageRequest;
        }
        return $content;
    }
}
