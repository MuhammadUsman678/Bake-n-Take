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
    public function edit(Category $selected_category)
    {
        
        $categories=Category::where('status',1)->pluck('category_id','id')->get();
        return view('site.admin.courses.batch.create',compact('categories','selected_category'));
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
            'title'=>'required|max:255',
            'status'=>'required',
            'course_id'=>'required',
            'instructor_id'=>'required',
            'start_date'=>'required|date',

        ]);
        $batch=Batch::with('enrollment')->find($id);

        $course=Course::select('title')->find($batch->course_id);
        if($batch->request_accept==1)
        {
            $req=1;
        }
        else
        {
            $req=0;
        }
        $batch->update([
            'title' => $request->title,
            'status' => $request->status,
            'course_id' => $request->course_id,
            'instructor_id' => $request->instructor_id,
            'start_date' => $request->start_date,
            'request_accept'=>$req,
            'end_date' => $request->end_date]);
        return redirect()->action('Site\Admin\BatchController@index')->with('success',$request->title.' Batch for Course '.$course->title.' Created Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch=Batch::with('enrollment')->find($id);
        if($batch->enrollment->count()>0)
        {
            return redirect()->action('Site\Admin\BatchController@index')->with('error',' You Can not Delete '.$batch->title.' Batch Because Some Students Enrolled in This Batch');
        }

        $title=$batch->title;
        $batch->delete();
        return redirect()->action('Site\Admin\BatchController@index')->with('success',$title.' Batch Deleted Successfully');
    }



}
