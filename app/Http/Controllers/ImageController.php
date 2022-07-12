<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Jobs\ProcessImageThumbnails;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        return view('images.index');
    }

    public function store(Request $request)
    {
       //return response()->json(['error'=>'This is a test error',500]);// this is to display custom error from backend
        if (!$request->hasFile('image')) {
            return response()->json(['error'=>'No image present'],400);
        }
       
        $request->validate([
           'image' => 'required|file|image'
        ]);

        $path = $request->file('image')->store('public/images');

        if (!$path) {
            return response()->json('error','The file could not be saved');
        }
        $uploadedFile = $request->file('image');

        $image = Image::create([
            'name' => $uploadedFile->hashName(),
            'extension' => $uploadedFile->extension(),
            'size' => $uploadedFile->getSize()
        ]);

        return $image->name; 

    }

    public function show()
    {
        return Image::latest('id')->pluck('name')->toArray();
    }
}
