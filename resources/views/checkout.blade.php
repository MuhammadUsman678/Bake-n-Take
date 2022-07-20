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
              <h1 class="sb-h2">Checkout.</h1>
              <ul class="sb-breadcrumbs">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('shop') }}">Shop</a></li>
                <li><a href="#.">Checkout</a></li>
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
      <div class="row">
        <div class="col-lg-8">
          @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <div class="alert alert-danger d-none required-error">
                        <li>All Fields are required</li>
            </div>
          <form role="form"  method="post" action="{{ route('front.order.confirm') }}" data-cc-on-check="false" class="sb-checkout-form needs-validation"  novalidate>
            @csrf
            @method('POST')
            <div class="sb-mb-30">
              <h3>Billing details</h3>
            </div>
            <div class="row">
              
              <div class="col-lg-6">
                <div class="sb-group-input">
                  <input type="text" name="full_name" id="full_name" readonly value="{{ $user->name }}" required>
                  <span class="sb-bar"></span>
                  <label class="filled-input-label" >Full name</label>
                 
                </div>
                
              </div>
              <div class="col-lg-6">
                <div class="sb-group-input">
                    <select name="country" id="" value="{{ old('country') }}" class="form-control custom-select">
                        <option value="pakistan" selected >Pakistan</option>
                    </select>
                  <span class="sb-bar"></span>
                  <label class="filled-input-label">Country</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="sb-group-input">
                  <input name="city" id="city" value="{{ old('city') }}" type="text" required>
                  <span class="sb-bar"></span>
                  <label>City</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="sb-group-input">
                  <input type="text" id="state" value="{{ old('state') }}" name="state" required>
                  <span class="sb-bar"></span>
                  <label>State / Province</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="sb-group-input">
                  <input type="text" id="street" value="{{ old('street') }}" name="street" required>
                  <span class="sb-bar"></span>
                  <label>Street</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="sb-group-input">
                  <input type="number" id="post_code" value="{{ old('post_code') }}" name="post_code" required>
                  <span class="sb-bar"></span>
                  <label>Postcode</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="sb-group-input">
                  <input type="tel" id="phone" value="{{ old('phone') }}" name="phone" required>
                  <span class="sb-bar"></span>
                  <label>Phone</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="sb-group-input">
                  <input type="email"  name="email" readonly value="{{ $user->email }}" required>
                  <span class="sb-bar"></span>
                  <label class="filled-input-label">Email</label>
                </div>
              </div>
            </div>
            <div class="sb-mb-30">
              <h3>Additional information</h3>
            </div>
            <div class="sb-group-input">
              <textarea name="notes" >{{ old('notes') }}</textarea>
              <span class="sb-bar"></span>
              <label>Order notes</label>
            </div>
            <div class="sb-mb-30">
              <h3 class="sb-mb-30">Payment method</h3>
              <ul>
                <li class="sb-radio">
                  <input type="radio" id="option-2" value="stripe" name="method" checked required>
                  <label for="option-2">Stripe</label>
                  <div class="sb-check"></div>
                  
                </li>
                <li class="sb-radio">
                  <input type="radio" id="option-3" value="cash_on_delivery" name="method" required>
                  <label for="option-3">Cash on delivery</label>
                  <div class="sb-check"></div>
                </li>
              </ul>
            </div>
            <!-- button -->
            <button type="submit" class="sb-btn sb-m-0">
              <span class="sb-icon">
                <img src="{{ asset('front/assets/img/ui/icons/arrow.svg')}}" alt="icon">
              </span>
              <span>Place order</span>
            </button>
            <!-- button end -->
          </form>
        </div>
        <div class="col-lg-4">
          <div class="sb-pad-type-2 sb-sticky" data-margin-top="120">
            <div class="sb-co-cart-frame">
              <div class="sb-cart-table">
                <div class="sb-cart-table-header">
                  <div class="row">
                    <div class="col-lg-9">Product</div>
                    <div class="col-lg-3 text-right">Total</div>
                  </div>
                </div>
                @php
                    $total_amount=0;
                @endphp
                @foreach ($products as $row)
                <div class="sb-cart-item">
                    <div class="row align-items-center">
                      <div class="col-lg-9">
                        <a class="sb-product" href="product.html">
                          <div class="sb-cover-frame"> 
                            <img src="{{ $row['image'] ?? 'https://via.placeholder.com/270?text=No+Image+Found'  }}" alt="product">
                          </div>
                          <div class="sb-prod-description">
                            <h4 class="sb-mb-10">{{ $row['name'] }}</h4>
                            <p class="sb-text sb-text-sm">x{{ $row['quantity'] }}</p>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-3 text-md-right">
                        <div class="sb-price-2"><span>Total: </span>Rs {{ $row['price']*$row['quantity'] }}</div>
                        @php
                            $total_amount+=$row['price']*$row['quantity'];
                        @endphp
                      </div>
                    </div>
                  </div>
                @endforeach
                
                <div class="sb-cart-total sb-cart-total-2">
                  <div class="sb-sum">
                    <div class="row">
                      <div class="col-6">
                        <div class="sb-total-title">Subtotal:</div>
                      </div>
                      <div class="col-6">
                        <div class="sb-price-1 text-right">Rs {{ $total_amount }}</div>
                      </div>
                    </div>
                  </div>
                  <div class="sb-realy-sum">
                    <div class="row">
                      <div class="col-6">
                        <div class="sb-total-title">Total:</div>
                      </div>
                      <div class="col-6">
                        <div class="sb-price-2 text-right">Rs {{ $total_amount }}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

   <!-- payment Model -->
   <div class="modal fade" id="StripePayment" tabindex="-1" role="dialog" aria-labelledby="StripePaymentTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Stripe Payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" id="stripeForm" action="#" method="post" class="require-validation"
        data-cc-on-file="false"
       data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
       id="payment-form">
            @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table mb-3" style="background: #eee;width:100%;" >
                            <div class="row display-tr" >
                                <h3 class="panel-title display-td" >Payment Details</h3>
                                <div class="display-td" >                            
                                    <img class="img-responsive pull-right" src="{{ asset('assets/card.png') }}">
                                </div>
                            </div>                    
                        </div>
                        <div class="panel-body">
          
                                <div class="alert alert-success text-center d-none">
                                </div>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> <input
                                        class='form-control'  placeholder='Your Name' size='4' type='text'>
                                </div>
          
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Card Number</label> <input
                                            autocomplete='off' class='form-control card-number'  placeholder='4242 4242 4242 4242' maxlength="19" size='19' data-inputmask="'mask': '9999 9999 9999 9999'"
                                            type='text'>
                                    </div>
          
                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                            class='form-control card-cvc' placeholder='ex. 311' maxlength="3" data-inputmask="'mask': '999'" size='4'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label> <input
                                            class='form-control card-expiry-month' placeholder='MM' data-inputmask="'mask': '99'" maxlength="2" size='2'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label> <input
                                            class='form-control card-expiry-year' placeholder='YYYY' data-inputmask="'mask': '9999'" maxlength="4" size='4'
                                            type='text'>
                                    </div>
                                </div>
          
                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group d-none'>
                                        <div class='alert-danger alert'>All fields is Required
                                            again.</div>
                                    </div>
                                </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit">Pay Now (Rs {{ $total_amount }})</button>
        </div>
       </form>
      </div>
    </div>
  </div>
  <!-- checkout end -->
@endsection
@section('script')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type='text/javascript' src="{{ asset('assets/js/inputmask.js') }}"></script>
<script type="text/javascript">

  $(function() {
    var $form2         = $(".sb-checkout-form");
    $('form.sb-checkout-form').bind('submit', function(e) {

        var $form2         = $(".sb-checkout-form");
        var $city=$("#city").val();
        var $country=$("#country").val();
        var $state=$("#state").val();
        var $street=$("#street").val()
        var $post_code=$("#post_code").val();
        var $phone=$("#phone").val();
      
        if($city=="" || $state=="" || $street=="" || $post_code=="" || $phone=="" || $country=="" ){
          e.preventDefault();
          $(".required-error").removeClass('d-none');
        }else{
          $(".required-error").addClass('d-none');
          if (!$form2.data('cc-on-check')) {
            e.preventDefault();
            $method=$('input[name="method"]:checked').val();
            console.log("method",$method);
            if($method==='stripe'){
              $('#StripePayment').modal({backdrop: 'static', keyboard: false})  
            }else{
              $form2.get(0).submit();
            }
          }
        }
    
     
    
    });



      $(":input").inputmask();
      $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
      
      var $form         = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
      var $form         = $(".require-validation"),
          inputSelector = ['input[type=email]', 'input[type=password]',
                           'input[type=text]', 'input[type=file]',
                           'textarea'].join(', '),
          $inputs       = $form.find('.required').find(inputSelector),
          $errorMessage = $form.find('div.error'),
          valid         = true;
          $errorMessage.addClass('d-none');
          $("body").addClass("loading"); 
          $('.has-error').removeClass('has-error');
      $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
          $input.parent().addClass('has-error');
         
          $("body").removeClass("loading"); 
          $errorMessage.removeClass('d-none');
          e.preventDefault();
        }
      });
    
      if (!$form.data('cc-on-file')) {
        e.preventDefault();
         
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
              number: $('.card-number').val(),
              cvc: $('.card-cvc').val(),
              exp_month: $('.card-expiry-month').val(),
              exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
         
      }
    
    });
    
    function stripeResponseHandler(status, response) {
          if (response.error) {
              $('.error')
                  .removeClass('d-none')
                  .find('.alert')
                  .text(response.error.message);
                  $("body").removeClass("loading"); 
          } else {
              // token contains id, last4, and card type
              var token = response['id'];
              // insert the token into the form so it gets submitted to the server
              $form.find('input[type=text]').empty();
              $form.append("<input type='hidden' id='stripeToken' name='stripeToken' value='" + token + "'/>");
              // $form.get(0).submit();
              $.ajax({
                    url: "{{ route('stripe.post') }}",
                    method: 'post',
                    data: $('#stripeForm').serialize(),
                    dataType: 'json',
                    success: function(result){
                      $(".alert-success").html(result.success);
                      $(".alert-success").removeClass('d-none');
                      $form2.get(0).submit();
                      $("#stripeForm").trigger("reset");
                       $("body").removeClass("loading"); 
                    },
                    error: function (data) {
                       $('.error')
                          .removeClass('d-none')
                          .find('.alert')
                          .text("Something went wrong. Please try again");
                          $("body").removeClass("loading"); 
                    }
             });
          }
      }
    
  });
  </script>
@endsection