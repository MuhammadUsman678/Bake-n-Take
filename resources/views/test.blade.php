@extends('layouts.master')
@section('title','All Products')
@section('content')

<section class="sb-banner sb-banner-xs sb-banner-color">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- main title -->
          <div class="sb-main-title-frame">
            <div class="sb-main-title">
              <h1 class="sb-h2">All Products</h1>
              <ul class="sb-breadcrumbs">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="#.">Products</a></li>
              </ul>
            </div>
          </div>
          <!-- main title end -->
        </div>
      </div>
    </div>

  </section>

   <!-- shop list -->
   <section class="sb-menu-section sb-p-90-60">
    <div class="sb-bg-1">
      <div></div>
    </div>
    <div class="container">
        <div id="review_form_wrapper">
            <div id="review_form">
                <div id="respond" class="comment-respond"> 
    
                    <form action="#" method="post" id="commentform" class="comment-form" novalidate="">
                        <p class="comment-notes">
                            <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                        </p>
                        <div class="comment-form-rating">
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
                        <p class="comment-form-author">
                            <label for="author">Name <span class="required">*</span></label> 
                            <input id="author" name="author" type="text" value="">
                        </p>
                        <p class="comment-form-email">
                            <label for="email">Email <span class="required">*</span></label> 
                            <input id="email" name="email" type="email" value="" >
                        </p>
                        <p class="comment-form-comment">
                            <label for="comment">Your review <span class="required">*</span>
                            </label>
                            <textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                        </p>
                        <p class="form-submit">
                            <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                        </p>
                    </form>
    
                </div><!-- .comment-respond-->
            </div><!-- #review_form -->
        </div><!-- #review_form_wrapper -->
    
    </div>
  </section>
  <!-- shop list end -->





@endsection