<!-- jquery js -->
<script src="{{ asset('front/assets/js/plugins/jquery.min.js')}}"></script>
<!-- smooth scroll js -->
<script src="{{ asset('front/assets/js/plugins/smooth-scroll.js')}}"></script>
<!-- swup js -->
<script src="{{ asset('front/assets/js/plugins/swup.min.js')}}"></script>
<!-- swiper js -->
<script src="{{ asset('front/assets/js/plugins/swiper.min.js')}}"></script>
<!-- datepicker js -->
<script src="{{ asset('front/assets/js/plugins/datepicker.js')}}"></script>
<!-- isotope js -->
<script src="{{ asset('front/assets/js/plugins/isotope.js')}}"></script>
<!-- sticky -->
<script src="{{ asset('front/assets/js/plugins/sticky.js')}}"></script>
<!-- mapbox js -->
<script src="{{ asset('front/assets/js/plugins/mapbox.min.js')}}"></script>
<!-- fancybox js -->
<script src="{{ asset('front/assets/js/plugins/fancybox.min.js')}}"></script>
<!-- starbelly js -->

<script src="{{ asset('front/assets/js/main.js')}}"></script>
<script type='text/javascript' src="{{ asset('assets/js/bootstrap.js') }}"></script>



<script src="{{ asset('assets/js/sweetalert.js')}}"></script>
<!-- Start of Async Drift Code -->


    <!-- End of Async Drift Code -->
    <!-- End of Async Drift Code -->


<script type="text/javascript">
/*search*/

function clickRedirect(){
    $('.search-close').click();
}

$('#search').on('keyup', function () {

    var search = $(this).val();
    // console.log(search);
    var url = $('#searchUrl').val();
    $.ajax({
        url: url,
        method: 'GET',
        data: {key: search},
        success: function (result) {

            $("#appendSearchCart1").empty();
            if (result.data.length == 0) {
                $("#appendSearchCart1").empty();
                $("#appendSearchCart1").removeClass('overflowScroll');
            }

            var html = "";
            result.data.forEach(function (item, index) {
                if (item.image == null) {
                    $("#appendSearchCart1").removeClass('overflowScroll');
                    html += ' <div class="row card p-8"><h4 class="f-16 w-100 text-center">' + item.title + '</h4></div>';
                } else {
                    html += ' <div class="row mb-1">\n' +
                        '      <div class="col-12">\n' +
                        '                                                  <a onclick="clickRedirect()" class="product-search-redirect" href="' + item.link + '">\n' +
                        '                                                      <div class="card">\n' +
                        '                                                          <div class="card-horizontal ml-2 mt-2">\n' +
                        '\n' +
                        '                                                              <div class="img-square-wrapper p-8 d-inline-block">\n' +
                        '                                                                  <img  src="' + item.image + '" alt="" width="80" height="60">\n' +
                        '                                                              </div>\n' +
                        '\n' +
                        '                                                              <div class="card-body p-1rem d-inline-block">\n' +
                        '                                                                  <h4 class="card-title f-16">' + item.title + '</h4>\n' +
                        '                                                              </div>\n' +
                        '\n' +
                        '                                                          </div>\n' +
                        '                                                      </div>\n' +
                        '                                                  </div>\n' +
                        '                                                  </a>\n' +
                        '                                              </div>';
                    $('#appendSearchCart1').addClass('overflowScroll');
                }

            })
            $('#appendSearchCart1').append(html);

            if (result.data.length <= 5) {
                $("#appendSearchCart1").removeClass('overflowScroll');
            }

        }
    })


    });
</script>