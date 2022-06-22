<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\ShopProduct;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Validator;
use Image;

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
                           $btn = $btn.'<a href="'.route('shop.product.delete',[$row->id]).'" data-toggle="tooltip" title="Status"  data-id="'.$row->id.'" data-original-title="Status" class="btn ml-1 btn-danger" >Delete</a>';
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
        //
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
}
