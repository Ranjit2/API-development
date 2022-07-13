<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Jobs\ProcessImageThumbnails;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\FileValidateRequest;

class ImageController extends Controller
{
    public function index(Request $request): View
    {
        return view('images.index');
    }

    public function store(FileValidateRequest $request)
    {
        if (!$request->hasFile('image')) {
            return response()->json(['error' => 'No image present'], Response::HTTP_BAD_REQUEST);
        }

        $path = $request->file('image')->store('public/images');

        if (!$path) {
            return response()->json('error', 'The file could not be saved');
        }
        $uploadedFile = $request->file('image');

        $image = Image::create([
            'name' => $uploadedFile->hashName(),
            'extension' => $uploadedFile->extension(),
            'size' => $uploadedFile->getSize()
        ]);

        return $image->name;
    }

    public function show(): array
    {
        return Image::latest('id')->pluck('name')->toArray();
    }
}
