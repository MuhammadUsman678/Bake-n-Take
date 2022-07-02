<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductsImagesResource;
use App\ShopProduct;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FileController extends Controller
{
    public function index()
    {
        $file = ShopProduct::withCount('media')->latest()->first();
        $maxFiles=$file->media_count;
      return view('files',compact('maxFiles'));
    }

    public function existingFiles(Request $request){

        $file = ShopProduct::latest()->first();
        $fileList=ProductsImagesResource::collection($file->getMedia('images'));
        return response()->json($fileList);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $name = time().rand(1,1000000).'.'.$request->file->extension();
            $ext = $request->file->extension();
                $file = ShopProduct::latest()->first();
                $file->addMediaFromRequest('file')->usingFileName($name)
                    ->toMediaCollection('images');
        }
        return response()->json($name);
    }

    public function remvoeFile(Request $request)
    {
        $file_name=$request->file_name;
        Media::where('file_name',$file_name)->delete();
        return $file_name;
    }
}
