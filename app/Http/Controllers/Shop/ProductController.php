<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\ShopProduct;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Validator;
use Image;
use App\Category;
use App\Http\Resources\ProductsImagesResource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        
        if ($request->ajax()) {
            $data = ShopProduct::with('category')->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('category', function($row){
                        return $row->category->category_name;
                   })
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('shop.product.edit',[$row->id]).'" data-toggle="tooltip" data-placement="top" title="Edit"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary">Edit</a>';
                           $btn = $btn.'<a href="'.route('shop.product.delete',[$row->id]).'" data-toggle="tooltip" title="Delete"  data-id="'.$row->id.'" data-original-title="Delete" class="btn ml-1 btn-danger" >Delete</a>';
                           $btn = $btn.'<a href="'.route('shop.products.images',[$row->id]).'" data-toggle="tooltip" title="Attch Images"  data-id="'.$row->id.'" data-original-title="Attach Images" class="btn ml-1 btn-info" >Images</a>';
                            return $btn;
                    })

                    ->rawColumns(['category','action'])
                    ->make(true);
        }

        return view('shop.products.listing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 $category=Category::whereStatus('1')->get();
        return view('shop.products.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShopProduct  $shopProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ShopProduct $shopProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShopProduct  $shopProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopProduct $shopProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShopProduct  $shopProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopProduct $shopProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShopProduct  $shopProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopProduct $shopProduct)
    {
        //
    }

    public function images($id)
    {
        $product = ShopProduct::withCount('media')->find($id);
        $maxFiles=$product->media_count;
      return view('shop.products.product_images',compact('maxFiles','id','product'));
    }

    public function existingImages(Request $request,$id){

        $file = ShopProduct::find($id);
        $fileList=ProductsImagesResource::collection($file->getMedia('images'));
        return response()->json($fileList);
    }

    public function uploadImages(Request $request,$id)
    {
        $name=null;
        if ($request->hasFile('file')) {
            $name = time().rand(1,1000000).'.'.$request->file->extension();
            $ext = $request->file->extension();
                $file = ShopProduct::find($id);
                $file->addMediaFromRequest('file')->usingFileName($name)
                    ->toMediaCollection('images');
        }
        return response()->json($name);
    }

    public function remvoeImage(Request $request)
    {
        $file_name=$request->file_name;
        Media::where('file_name',$file_name)->delete();
        return $file_name;
    }
}
