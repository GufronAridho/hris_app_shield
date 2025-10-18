<?php

use Config\Services;

if (!function_exists('compress_image')) {
    function compress_image($file, $destinationFolder, $maxSizeMB = 1, $startQuality = 90, $minQuality = 10, $step = 5)
    {
        if (!$file->isValid() || $file->hasMoved()) {
            throw new \RuntimeException('Invalid file upload.');
        }

        if (!is_dir($destinationFolder)) {
            mkdir($destinationFolder, 0755, true);
        }

        $fileName = $file->getRandomName();
        $fileSizeMB = $file->getSize() / 1024 / 1024;

        if ($fileSizeMB <= $maxSizeMB) {
            $file->move($destinationFolder, $fileName);
            return $fileName;
        }

        $tempPath = $destinationFolder . '/temp_' . $fileName;
        $image = Services::image()->withFile($file->getRealPath());
        $quality = $startQuality;

        do {
            $image->save($tempPath, $quality);
            $fileSizeMB = filesize($tempPath) / 1024 / 1024;
            $quality -= $step;
            if ($quality < $minQuality) break;
        } while ($fileSizeMB > $maxSizeMB);

        rename($tempPath, $destinationFolder . '/' . $fileName);

        return $fileName;
    }
}
