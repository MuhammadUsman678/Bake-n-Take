<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Validator;
use Image;

class CategoryController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                         if($row->status==1)
                        {
                            $status ='<span class="badge badge-success">Publish</span>';
                        }
                        else
                        {
                            $status= '<span class="badge badge-danger">Unpublish</span>';
                        }
                         return $status;
                    })
                    ->addColumn('action', function($row){

                           $btn = '<a href="'.route('admin.category.edit',[$row->id]).'" data-toggle="tooltip" data-placement="top" title="Edit"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary">Edit</a>';
                           $btn = $btn.'<a href="'.route('admin.category.delete',[$row->id]).'" data-toggle="tooltip" title="Status"  data-id="'.$row->id.'" data-original-title="Status" class="btn ml-1 btn-danger delete" >Delete</a>';
                            return $btn;
                    })

                    ->rawColumns(['status','action'])
                    ->make(true);
        }

        return view('admin.category.listing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_name'=>'required|max:255',
            'status'=>'required',
            // 'image'=>'nullable|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $fileName='';
        if($request->has('image') && $request->image !=null){
            $file_image = $request->file('image');
            $extension_image = $file_image->getClientOriginalExtension();
            $image = date('mdyhms').'image'.'.'.$extension_image;
            $fileName=public_path('/category/'.$image);
            Image::make($file_image)->resize(255,255)->save($fileName);
        }
        $category = new Category();
        $category->category_name=$request->category_name;
        $category->status=$request->status;
        $category->image=$fileName;
        $category->save();
        return redirect()->action('Admin\CategoryController@index')->with('success',$request->category_name.' Created Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        
        $category=Category::findorFail($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category_name'=>'required|max:255',
            'status'=>'required',
            // 'image'=>'nullable|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $fileName='';
        if($request->has('image') && $request->image !=null){
            $file_image = $request->file('image');
            $extension_image = $file_image->getClientOriginalExtension();
            $image = date('mdyhms').'image'.'.'.$extension_image;
            $fileName=public_path('/category/'.$image);
            Image::make($file_image)->resize(255,255)->save($fileName);
        }
        $category = Category::findorfail($id);
        $category->category_name=$request->category_name;
        $category->status=$request->status;
        $category->image=$fileName;
        $category->update();
        return redirect()->action('Admin\CategoryController@index')->with('success',$request->category_name.' Edit Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch=Category::find($id);
        

       
        $batch->delete();
        return back()->with('success',$batch->category_name.' Category Deleted Successfully');
    }



}
