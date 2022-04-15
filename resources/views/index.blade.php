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
                           <span  class="sb-suptitle sb-mb-30">Hi, {{auth()->user()->name}}!</span> 
                        @endauth
                        <h1 class="sb-mb-30">We do not <span>cook</span>, <br>we <span>create</span> your <br>emotions!</h1>
                        <p class="sb-text sb-text-lg sb-mb-30">Consectetur numquam poro nemo veniam<br>eligendi rem adipisci quo modi.</p>
                        <!-- button -->
                        <a href="#" class="sb-btn">
                            <span class="sb-icon">
                                <img src="{{asset('front/assets/img/ui/icons/menu.svg')}}" alt="icon">
                            </span>
                            <span>Our menu</span>
                        </a>
                        <!-- button end -->
                        <!-- button -->
                        <a href="#" class="sb-btn sb-btn-2 sb-btn-gray">
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
                <h2 class="sb-mb-60">We are doing more than <br>you expect</h2>
                <ul class="sb-features">
                    <li class="sb-features-item sb-mb-60">
                        <div class="sb-number">01</div>
                        <div class="sb-feature-text">
                            <h3 class="sb-mb-15">We are located in the city center</h3>
                            <p class="sb-text">Porro nemo veniam necessitatibus praesentium eligendi rem temporibus adipisci quo modi numquam.</p>
                        </div>
                    </li>
                    <li class="sb-features-item sb-mb-60">
                        <div class="sb-number">02</div>
                        <div class="sb-feature-text">
                            <h3 class="sb-mb-15">Fresh, organic ingredients</h3>
                            <p class="sb-text">Consectetur numquam porro nemo veniam necessitatibus praesentium eligendi rem temporibus adipisci quo modi.</p>
                        </div>
                    </li>
                    <li class="sb-features-item sb-mb-60">
                        <div class="sb-number">03</div>
                        <div class="sb-feature-text">
                            <h3 class="sb-mb-15">Own fast delivery</h3>
                            <p class="sb-text">Necessitatibus praesentium eligendi rem temporibus adipisci quo modi. Lorem ipsum dolor sit.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="sb-illustration-2 sb-mb-90">
                    <div class="sb-interior-frame">
                        <img src="{{asset('front/assets/img/illustrations/interior.jpg')}}" alt="interior" class="sb-interior">
                    </div>
                    <div class="sb-square"></div>
                    <div class="sb-cirkle-1"></div>
                    <div class="sb-cirkle-2"></div>
                    <div class="sb-cirkle-3"></div>
                    <div class="sb-cirkle-4"></div>
                    <div class="sb-experience">
                        <div class="sb-exp-content">
                            <p class="sb-h1 sb-mb-10">17</p>
                            <p class="sb-h3">Years Experiense</p>
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
                <h2 class="sb-mb-30">Most <span>popular</span> dishes</h2>
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
                    <span>Full menu</span>
                </a>
                <!-- button end -->
            </div>
        </div>
        <div class="swiper-container sb-short-menu-slider-4i swiper-container-horizontal">
            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                <div class="swiper-slide swiper-slide-active" style="width: 270px; margin-right: 30px;">
                    <a data-fancybox="menu" data-no-swup="" href="{{asset('front/assets/img/menu/3.jpg')}}" class="sb-menu-item">
                        <div class="sb-cover-frame">
                            <img src="{{asset('front/assets/img/menu/3.jpg')}}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Carpaccio de daurade</h4>
                            <div class="sb-price"><sub>$</sub> 14</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15"><span>tomatoes</span>, <span>nori</span>, <span>feta cheese</span>, <span>mushrooms</span>, <span>rice noodles</span>, <span>corn</span>, <span>shrimp</span>.</p>
                            <ul class="sb-stars">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide swiper-slide-next" style="width: 270px; margin-right: 30px;">
                    <a data-fancybox="menu" data-no-swup="" href="{{asset('front/assets/img/menu/1.jpg')}}" class="sb-menu-item">
                        <div class="sb-cover-frame">
                            <img src="{{asset('front/assets/img/menu/1.jpg')}}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Chevrefrit au miel</h4>
                            <div class="sb-price"><sub>$</sub> 14</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15"><span>tomatoes</span>, <span>nori</span>, <span>feta cheese</span>, <span>mushrooms</span>, <span>rice noodles</span>, <span>corn</span>, <span>shrimp</span>.</p>
                            <ul class="sb-stars">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide" style="width: 270px; margin-right: 30px;">
                    <a data-fancybox="menu" data-no-swup="" href="{{asset('front/assets/img/menu/2.jpg')}}" class="sb-menu-item">
                        <div class="sb-cover-frame">
                            <img src="{{asset('front/assets/img/menu/2.jpg')}}" alt="product">
                            <div class="sb-badge sb-vegan"><i class="fas fa-leaf"></i> Vegan</div>
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Saumon Gravlax</h4>
                            <div class="sb-price"><sub>$</sub> 9</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15"><span>tomatoes</span>, <span>nori</span>, <span>feta cheese</span>, <span>mushrooms</span>, <span>rice noodles</span>, <span>corn</span>, <span>shrimp</span>.</p>
                            <ul class="sb-stars">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide" style="width: 270px; margin-right: 30px;">
                    <a data-fancybox="menu" data-no-swup="" href="{{asset('front/assets/img/menu/9.jpg')}}" class="sb-menu-item">
                        <div class="sb-cover-frame">
                            <img src="{{asset('front/assets/img/menu/9.jpg')}}" alt="product">
                            <div class="sb-badge sb-hot"><i class="fas fa-pepper-hot"></i> Hot</div>
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Croustillant de poisson</h4>
                            <div class="sb-price"><sub>$</sub> 4</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15"><span>tomatoes</span>, <span>nori</span>, <span>feta cheese</span>, <span>mushrooms</span>, <span>rice noodles</span>, <span>corn</span>, <span>shrimp</span>.</p>
                            <ul class="sb-stars">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide" style="width: 270px; margin-right: 30px;">
                    <a data-fancybox="menu" data-no-swup="" href="{{asset('front/assets/img/menu/5.jpg')}}" class="sb-menu-item">
                        <div class="sb-cover-frame">
                            <img src="{{asset('front/assets/img/menu/5.jpg')}}" alt="product">
                            <div class="sb-badge sb-vegan"><i class="fas fa-leaf"></i> Vegan</div>
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Carpaccio de daurade</h4>
                            <div class="sb-price"><sub>$</sub> 6</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15"><span>tomatoes</span>, <span>nori</span>, <span>feta cheese</span>, <span>mushrooms</span>, <span>rice noodles</span>, <span>corn</span>, <span>shrimp</span>.</p>
                            <ul class="sb-stars">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide" style="width: 270px; margin-right: 30px;">
                    <a data-fancybox="menu" data-no-swup="" href="{{asset('front/assets/img/menu/4.jpg')}}" class="sb-menu-item">
                        <div class="sb-cover-frame">
                            <img src="{{asset('front/assets/img/menu/4.jpg')}}" alt="product">
                        </div>
                        <div class="sb-card-tp">
                            <h4 class="sb-card-title">Stracciatella</h4>
                            <div class="sb-price"><sub>$</sub> 11</div>
                        </div>
                        <div class="sb-description">
                            <p class="sb-text sb-mb-15"><span>tomatoes</span>, <span>nori</span>, <span>feta cheese</span>, <span>mushrooms</span>, <span>rice noodles</span>, <span>corn</span>, <span>shrimp</span>.</p>
                            <ul class="sb-stars">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</section>

<!-- team -->
<section class="sb-p-0-60">
    <div class="container">
        <div class="sb-group-title sb-mb-30">
            <div class="sb-left sb-mb-30">
                <h2 class="sb-mb-30">They will <span>cook</span> for you</h2>
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
        <div class="row">
            <div class="col-lg-3">
                <div class="sb-team-member sb-mb-30">
                    <div class="sb-photo-frame sb-mb-15">
                        <img src="{{asset('front/assets/img/team/1.png')}}" alt="Team member">
                    </div>
                    <div class="sb-member-description">
                        <h4 class="sb-mb-10">Paul Trueman</h4>
                        <p class="sb-text sb-text-sm sb-mb-10">Chef</p>
                        <ul class="sb-social">
                            <li><a href="#."><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#."><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#."><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#."><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sb-team-member sb-mb-30">
                    <div class="sb-photo-frame sb-mb-15">
                        <img src="{{asset('front/assets/img/team/2.png')}}" alt="Team member">
                    </div>
                    <div class="sb-member-description">
                        <h3 class="sb-mb-10">Emma Newman</h3>
                        <p class="sb-text sb-text-sm sb-mb-10">Assistant chef</p>
                        <ul class="sb-social">
                            <li><a href="#."><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#."><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#."><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#."><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sb-team-member sb-mb-30">
                    <div class="sb-photo-frame sb-mb-15">
                        <img src="{{asset('front/assets/img/team/3.png')}}" alt="Team member">
                    </div>
                    <div class="sb-member-description">
                        <h3 class="sb-mb-10">Oscar Oldman</h3>
                        <p class="sb-text sb-text-sm sb-mb-10">Chef</p>
                        <ul class="sb-social">
                            <li><a href="#."><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#."><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#."><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#."><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sb-team-member sb-mb-30">
                    <div class="sb-photo-frame sb-mb-15">
                        <img src="{{asset('front/assets/img/team/4.png')}}" alt="Team member">
                    </div>
                    <div class="sb-member-description">
                        <h3 class="sb-mb-10">Ed Freeman</h3>
                        <p class="sb-text sb-text-sm sb-mb-10">Assistant chef</p>
                        <ul class="sb-social">
                            <li><a href="#."><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#."><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#."><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#."><i class="fab fa-youtube"></i></a></li>
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