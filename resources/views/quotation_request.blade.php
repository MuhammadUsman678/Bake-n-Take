@extends('layouts.master')
@section('title','Shop Register')

{{-- selec2 cdn --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('content')

<!-- banner -->
<section class="sb-banner sb-banner-color mt-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-2">
                <div class="sb-contact-form-frame">
                    <div class="sb-form-content">
                        <div class="sb-main-content">
                            <h3 class="sb-mb-30">Request For Quotation</h3>
                            <form method="POST" action="{{ url('quotation_post') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="sb-group-input">
                                            <input type="text" name="productname" class="form-control"  id="shopname"  placeholder="Enter Product Name" required>
                                            
                                           
                                      
                               
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="sb-group-input">
                                            <select name="category" id="" value="" class="form-control custom-select" required>
                                                <option value="pakistan" disabled selected="">Select Category</option>
                                                @foreach($category as $cat)
                                                <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                                @endforeach
                                            </select>
                                            
                                         
                                    
                               
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="sb-group-input">
                                            <select name="shop[]" id="id-name" multiple="multiple" class="form-control select2-multiple" required>
                                              
                                                @foreach($shop as $shop)
                                                <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                                                @endforeach
                                            </select>
                                            
                                         
                                    
                               
                                        </div>
                                    </div>
                                  
                                    <div class="col-lg-12">
                                        <div class="sb-group-input">
                                            <input type="number" name="price" class="form-control"    placeholder="Enter Expected Price" >
                                            
                                          
                                       
                               
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="sb-group-input">
                                            <textarea name="description" required=""></textarea>
                                          
                                            <label>Product Description</label>
                                          </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="sb-group-input">
                                            <input type="file" name="image"    >
                                            <span class="sb-bar"></span>
                                            
                                            <label>Product Image</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="sb-group-input">
                                            <input type="text" name="date" data-language="en" class="datepicker-here sb-datepicker" data-timepicker="true" data-position="bottom left" required=""  placeholder="Time and Date">
                                            <span class="sb-bar"></span>
                                            
                                      
                                        </div>
                                    </div>
                  
                                  
                                   
                                
                                   
                                </div>
                                <!-- button -->
                                <button type="submit" class="sb-btn sb-cf-submit sb-show-success" >
                                    <span class="sb-icon">
                                        <img src="{{ asset('front/assets/img/ui/icons/arrow.svg')}}" alt="icon">
                                    </span>
                                    <span>Request</span>
                                </button>
                                <!-- button end -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-4"></section>
<!-- banner end -->

   
      

     
@endsection
@section('script')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
       
        <script>
     $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select Shop",
                allowClear: true
            });

        });
            </script>
@endsection