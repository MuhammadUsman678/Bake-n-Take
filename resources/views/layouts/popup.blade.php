<!-- discount popup -->
    <!-- <div class="sb-popup-frame">
        <div class="sb-popup-body">
            <div class="sb-close-popup">+</div>
            <div class="sb-promo-content">
                <div class="sb-text-frame">
                    <h3 class="sb-mb-15">Visit Starbelly and get your coffee*</h3>
                    <h3 class="sb-mb-10"><b class="sb-h2">FOR FREE!</b></h3>
                    <p class="sb-text sb-text-sm sb-mb-15">*Et modi itaque praesentium.</p>
                    
                    <a href="product.html" class="sb-btn sb-ppc">
                        <span class="sb-icon">
                            <img src="img/ui/icons/arrow.svg" alt="icon">
                        </span>
                        <span>Get it now</span>
                    </a>
                </div>
                <div class="sb-image-frame">
                    <div class="sb-illustration-5">
                        <img src="img/illustrations/cup.png" alt="cup" class="sb-cup">
                        <div class="sb-cirkle-1"></div>
                        <div class="sb-cirkle-2"></div>
                        <div class="sb-cirkle-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- discount popup end -->



    <!-- Search Modal Start -->
<div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1" style="background-color: #000000;opacity: 0.9;">
    <button type="button" class="close search-close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true" class="fa fa-times"></span>
    </button>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="search-block clearfix">
                {{-- <form>
                    <div class="form-group">
                        <input class="form-control" placeholder="eg: Computer Technology" type="text">
                    </div>
                </form> --}}
                 <form action="#" style="margin:20px">
                                <input class="form-control" id="search" type="text" name="search"
                                       placeholder="Search for Products">
                                {{-- <button type="submit"><i class="fa fa-search"></i></button> --}}

                                <!-- Search bar END - -->

                                <!-- ======================== Search Suggession ============================= -->

                                <div class="overflow-hidden search-list w-100">
                                    <div id="appendSearchCart1"></div>
                                </div>
                                {{--some ajax value--}}
                                <input value="@translate(Your Cart is Empty)" type="hidden"
                                       id="emptyUrl" name="emptyUrl">
                                <input value="{{route('front.search.products')}}" type="hidden"
                                       id="searchUrl" name="searchUrl">
                            </form>
            </div>
        </div>
    </div>
</div>
