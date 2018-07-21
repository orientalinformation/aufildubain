<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerMediaController as BaseVoyagerMediaController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use TCG\Voyager\Facades\Voyager;

class VoyagerMediaController extends BaseVoyagerMediaController
{

    //browser
    public function browser()
    {
        // Check permission
        Voyager::canOrFail('browse_media');

        return Voyager::view('voyager::media.browser');
    }

    // Upload Working with 5.3
    public function upload(Request $request)
    {
        try {
            $realPath = Storage::disk(config('voyager.storage.disk'))->getDriver()->getAdapter()->getPathPrefix();

            $allowedImageMimeTypes = [
                'image/jpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/svg+xml',
            ];

            if (in_array($request->file->getMimeType(), $allowedImageMimeTypes)) {
                // $file = $request->file->store($request->upload_path, $this->filesystem);
                $file = $request->file->getClientOriginalName();
                $file_path = $realPath.$request->upload_path.'/'.$file;
                $final_file = $file_path;

                $counter = 1;
                while (file_exists($final_file)) {
                    $final_file = implode('.', (array_slice(explode('.', $file_path), 0, -1))) . '-'. $counter.'.'.$request->file->getClientOriginalExtension();
                    $counter++;
                }

                $file_path = $final_file;
                move_uploaded_file($request->file->getRealPath(), $file_path);

                $image = Image::make($file_path);

                if ($request->file->getClientOriginalExtension() == 'gif') {
                    copy($request->file->getRealPath(), $file_path);
                } else {
                    $image->orientate()->save($file_path);
                }
            } else {
                $file = $request->file->move($realPath.'/'.$request->upload_path, $request->file->getClientOriginalName());
            }

            $success = true;
            $message = __('voyager.media.success_uploaded_file');
            $path = preg_replace('/^public\//', '', $file);
        } catch (Exception $e) {
            $success = false;
            $message = $e->getMessage();
            $path = '';
        }

        return response()->json(compact('success', 'message', 'path'));
    }    
}
