<script type="text/javascript">
  $(document).ready(function() {

     // ajax setup

   $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

  var counter = $('.sb-cart-number').text();
    $('.sb-atc-add-to-cart').on('click', function() {
        var product_id = $(this).data("id");
        $.ajax({
            data: { "_token": "{{ csrf_token() }}", product_id: product_id},
            url: "{{ route('front.addToCart') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                // console.log(data);
            },
            error: function (data) {
                
            }
        });
        counter++;
        $('.sb-cart-number').addClass('sb-added');
        $(this).addClass('sb-added');
        setTimeout(() => {
        $('.sb-cart-number').removeClass('sb-added');
        }, 600);
        setTimeout(() => {
        $('.sb-cart-number').text(counter);
        }, 300);
    });

    


    $('.sb-btn-cart').on('click', function() {
        $.ajax({
            url: "{{ route('front.getCartItems') }}",
            type: "GET",
            dataType: 'json',
            success: function (data) {
                var $cartContent=$(".sb-minicart-content");
                $cartContent.html('');
                $html='';
                if(data.data){
                    $html=`<div class="sb-ib-title-frame sb-mb-30">
                               <h4>Your order.</h4><i class="fas fa-arrow-down"></i>
                            </div>`;
                            $total_amount=0;
                    $.each(data.data,function(key,value){
                        $html+=`<a href="#" class="sb-menu-item sb-menu-item-sm sb-mb-15">
                            <div class="sb-cover-frame">
                               <img style="width:60px; height:60px" src="${value.image}" alt="product">
                               <i class="sb-cart-number sb-cart-quantity"> ${value.quantity}</i>
                            </div>
                            <div class="sb-card-tp">
                                <h4 class="sb-card-title">${value.name}</h4>
                                <div class="sb-price"><sub>Rs.</sub> ${value.price}</div>
                            </div>
                         </a>`;
                         $total_amount+=value.price*value.quantity;
                    });
                    $html+=`<div class="sb-ib-title-frame sb-mb-30">
                               <h4 class="float-left">Total Amount.</h4>
                               <h5 class="float-right">Rs. ${$total_amount}</h5>
                            </div>`;
                }else{
                    $html+=`<div class="sb-ib-title-frame sb-mb-30">
                               <h4>No Items in Cart.</h4>
                            </div>`;
                }
                $cartContent.html($html);
                
            },
            error: function (data) {
                
            }
        });
    });


    $('.sb-sub').on('click', function() {
        var cart_id = $(this).data("id");
        var product_price = $(this).data("price");
        var quantity = $(`#quantity-${cart_id}`).val();
        if(quantity >= 1){
            $.ajax({
                url: '{{ route("front.decrementQuantity") }}',
                data: { "_token": "{{ csrf_token() }}", cart_id: cart_id},
                type: "GET",
                dataType: 'json',
                success: function (data) {
                    var count=$(".sb-cart-number").text();
                    $('.sb-cart-number').text(--count);
                    
                    $html=`Rs ${quantity*product_price}`;
                    var product_total_price=$(`.product-total-${cart_id}`);
                    product_total_price.html($html);    
                    
                    var total_amount=$(".total-amount").text().split(" ")[1];
                    total_amount =parseInt(total_amount)-product_price;
                    $(".total-amount").text(`Rs ${total_amount}`)
                },
                error: function (data) {
                    
                }
            });
    }
    });

    $('.sb-add').on('click', function() {
        var cart_id = $(this).data("id");
        var product_price = $(this).data("price");
        var quantity = $(`#quantity-${cart_id}`).val();
        if(quantity > 1){
            $.ajax({
                url: '{{ route("front.incrementQuantity") }}',
                data: { "_token": "{{ csrf_token() }}", cart_id: cart_id},
                type: "GET",
                dataType: 'json',
                success: function (data) {
                    var count=$(".sb-cart-number").text();
                    $('.sb-cart-number').text(++count);
                    
                   
                    $html=`Rs ${quantity*product_price}`;
                    var product_total_price=$(`.product-total-${cart_id}`);
                    product_total_price.html($html);  
    
                    var total_amount=$(".total-amount").text().split(" ")[1];
                    total_amount =parseInt(total_amount)+product_price;
                    $(".total-amount").text(`Rs ${total_amount}`)
    
                },
                error: function (data) {
                    
                }
            });
        }
    });

    $('.sb-remove').on('click', function() {
        var cart_id = $(this).data("id");
        var product_price = $(this).data("price");
        $.ajax({
            url: '{{ route("front.removeCartItem") }}',
            data: { "_token": "{{ csrf_token() }}", cart_id: cart_id},
            type: "GET",
            dataType: 'json',
            success: function (data) {
               
                
                var quantity = $(`#quantity-${cart_id}`).val();

                console.log("quantity: " + quantity);

                var count=$(".sb-cart-number").text();
                console.log("count: " + count);
                $('.sb-cart-number').text(count-quantity);

                var total_amount=$(".total-amount").text().split(" ")[1];
                total_amount =parseInt(total_amount)-(quantity*product_price);
                $(".total-amount").text(`Rs ${total_amount}`)

                $(`.item-${cart_id}`).remove();

            },
            error: function (data) {
                
            }
        });
    });

//    /***************************

//     add to cart

//     ***************************/
//     $('.sb-atc-add-to-cart').on('click', function() {
//       counter++;
//       $('.sb-cart-number').addClass('sb-added');
//       $(this).addClass('sb-added');
//       setTimeout(() => {
//         $('.sb-cart-number').removeClass('sb-added');
//       }, 600);
//       setTimeout(() => {
//         $('.sb-cart-number').text(counter);
//       }, 300);
//     });
});
</script>