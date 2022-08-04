@extends('layouts.master')
@section('title','Checkout')
@section('content')
  <!-- banner -->
  <section class="sb-banner sb-banner-xs sb-banner-color">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- main title -->
          <div class="sb-main-title-frame">
            <div class="sb-main-title">
              <h1 class="sb-h2">Product Review.</h1>
              <ul class="sb-breadcrumbs">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="#.">Product Review</a></li>
              </ul>
            </div>
          </div>
          <!-- main title end -->
        </div>
      </div>
    </div>
  </section>
  <!-- banner end -->

 <!-- shop list -->
 <section class="sb-menu-section sb-p-90-60">
    <div class="sb-bg-1">
      <div></div>
    </div>
    <div class="container">
        <div id="review_form_wrapper">
            <div id="review_form">
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                <div id="respond" class="comment-respond"> 
    
                    <form action="{{ route('front.product.review',[$product_id,$order_id]) }}" method="post" id="commentform" class="comment-form" novalidate="">
                        @csrf
                        <div class="comment-form-rating">
                            <input type="hidden" name="ip_address" id="ip_address">
                            <span>Your rating</span>
                            <p class="stars">
                                
                                <label for="rated-1"></label>
                                <input type="radio" id="rated-1" name="rating" value="1">
                                <label for="rated-2"></label>
                                <input type="radio" id="rated-2" name="rating" value="2">
                                <label for="rated-3"></label>
                                <input type="radio" id="rated-3" name="rating" value="3">
                                <label for="rated-4"></label>
                                <input type="radio" id="rated-4" name="rating" value="4">
                                <label for="rated-5"></label>
                                <input type="radio" id="rated-5" name="rating" value="5" checked="checked">
                            </p>
                        </div>
                        <p class="comment-form-comment">
                            <label for="comment">Your review <span class="required">*</span>
                            </label>
                            <textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                        </p>
                        <p class="form-submit">
                            <button name="submit" type="submit" id="submit" class="btn sb-btn pl-4 pr-4" >Submit </button>
                        </p>
                    </form>
    
                </div><!-- .comment-respond-->
            </div><!-- #review_form -->
        </div><!-- #review_form_wrapper -->
    
    </div>
  </section>
  <!-- shop list end -->

@endsection
@section('script')

<script>
     
    /* Add "https://api.ipify.org?format=json" statement
               this will communicate with the ipify servers in
               order to retrieve the IP address $.getJSON will
               load JSON-encoded data from the server using a
               GET HTTP request */
                
    $.getJSON("https://api.ipify.org?format=json", function(data) {
         
        // Setting text of element P with id gfg
        $("#ip_address").html(data.ip);
    })
    </script>
@endsection