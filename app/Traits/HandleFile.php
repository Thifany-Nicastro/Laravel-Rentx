<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HandleFile
{
    public function storeFile($file, $folder, $disk = 'public')
    {
        $path = $file->store($folder, $disk);

        return $path;
    }

    public function deleteFile($filePath, $disk = 'public')
    {
        Storage::disk($disk)->delete($filePath);
    }
}
