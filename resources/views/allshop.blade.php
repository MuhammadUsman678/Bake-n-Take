@extends('layouts.master')
@section('title','All Shop')
@section('content')

<section class="sb-banner sb-banner-xs sb-banner-color">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- main title -->
          <div class="sb-main-title-frame">
            <div class="sb-main-title">
              <h1 class="sb-h2">All Shops</h1>
              <ul class="sb-breadcrumbs">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="#.">Shops</a></li>
              </ul>
            </div>
          </div>
          <!-- main title end -->
        </div>
      </div>
    </div>

  </section>

  <section class="sb-short-menu sb-p-0-90 mt-4">
    <div class="sb-bg-2">
        <div></div>
    </div>
    <div class="container">
        <div class="text-center sb-mb-60">
          <h2 class="sb-mb-30">Sellers</h2>
          <p class="sb-text">All Register Shops in Bake'n Take.</p>
        </div>
        <div class="row">
            @foreach($shop as $shp)
          <div class="col-lg-4">
            <a   href="{{url('shop_product/'.$shp->id)}}" class="sb-menu-item sb-mb-30">
               
              <div class="sb-cover-frame">
                <img src="{{url('profileimages/'.$shp->user->image)}}" alt="shop">
              </div>
              <div class="sb-card-tp">
                <h4 class="sb-card-title">{{$shp->shop_name}}</h4>
               
              </div>
              <div class="sb-description">
                <p class="sb-text sb-mb-15"><b>Location:</b>, <span>{{$shp->address}}</span>.</p>
               
              </div>
            </a>
          </div>
        @endforeach
        </div>
      </div>
</section>






@endsection