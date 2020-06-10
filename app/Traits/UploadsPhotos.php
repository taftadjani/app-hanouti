<?php
namespace App\Traits;

use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

trait UploadsPhotos{
    public function uploadPhoto(UploadedFile $file, $name)
    {
        Storage::disk('public')->put($name,  File::get($file));
    }
}
