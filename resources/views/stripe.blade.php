<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5 - Stripe Payment Gateway Integration Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/bootstrap.min.css')}}" />
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
   
</head>
<body>
  
<div class="container">
  
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#StripePayment">
    Payment
  </button>
  
  <!-- Modal -->
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
                                        <div class='alert-danger alert'>Please correct the errors and try
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
          <button class="btn btn-primary" type="submit">Pay Now ($100)</button>
        </div>
       </form>
      </div>
    </div>
  </div>
  
   
      
</div>
   <div class="overlay"></div>
</body>
  
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="{{ asset('front/assets/js/plugins/jquery.min.js')}}"></script>  
<script type='text/javascript' src="{{ asset('assets/js/inputmask.js') }}"></script>
<script type='text/javascript' src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script type="text/javascript">

$(function() {
    $(":input").inputmask();
    // $("body").addClass("loading"); 
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
                     $("#stripeForm").trigger("reset");
                     $(".alert-success").html(result.success);
                     $(".alert-success").removeClass('d-none');
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
</html>