<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

class BlogImageStorage
{
    public function store(UploadedFile $upload, string $directory): string
    {
        $mime = $upload->getMimeType();
        $formats = [
            'image/jpeg' => ['extension' => 'jpg', 'decoder' => 'imagecreatefromjpeg'],
            'image/png' => ['extension' => 'png', 'decoder' => 'imagecreatefrompng'],
            'image/webp' => ['extension' => 'webp', 'decoder' => 'imagecreatefromwebp'],
        ];

        if (! isset($formats[$mime])) {
            throw new RuntimeException('The uploaded image format is not supported.');
        }

        $format = $formats[$mime];
        if (! extension_loaded('gd') || ! function_exists('imagewebp') || ! function_exists($format['decoder'])) {
            return $this->storeOriginal($upload, $directory, $format['extension']);
        }

        $source = @($format['decoder'])($upload->getRealPath());
        if (! $source) {
            throw new RuntimeException('The uploaded image could not be processed.');
        }

        $width = imagesx($source);
        $height = imagesy($source);
        $scale = min(1, 1600 / max(1, $width), 1200 / max(1, $height));
        $targetWidth = max(1, (int) round($width * $scale));
        $targetHeight = max(1, (int) round($height * $scale));
        $target = imagecreatetruecolor($targetWidth, $targetHeight);
        imagealphablending($target, false);
        imagesavealpha($target, true);
        imagecopyresampled($target, $source, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

        ob_start();
        $converted = imagewebp($target, null, 82);
        $contents = ob_get_clean();
        imagedestroy($source);
        imagedestroy($target);

        if (! $converted || ! $contents) {
            throw new RuntimeException('The image could not be converted to WebP.');
        }

        return $this->storeContents($contents, $directory, 'webp');
    }

    private function storeOriginal(UploadedFile $upload, string $directory, string $extension): string
    {
        $contents = file_get_contents($upload->getRealPath());
        if ($contents === false) {
            throw new RuntimeException('The uploaded image could not be read.');
        }

        return $this->storeContents($contents, $directory, $extension);
    }

    private function storeContents(string $contents, string $directory, string $extension): string
    {
        $path = trim($directory, '/').'/'.bin2hex(random_bytes(16)).'.'.$extension;
        if (! Storage::disk('public')->put($path, $contents)) {
            throw new RuntimeException('The image could not be saved to public storage.');
        }

        return $path;
    }
}
