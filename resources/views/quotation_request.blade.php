@extends('layouts.master')
@section('title','Shop Register')

@section('content')
<!-- banner -->
<section class="sb-banner sb-banner-color mt-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-2">
                <div class="sb-contact-form-frame">
                    <div class="sb-form-content">
                        <div class="sb-main-content">
                            <h3 class="sb-mb-30">Register your Shop</h3>
                            <form method="POST" action="{{ url('storeshop') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="sb-group-input">
                                            <input type="text" name="productname" class="form-control"  id="shopname"  placeholder="Enter Product Name" >
                                            <span class="sb-bar"></span>
                                            <label>Product name</label>
                                      
                               
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="sb-group-select">
                                            <select name="category" class="form-control">
                                                <option>Select Category</option>

                                            </select>
                                            <span class="sb-bar"></span>
                                            <label>Category</label>
                                    
                               
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="sb-group-input">
                                            <input type="number" name="price" class="form-control"    placeholder="Enter Expected Price" >
                                            <span class="sb-bar"></span>
                                            <label>Expected Price</label>
                                       
                               
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="sb-group-input">
                                            <input type="text" name="phoneno" class="form-control " id="phone"  placeholder="Enter phone No" >
                                            <span class="sb-bar"></span>
                                            <label>product Description</label>
                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="sb-group-input">
                                            <input type="date" name="deliverydate"    id="ntnno"  placeholder="Enter Ntn No" >
                                            <span class="sb-bar"></span>
                                            <label>Delivery Date</label>
                                      
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        
       
     <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

     
@endsection
