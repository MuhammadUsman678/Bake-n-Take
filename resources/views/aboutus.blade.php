@extends('layouts.master')
@section('title','Categories')
@section('content')

<section class="sb-banner sb-banner-xs sb-banner-color">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- main title -->
          <div class="sb-main-title-frame">
            <div class="sb-main-title">
              <h1 class="sb-h2">About Us</h1>
              <ul class="sb-breadcrumbs">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="#.">Our Team</a></li>
              </ul>
            </div>
          </div>
          <!-- main title end -->
        </div>
      </div>
    </div>
    <section class="sb-p-0-60" id="team">
        <div class="container">
            <div class="sb-group-title sb-mb-30">
                <div class="sb-left sb-mb-30">
                    <h2 class="sb-mb-30">Our <span>Team</span> </h2>
                    <p class="sb-text">We Provide best Services.</p>
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
  </section>








@endsection