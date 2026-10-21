<?php

namespace Tests\Feature;

use App\Support\BlogImageStorage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BlogImageStorageTest extends TestCase
{
    public function test_image_upload_is_saved_when_webp_conversion_is_unavailable(): void
    {
        Storage::fake('public');

        $png = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+jHioAAAAASUVORK5CYII=', true);
        $upload = UploadedFile::fake()->createWithContent('image.png', $png);

        $path = app(BlogImageStorage::class)->store($upload, 'blog/featured');

        $expectedExtension = extension_loaded('gd') && function_exists('imagewebp') && function_exists('imagecreatefrompng')
            ? 'webp'
            : 'png';

        $this->assertStringEndsWith('.'.$expectedExtension, $path);
        Storage::disk('public')->assertExists($path);
        if ($expectedExtension === 'png') {
            $this->assertSame($png, Storage::disk('public')->get($path));
        }
    }
}
