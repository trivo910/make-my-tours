<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Support\BlogImageStorage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditorImageController extends Controller
{
    public function __invoke(Request $request, BlogImageStorage $images): JsonResponse
    {
        $data = $request->validate(['image' => ['required', 'image', 'mimes:jpeg,png,webp', 'max:5120']]);
        $path = $images->store($data['image'], 'blog/editor');
        return response()->json(['url' => Storage::disk('public')->url($path)]);
    }
}
