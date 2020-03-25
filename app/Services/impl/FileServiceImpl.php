<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 10.12.2019
 * Time: 12:18
 */

namespace App\Services\impl;


use App\Services\FileService;
use App\Utils\StaticConstants;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class FileServiceImpl implements FileService
{
    public function store(UploadedFile $file, string $path): string
    {
        $file_path = time() . ((string)Str::uuid()) . '.' . $file->getClientOriginalExtension();
        $fileFullPath = $file->move($path, $file_path);
        return $fileFullPath;
    }


    public function remove(string $path)
    {
        if ($path != StaticConstants::DEFAULT_IMAGE) {
            if (file_exists($path) && !is_dir($path)) {
                return unlink($path);
            }
        }

        return false;
    }


    public function updateWithRemoveOrStore(UploadedFile $file, string $path, string $oldFilePath = null): string
    {
        if ($oldFilePath && $oldFilePath != StaticConstants::DEFAULT_IMAGE) {
            $this->remove($oldFilePath);
        }
        return $this->store($file, $path);
    }
}
