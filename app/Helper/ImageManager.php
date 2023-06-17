<?php

namespace App\Helper;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait ImageManager
{
    public function fileUpload($file, $path, $deleteFileName = null)
    {
        if ($file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $storage = Storage::disk('public');
            $storage->put($path . $filename, File::get($file));

            if ($deleteFileName && Storage::exists('public/'.$path . $deleteFileName)) {
                $storage->delete($path . $deleteFileName);
            }
            return $filename;
        }
    }
}
