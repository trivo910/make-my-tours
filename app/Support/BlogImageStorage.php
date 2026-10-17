<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

class BlogImageStorage
{
    public function store(UploadedFile $upload, string $directory): string
    {
        if (! extension_loaded('gd') || ! function_exists('imagewebp')) {
            throw new RuntimeException('The GD extension with WebP support is required to upload blog images.');
        }

        $mime = $upload->getMimeType();
        $source = match ($mime) {
            'image/jpeg' => @imagecreatefromjpeg($upload->getRealPath()),
            'image/png' => @imagecreatefrompng($upload->getRealPath()),
            'image/webp' => @imagecreatefromwebp($upload->getRealPath()),
            default => false,
        };

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
        imagewebp($target, null, 82);
        $contents = ob_get_clean();
        imagedestroy($source);
        imagedestroy($target);

        if (! $contents) {
            throw new RuntimeException('The image could not be converted to WebP.');
        }

        $path = trim($directory, '/').'/'.bin2hex(random_bytes(16)).'.webp';
        if (! Storage::disk('public')->put($path, $contents)) {
            throw new RuntimeException('The resized image could not be saved to public storage.');
        }

        return $path;
    }
}
