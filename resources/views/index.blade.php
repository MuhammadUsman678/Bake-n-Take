@extends('layouts.master')
@section('title','Home')
@section('content')
<!-- banner -->
<section class="sb-banner">
    <div class="sb-bg-1">
        <div></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!-- main title -->
                <div class="sb-main-title-frame">
                    <div class="sb-main-title">
                        @auth 
                        @if(!auth()->user()->email_verified_at)
                           <div class="alert alert-danger">
                               We have send you a email verification link please verify first. If you havn't receive any email please click 
                               <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-warning">{{ __('Here') }}</button>.
                            </form> to resend email. 
                           </div>
                        @endif   
                           <span  class="sb-suptitle sb-mb-30">Hi, {{auth()->user()->name}}!</span> 
                        @endauth
                        <h1 class="sb-mb-30">Bake Take <span>Team</span></h1>
                        <p class="sb-text sb-text-lg sb-mb-30">Provide You Facility To Order Online.<br>Now in Gujranwala</p>
                        <!-- button -->
                        <a href="{{url('all_shop')}}" class="sb-btn">
                            <span class="sb-icon">
                                <img src="{{asset('front/assets/img/ui/icons/menu.svg')}}" alt="icon">
                            </span>
                            <span>Our Shops</span>
                        </a>
                        <!-- button end -->
                        <!-- button -->
                        <a href="{{url('#team')}}" class="sb-btn sb-btn-2 sb-btn-gray">
                            <span class="sb-icon">
                                <img src="{{asset('front/assets/img/ui/icons/arrow.svg')}}" alt="icon">
                            </span>
                            <span>About us</span>
                        </a>
                        <!-- button end -->
                    </div>
                </div>
                <!-- main title end -->
            </div>
            <div class="col-lg-6">
                <div class="sb-illustration-1">
                    <img src="{{asset('front/assets/img/illustrations/girl.png')}}" alt="girl" class="sb-girl">
                    <div class="sb-cirkle-1"></div>
                    <div class="sb-cirkle-2"></div>
                    <div class="sb-cirkle-3"></div>
                    <div class="sb-cirkle-4"></div>
                    <div class="sb-cirkle-5"></div>
                    <img src="{{asset('front/assets/img/illustrations/3.svg')}}" alt="phones" class="sb-pik-1">
                    <img src="{{asset('front/assets/img/illustrations/1.svg')}}" alt="phones" class="sb-pik-2">
                    <img src="{{asset('front/assets/img/illustrations/2.svg')}}" alt="phones" class="sb-pik-3">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->

<!-- features -->
<section class="sb-p-60-0">
    <div class="container">
        <div class="row flex-md-row-reverse">
            <div class="col-lg-6 align-self-center sb-mb-30">
                <h2 class="sb-mb-60">To Register <br>your Bakery</h2>
                <ul class="sb-features">
                    <li class="sb-features-item sb-mb-60">
                        <div class="sb-number">01</div>
                        <div class="sb-feature-text">
                            <h3 class="sb-mb-15">Fill Registration Form on Our Site</h3>
                            <p class="sb-text">Porro nemo veniam necessitatibus praesentium eligendi rem temporibus adipisci quo modi numquam.</p>
                        </div>
                    </li>
                    <li class="sb-features-item sb-mb-60">
                        <div class="sb-number">02</div>
                        <div class="sb-feature-text">
                            <h3 class="sb-mb-15">Our Team Will Contact And verify</h3>
                            <p class="sb-text">Consectetur numquam porro nemo veniam necessitatibus praesentium eligendi rem temporibus adipisci quo modi.</p>
                        </div>
                    </li>
                    <li class="sb-features-item sb-mb-60">
                        <div class="sb-number">03</div>
                        <div class="sb-feature-text">
                            <h3 class="sb-mb-15">You  upload Your Product after verification</h3>
                            <p class="sb-text">Necessitatibus praesentium eligendi rem temporibus adipisci quo modi. Lorem ipsum dolor sit.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="sb-illustration-2 sb-mb-90">
                    <div class="sb-interior-frame">
                        <img src="{{asset('front/assets/img/illustrations/download.jpg')}}" alt="interior" class="sb-interior">
                    </div>
                    <div class="sb-square"></div>
                    <div class="sb-cirkle-1"></div>
                    <div class="sb-cirkle-2"></div>
                    <div class="sb-cirkle-3"></div>
                    <div class="sb-cirkle-4"></div>
                    <div class="sb-experience">
                        <div class="sb-exp-content">
                           
                            <p class="sb-h3">Final Year Project</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- features end -->

<!-- categories -->
<section class="sb-p-0-60">
    <div class="container">
        <div class="sb-group-title sb-mb-30">
            <div class="sb-left sb-mb-30">
                <h2 class="sb-mb-30">What do you <span>like today?</span></h2>
                <p class="sb-text">Consectetur numquam poro nemo veniam<br>eligendi rem adipisci quo modi.</p>
            </div>
            <div class="sb-right sb-mb-30">
                <!-- button -->
                <a href="#" class="sb-btn sb-m-0">
                    <span class="sb-icon">
                        <img src="{{asset('front/assets/img/ui/icons/arrow.svg')}}" alt="icon">
                    </span>
                    <span>Go shopping now</span>
                </a>
                <!-- button end -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <a href="#" class="sb-categorie-card sb-categorie-card-2 sb-mb-30">
                    <div class="sb-card-body">
                        <div class="sb-category-icon">
                            <img src="{{asset('front/assets/img/categories/1.png')}}" alt="icon">
                        </div>
                        <div class="sb-card-descr">
                            <h3 class="sb-mb-10">Starters</h3>
                            <p class="sb-text">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6">
                <a href="#" class="sb-categorie-card sb-categorie-card-2 sb-mb-30">
                    <div class="sb-card-body">
                        <div class="sb-category-icon">
                            <img src="{{asset('front/assets/img/categories/2.png')}}" alt="icon">
                        </div>
                        <div class="sb-card-descr">
                            <h3 class="sb-mb-10">Main dishes</h3>
                            <p class="sb-text">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6">
                <a href="#" class="sb-categorie-card sb-categorie-card-2 sb-mb-30">
                    <div class="sb-card-body">
                        <div class="sb-category-icon">
                            <img src="{{asset('front/assets/img/categories/3.png')}}" alt="icon">
                        </div>
                        <div class="sb-card-descr">
                            <h3 class="sb-mb-10">Drinks</h3>
                            <p class="sb-text">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6">
                <a href="#" class="sb-categorie-card sb-categorie-card-2 sb-mb-30">
                    <div class="sb-card-body">
                        <div class="sb-category-icon">
                            <img src="{{asset('front/assets/img/categories/4.png')}}" alt="icon">
                        </div>
                        <div class="sb-card-descr">
                            <h3 class="sb-mb-10">Desserts</h3>
                            <p class="sb-text">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- categories end -->

<section class="sb-short-menu sb-p-0-90">
    <div class="sb-bg-2">
        <div></div>
    </div>
    <div class="container">
        <div class="sb-group-title sb-mb-30">
            <div class="sb-left sb-mb-30">
                <h2 class="sb-mb-30"><span>Top</span> Rated</h2>
            </div>
            <div class="sb-right sb-mb-30">
                <!-- slider navigation -->
                <div class="sb-slider-nav">
                    <div class="sb-prev-btn sb-short-menu-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"><i class="fas fa-arrow-left"></i></div>
                    <div class="sb-next-btn sb-short-menu-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"><i class="fas fa-arrow-right"></i></div>
                </div>
                <!-- slider navigation end -->
                <!-- button -->
                <a href="#" class="sb-btn">
                    <span class="sb-icon">
                        <img src="{{asset('front/assets/img/ui/icons/menu.svg')}}" alt="icon">
                    </span>
                    <span>All Products</span>
                </a>
                <!-- button end -->
            </div>
        </div>
        <div class="swiper-container sb-short-menu-slider-4i swiper-container-horizontal">
            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
               @forelse ($top_rated as $key => $product)    
                <div class="swiper-slide" style="width: 270px; margin-right: 30px;">
                    <a data-fancybox="menu" data-no-swup="" href="{{ $product->getFirstMediaurl('images') ? $product->getFirstMediaurl('images') : 'https://via.placeholder.com/270?text=No+Image+Found'  }}" class="sb-menu-item">
                        <div class="sb-cover-frame">
                            <img src="{{ $product->getFirstMediaurl('images') ? $product->getFirstMediaurl('images') : 'https://via.placeholder.com/270?text=No+Image+Found'  }}" alt="{{ $product->product_name}}">
                            <div class="sb-badge sb-vegan">{{ $product->category->category_name }}</div>
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">{{ $product->product_name }}</h4>
                            <div class="sb-price"><sub>Rs.</sub> {{ $product->price }}</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">{{ \Str::limit($product->product_description,67,'...') }}</p>
                            @if($product->rating->count() > 0)
                            <ul class="sb-stars">
                                <li><i class="fas fa-star {{ (int) $product->rating->sum('rating') >= 1 ?'' : 'no-start' }}" ></i></li>
                                <li><i class="fas fa-star {{ (int) $product->rating->sum('rating') >= 2 ?'' : 'no-start' }}"></i></li>
                                <li><i class="fas fa-star {{ (int) $product->rating->sum('rating') >= 3 ?'' : 'no-start' }}"></i></li>
                                <li><i class="fas fa-star {{ (int) $product->rating->sum('rating') >= 4 ?'' : 'no-start' }}"></i></li>
                                <li><i class="fas fa-star {{ (int) $product->rating->sum('rating') == 5 ?'' : 'no-start' }}"></i></li>
                            </ul>
                            @else
                            Not rated yet.
                            @endif
                        </div>
                        <div class="sb-card-buttons-frame">
                            <!-- button -->
                            <a href="{{ route('front.single.product',[$product->slug]) }}" class="sb-btn sb-btn-2 sb-btn-gray sb-btn-icon sb-m-0 float-left">
                              <span class="sb-icon">
                                <img src="{{ asset('front/assets/img/ui/icons/arrow.svg')}}" alt="icon">
                              </span>
                            </a>
                            <!-- button end -->
                            <!-- button -->
                            @isUser    
                                <a data-id="{{ $product->id }}"  href="#" class="sb-btn sb-atc sb-atc-add-to-cart float-right">
                                <span class="sb-icon">
                                    <img src="{{ asset('front/assets/img/ui/icons/cart.svg')}}" alt="icon">
                                </span>
                                <span class="sb-add-to-cart-text">Add to cart</span>
                                <span class="sb-added-text">Added</span>
                                </a>
                            @endisUser
                            @guest
                               <a href="{{ route('login') }}" class="sb-btn sb-atc float-right">
                                    <span class="sb-icon">
                                        <img src="{{ asset('front/assets/img/ui/icons/cart.svg')}}" alt="icon">
                                    </span>
                                    <span class="sb-add-to-cart-text">Add to cart</span>
                                    <span class="sb-added-text">Added</span>
                                </a>
                            @endguest
                            
                            <!-- button end -->
                          </div>
                    </a>
                </div>
               @empty
               <p class="text-center">No Products Found!</p>
               @endforelse
              
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</section>



<section class="sb-short-menu sb-p-0-90">
    <div class="sb-bg-2">
        <div></div>
    </div>
    <div class="container">
        <div class="sb-group-title sb-mb-30">
            <div class="sb-left sb-mb-30">
                <h2 class="sb-mb-30"><span>All</span> Products</h2>
                <p class="sb-text">Consectetur numquam poro nemo veniam<br>eligendi rem adipisci quo modi.</p>
            </div>
            <div class="sb-right sb-mb-30">
                <!-- slider navigation -->
                <div class="sb-slider-nav">
                    <div class="sb-prev-btn sb-short-menu-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"><i class="fas fa-arrow-left"></i></div>
                    <div class="sb-next-btn sb-short-menu-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"><i class="fas fa-arrow-right"></i></div>
                </div>
                <!-- slider navigation end -->
                <!-- button -->
                <a href="#" class="sb-btn">
                    <span class="sb-icon">
                        <img src="{{asset('front/assets/img/ui/icons/menu.svg')}}" alt="icon">
                    </span>
                    <span>All Products</span>
                </a>
                <!-- button end -->
            </div>
        </div>
        <div class="swiper-container sb-short-menu-slider-4i swiper-container-horizontal">
            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
               @foreach ($products as $key => $product)    
                <div class="swiper-slide" style="width: 270px; margin-right: 30px;">
                    <a data-fancybox="menu" data-no-swup="" href="{{ $product->getFirstMediaurl('images') ? $product->getFirstMediaurl('images') : 'https://via.placeholder.com/270?text=No+Image+Found'  }}" class="sb-menu-item">
                        <div class="sb-cover-frame">
                            <img src="{{ $product->getFirstMediaurl('images') ? $product->getFirstMediaurl('images') : 'https://via.placeholder.com/270?text=No+Image+Found'  }}" alt="{{ $product->product_name}}">
                            <div class="sb-badge sb-vegan">{{ $product->category->category_name }}</div>
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">{{ $product->product_name }}</h4>
                            <div class="sb-price"><sub>Rs.</sub> {{ $product->price }}</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15">{{ \Str::limit($product->product_description,67,'...') }}</p>
                            @if($product->rating->count() > 0)
                            <ul class="sb-stars">
                                <li><i class="fas fa-star {{ (int) $product->rating->sum('rating') >= 1 ?'' : 'no-start' }}" ></i></li>
                                <li><i class="fas fa-star {{ (int) $product->rating->sum('rating') >= 2 ?'' : 'no-start' }}"></i></li>
                                <li><i class="fas fa-star {{ (int) $product->rating->sum('rating') >= 3 ?'' : 'no-start' }}"></i></li>
                                <li><i class="fas fa-star {{ (int) $product->rating->sum('rating') >= 4 ?'' : 'no-start' }}"></i></li>
                                <li><i class="fas fa-star {{ (int) $product->rating->sum('rating') == 5 ?'' : 'no-start' }}"></i></li>
                            </ul>
                            @else
                            Not rated yet.
                            @endif
                        </div>
                        <div class="sb-card-buttons-frame">
                            <!-- button -->
                            <a href="{{ route('front.single.product',[$product->slug]) }}" class="sb-btn sb-btn-2 sb-btn-gray sb-btn-icon sb-m-0 float-left">
                              <span class="sb-icon">
                                <img src="{{ asset('front/assets/img/ui/icons/arrow.svg')}}" alt="icon">
                              </span>
                            </a>
                            <!-- button end -->
                            <!-- button -->
                            @isUser    
                                <a data-id="{{ $product->id }}"  href="#" class="sb-btn sb-atc sb-atc-add-to-cart float-right">
                                <span class="sb-icon">
                                    <img src="{{ asset('front/assets/img/ui/icons/cart.svg')}}" alt="icon">
                                </span>
                                <span class="sb-add-to-cart-text">Add to cart</span>
                                <span class="sb-added-text">Added</span>
                                </a>
                            @endisUser
                            @guest
                               <a href="{{ route('login') }}" class="sb-btn sb-atc float-right">
                                    <span class="sb-icon">
                                        <img src="{{ asset('front/assets/img/ui/icons/cart.svg')}}" alt="icon">
                                    </span>
                                    <span class="sb-add-to-cart-text">Add to cart</span>
                                    <span class="sb-added-text">Added</span>
                                </a>
                            @endguest
                            
                            <!-- button end -->
                          </div>
                    </a>
                </div>
               @endforeach
              
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</section>




<!-- team -->
<section class="sb-p-0-60" id="team">
    <div class="container">
        <div class="sb-group-title sb-mb-30">
            <div class="sb-left sb-mb-30">
                <h2 class="sb-mb-30">Our <span>Team</span> </h2>
                <p class="sb-text">Consectetur numquam poro nemo veniam<br>eligendi rem adipisci quo modi.</p>
            </div>
            <div class="sb-right sb-mb-30">
                <!-- button -->
                <a href="#" class="sb-btn sb-m-0">
                    <span class="sb-icon">
                        <img src="{{asset('front/assets/img/ui/icons/arrow.svg')}}" alt="icon">
                    </span>
                    <span>More about us</span>
                </a>
                <!-- button end -->
            </div>
        </div>
        <div class="row" >
            <div class="col-lg-3">
                <div class="sb-team-member sb-mb-30">
                    <div class="sb-photo-frame sb-mb-15">
                        <img src="{{asset('front/assets/img/team/talha.jpg')}}" alt="Team member">
                    </div>
                    <div class="sb-member-description">
                        <h4 class="sb-mb-10">Talha Nawaz</h4>
                        <p class="sb-text sb-text-sm sb-mb-10">Group Leader</p>
                        <ul class="sb-social">
                            <li>Contact:<a href="#">03211647878</li>
                           
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sb-team-member sb-mb-30">
                    <div class="sb-photo-frame sb-mb-15">
                        <img src="{{asset('front/assets/img/team/hamdan.jpg')}}" alt="Team member">
                    </div>
                    <div class="sb-member-description">
                        <h3 class="sb-mb-10">Muhammad Hamdan</h3>
                        <p class="sb-text sb-text-sm sb-mb-10">Team Member</p>
                        <ul class="sb-social">
                            <li>Contact:<a href="#">03211647878</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sb-team-member sb-mb-30">
                    <div class="sb-photo-frame sb-mb-15">
                        <img src="{{asset('front/assets/img/team/ahsan.jpg')}}" alt="Team member">
                    </div>
                    <div class="sb-member-description">
                        <h3 class="sb-mb-10">Ahsan Ilyas</h3>
                        <p class="sb-text sb-text-sm sb-mb-10">Team Member</p>
                        <ul class="sb-social">
                            <li>Contact:<a href="#">03211647878</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sb-team-member sb-mb-30">
                    <div class="sb-photo-frame sb-mb-15">
                        <img src="{{asset('front/assets/img/team/hanan.jpg')}}" alt="Team member">
                    </div>
                    <div class="sb-member-description">
                        <h3 class="sb-mb-10">Hanan Ali</h3>
                        <p class="sb-text sb-text-sm sb-mb-10">Team Member</p>
                        <ul class="sb-social">
                            <li>Contact:<a href="#">03211647878</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- team end -->

<!-- call to action -->
<!-- <section class="sb-call-to-action">
    <div class="sb-bg-3"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="sb-cta-text">
                    <h2 class="sb-h1 sb-mb-30">Download our mobile app.</h2>
                    <p class="sb-text sb-mb-30">Consectetur numquam poro nemo veniam<br>eligendi rem adipisci quo modi.</p>
                    <a href="#." target="_blank" data-no-swup class="sb-download-btn"><img src="{{asset('front/assets/img/buttons/1.svg')}}" alt="img"></a>
                    <a href="#." target="_blank" data-no-swup class="sb-download-btn"><img src="{{asset('front/assets/img/buttons/2.svg')}}" alt="img"></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="sb-illustration-3">
                    <img src="{{asset('front/assets/img/illustrations/phones.png')}}" alt="phones" class="sb-phones">
                    <div class="sb-cirkle-1"></div>
                    <div class="sb-cirkle-2"></div>
                    <div class="sb-cirkle-3"></div>
                    <div class="sb-cirkle-4"></div>
                    <img src="{{asset('front/assets/img/illustrations/1.svg')}}" alt="phones" class="sb-pik-1">
                    <img src="{{asset('front/assets/img/illustrations/2.svg')}}" alt="phones" class="sb-pik-2">
                    <img src="{{asset('front/assets/img/illustrations/3.svg')}}" alt="phones" class="sb-pik-3">
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- call to action end -->
@endsection