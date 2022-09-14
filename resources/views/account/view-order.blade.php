@extends('layouts.master')
@section('title','View Order')
<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/flipclock.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/quiz.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <style>
    .flip-clock-dot{
      display: none;
    }
    .steps {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    position: relative;
}
.step-button {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: none;
    background-color: var(--prm-gray);
    transition: .4s;
}
.step-button[aria-expanded="true"] {
    width: 60px;
    height: 60px;
    background-color: var(--prm-color);
    color: #fff;
}
.done {
    background-color: var(--prm-color);
    color: #fff;
}
.step-item {
    z-index: 10;
    text-align: center;
}
#progress {
  -webkit-appearance:none;
    position: absolute;
    width: 95%;
    z-index: 5;
    height: 10px;
    margin-left: 18px;
    margin-bottom: 18px;
}
/* to customize progress bar */
#progress::-webkit-progress-value {
    background-color: var(--prm-color);
    transition: .5s ease;
}
#progress::-webkit-progress-bar {
    background-color: var(--prm-gray);
 
}
.blue{
  background: blue!important;
}
.green{
  background: green!important;
}
.red{
  background:red!important;
}
    </style>
@section('content')
  <!-- banner -->
  <section class="sb-banner sb-banner-xs sb-banner-color">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- main title -->
          <div class="sb-main-title-frame">
            <div class="sb-main-title">
              <h1 class="sb-h2">Order.</h1>
              <ul class="sb-breadcrumbs">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('front.orders') }}">Orders</a></li>
                <li><a href="#.">View Order</a></li>
              </ul>
            </div>
          </div>
          <!-- main title end -->
        </div>
      </div>
    </div>
  </section>
  <!-- banner end -->

  <!-- checkout -->
  <section class="sb-p-90-90">
    <div class="container" data-sticky-container>
      
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="container">
  <div class="accordion" id="accordionExample">
  <div class="steps">
      <progress id="progress" value=0 max=100 ></progress>
      <div class="step-item">
          <button class="step-button text-center step1" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color:white;">
              1
          </button>
          <div class="step-title">
             New
          </div>
      </div>
      <div class="step-item">
          <button class="step-button text-center collapsed step2" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color:white;">
              2
          </button>
          <div class="step-title">
            In progress
          </div>
      </div>
      <div class="step-item">
          <button class="step-button text-center collapsed step3" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color:white;">
              3
          </button>
          <div class="step-title">
              Completed
          </div>
      </div>
  </div>
   <input type="hidden" value={{$order->status}} id="checkme">

  </div>
  </div>
      <div class="row">
        <div class="row">
          
          <div class="col-md-12 alert alert-success d-block">
            Payment Status
            <br>
            <marquee width="100%" direction="right" height="30px">
              <span class="text-primary"><h4> Your Payment is {{ ucfirst($order->payment_status) }}</h4>  </span>
              </marquee>
        </div>
          <div class="col-md-6">
             <b> Full Name</b> : {{ $order->full_name }}
          </div>
          <div class="col-md-6">
             <b> Email </b>: {{ $order->email }}
          </div>
          <div class="col-md-6">
             <b> Phone</b> : {{ $order->phone }}
          </div>
          <div class="col-md-6">
             <b> City</b> : {{ $order->city }}
          </div>
          <div class="col-md-6">
             <b> Country </b>: {{ $order->country }}
          </div>
          <div class="col-md-6">
             <b> Street</b> : {{ $order->street }}
          </div>
          <div class="col-md-6">
             <b> Delivery Date </b> : {{ $order->delivery_date }}
          </div>
          <div class="col-md-6">
             <b> Payment Method  </b>: {{ $order->payment_method }}
          </div>
          <div class="col-md-6">
             <b> Payment Status : </b> {{ $order->payment_status }}
          </div>
      </div>
      </div>
      <div class="col-lg-12 mt-5">
        <div class="sb-pad-type-2 sb-sticky" data-margin-top="120">
          <div class="sb-co-cart-frame">
            <div class="sb-cart-table">
              <div class="sb-cart-table-header">
                <div class="row">
                  <div class="col-lg-6">Product</div>
                  <div class="col-lg-{{ ($order->status==='delivered') ?'3' :'6' }} text-right">Total</div>
                  @if($order->status==='delivered')
                    <div class="col-lg-3 text-right">Review</div>
                  @endif
                </div>
              </div>
              @php
                  $total_amount=0;
              @endphp
              
              @foreach ($products as $key=>$row)
              <div class="sb-cart-item">
                  <div class="row align-items-center">
                    <div class="col-lg-6">
                      <a class="sb-product" href="{{ route('front.single.product',[$row['slug']]) }}">
                        <div class="sb-cover-frame"> 
                          <img src="{{ $row['image'] ?? 'https://via.placeholder.com/270?text=No+Image+Found'  }}" alt="product">
                        </div>
                        <div class="sb-prod-description">
                          <h4 class="sb-mb-10">{{ $row['name'] }}</h4>
                          <p class="sb-text sb-text-sm">x{{ $row['quantity'] }}</p>
                          <p class="sb-text sb-text-sm"><small class="badge badge-info">{{ $order->status==='delivered' ? 'Delivered' : $row['status'] }}</small></p>
                          @if($row['take_way_time'] !=0)
                          <div class="countdown-wrapper">
                            <div id="countdown{{$key}}" class="countdown countdown{{$key}}"></div>
                        </div>
                        @endif
                        </div>
                        <a data-no-swup="" href="{{url('front/chat/'.$row['shop_id'])}}" class="btn-small d-block" style="color: #f5c332"><i class="fas fa-comment"></i> Chat Now</a>

                      </a>
                    </div>
                    <div class="col-lg-{{ ($order->status==='delivered') ?'3' :'6' }} text-md-right">
                      <div class="sb-price-2"><span>Total: </span>Rs {{ $row['price']*$row['quantity'] }}</div>
                      @php
                          $total_amount+=$row['price']*$row['quantity'];
                      @endphp
                    </div>
                    @if($order->status==='delivered')
                      <div class="col-lg-3 text-md-right">
                        <div class="sb-price-2">
                         
                          <a data-no-swup href="{{ route('front.product.review',[base64_encode($row['product_id']),base64_encode($order->id)]) }}" class="btn sb-btn  ">Rating</a>
                        </div>
                      </div>
                    @endif
                  </div>
                </div>
              @endforeach
              
              <div class="sb-cart-total sb-cart-total-2">
                <div class="sb-sum">
                  <div class="row">
                    <div class="col-6">
                      <div class="sb-total-title">Subtotal:</div>
                    </div>
                    <div class="col-{{ ($order->status==='delivered') ?'3' :'6' }}">
                      <div class="sb-price-1 text-right">Rs {{ $total_amount }}</div>
                    </div>
                  </div>
                </div>
                <div class="sb-realy-sum">
                  <div class="row">
                    <div class="col-6">
                      <div class="sb-total-title">Total:</div>
                    </div>
                    <div class="col-{{ ($order->status==='delivered') ?'3' :'6' }}">
                      <div class="sb-price-2 text-right">Rs {{ $total_amount }}</div>
                    </div>
                  </div>
                </div>
                @if($order->payment_status ==='paid')
                  <div class="sb-realy-sum">
                    <div class="row">
                      <div class="col-6">
                        <div class="sb-total-title">Paid:</div>
                      </div>
                      <div class="col-6">
                        <div class="sb-price-2 text-right">Rs {{ $total_amount }}</div>
                      </div>
                    </div>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
@section('script')

<!-- Stepper JavaScript -->
{{-- <script>
const stepButtons = document.querySelectorAll('.step-button');
const progress = document.querySelector('#progress');
 
Array.from(stepButtons).forEach((button,index) => {
    button.addEventListener('click', () => {
        progress.setAttribute('value', index * 100 /(stepButtons.length - 1) );//there are 3 buttons. 2 spaces.
 
        stepButtons.forEach((item, secindex)=>{
            if(index > secindex){
                item.classList.add('done');
            }
            if(index < secindex){
                item.classList.remove('done');
            }
        })
    })
})
</script> --}}
<script>
  $(document).ready(function(){
    setTimeout(function() {
var val=$('#checkme').val();
if(val=='new'){
$('.step1').addClass('blue');
$('.step2').addClass('red');
$('.step3').addClass('red');
}else if(val=='process'){
  $('.step1').addClass('green');
$('.step2').addClass('blue');
$('.step3').addClass('red');
}
else{
  $('.step1').addClass('green');
$('.step2').addClass('green');
$('.step3').addClass('green');
}}, 2000);
  });
  </script>



<script src="{{ asset('front/assets/js/flipclock.js') }}"></script>
<script src="{{ asset('front/assets/js/countdown.js') }}"></script>
<script src="{{ asset('front/assets/js/counterup.js') }}"></script>

@foreach ($products as $key=>$row)
@if($row['take_way_time'] !=0)
<script>
(function () {
    var countdown, init_countdown, set_countdown;
    var row=@json($row);

    countdown = init_countdown = function () {
        countdown = new FlipClock($('.countdown'+{{$key}}), {
            clockFace: 'MinuteCounter',
            language: 'en',
            autoStart: false,
            countdown: true,
            showSeconds: true,
            callbacks: {
                start: function () {
                    /*here start the exam*/
                    return console.log('The clock has started!');
                },
                stop: function () {
                    /*here e3nd the exam*/
                    $('#regForm').submit();
                    return console.log('The clock has stopped!');
                },
                interval: function () {
                    /*here time is going*/
                    var time;
                    time = this.factory.getTime().time;
                    if (time) {
                        return console.log('Clock interval', time);
                    }
                }
            }
        });


        return countdown;
    };

    set_countdown = function (minutes, start) {
        var elapsed, end, left_secs, now, seconds;
        if (countdown.running) {
            return;
        }
        seconds = minutes * 60;
        now = new Date();
        start = new Date(start);
        end = start.getTime() + seconds * 1000;
        left_secs = Math.round((end - now.getTime()) / 1000);
        elapsed = false;
        if (left_secs < 0) {
            left_secs *= -1;
            elapsed = true;
        }
        countdown.setTime(left_secs);
        return countdown.start();
    };

    init_countdown();

    set_countdown(row.take_way_time, new Date());

}).call(this);

@endif

</script>   
@endforeach

@endsection