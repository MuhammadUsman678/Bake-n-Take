@extends('shop.layout.shop')
@section('title','Create product')
@section('css')


@endsection
@section('main')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0"> Rfq</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('shop.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item "> 
                                    <a href="{{ route('shop.product.index') }}">Rfq</a>
                                </li>
                                <li class="breadcrumb-item active">View Rfq
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- Column selectors with Export Options and print table -->
            <section id="column-selectors">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-md-12">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="col-md-4 col-lg-6 col-sm-6 col-xs-6">
                                        <h4 class="card-title">{{ "Products" }}</h4>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">

                                    <div class="table-responsive">
                                        <table class="table table-striped data-table" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>User Name</th>
                                                    
                                                    <th>Product Name</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Description</th>
                                                    <th>image</th>
                                                    <th>Dilevery Date</th>
                                                    
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                  $no=1  
                                                @endphp
                                                @foreach($detail as $cate)
                                                @php
                                                $user=App\User::where('id',$cate->quotation->user_id)->first();
                                                $category=App\Category::where('id',$cate->quotation->category)->first();
                                                @endphp
                                                <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$user->name}}</td>
                                               
                                                <td>{{$cate->quotation->name}}</td>
                                                @if(!empty($category))
                                                <td>{{$category->category_name}}</td>
                                                
                                                    
                                                @else
                                                   <td></td> 
                                                @endif
                                                <td>{{$cate->quotation->price}}</td>
                                                <td>{{$cate->quotation->description}}</td>
                                                <td>  <a href="{{asset('shopdocument')}}/{{$cate->quotation->image}}" download="{{$cate->quotation->images}}">
                                                    Document({{$cate->quotation->image}}) <i class="icon-download-alt"></i></a></td>
                                                <td>{{$cate->quotation->date}}</td>
                                                
                                                <td width="20px"><a href="{{url('shop/chat/'.$user->id)}}"><i class="feather icon-message-square"></i><a>
                                                    @if($cate->status==0)
                                                    <span class=" useraccept" userId="{{$cate->shop_id}}" shop="{{$cate->quotation_id}}"><button type="button" class="btn btn-success">Accept</button></span>
                                                    <span class=" userreject" shopId="{{$cate->shop_id}}" quotationid="{{$cate->quotation_id}}"><button type="button" class="btn btn-danger">Reject</button></span>
                                                    @elseif($cate->status==1)
                                                   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Inprogress</button></span>
                                                    @else
                                                    <button type="button" class="btn btn-success" >Completed</button>
                                                    @endif
                                                </td>
                                                </tr>
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLongTitle">Order Detail</h5>


                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                        <form action="{{url('complete_quotation')}}" method="post">
                                                        <div class="modal-body">
                                                        <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                        <label>Select Product</label>
                                                        <select class="form-control" name="product">
                                                            <option selected disabled>Select Product</option>
                                                            @foreach($product as $products)
                                                            <option value="{{$products->id}}">{{$products->product_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label></label>
                                                      <a href="{{url('shop/product/create')}}"> <button type="button" class="btn btn-primary ">+</button></a>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>price</label>
                                                    <input type="number" value="{{$cate->quotation->price}}" class="form-control" name="price">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>User Name</label>
                                                        <input type="hidden" value="{{$cate->shop_id}}" class="form-control" name="user_id">
                                                        <input type="hidden" value="{{$cate->quotation_id}}" class="form-control" name="quotationid">
                                                        <input type="hidden" value="{{$user->id}}" class="form-control" name="userid">
                                                    <input type="text" value="{{$user->name}}" class="form-control" name="username">
                                                    </div>
                                                    </div>
                                                        </div>
                                                      </div>
                                        </form>
                                                        <div class="modal-footer">
                                                       
                                                          <button type="submit" class="btn btn-primary">Complete Quotation</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>


                                                  
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>User Name</th>
                                                   
                                                    <th>Product Name</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Description</th>
                                                    <th>image</th>
                                                    <th>Dilevery Date</th>
                                                    
                                                    <th width="20px">Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Column selectors with Export Options and print table -->



        </div>
    </div>
</div>
<!-- END: Content-->

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('app-assets/js/scripts/ui/data-list-view.js')}}"></script>

 <script>
    $(document).ready(function () {
        $('#datatable').DataTable();
      
    })
</script>
<script>
$('.userreject').click(function(e){
            e.preventDefault();
           var user_id= $(this).attr('shopId');
           var quotationid= $(this).attr('quotationid');

            swal({
                title: "Are you sure?",
                text: "You want to reject this quotation!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
            .then((willDelete) => {
                if (willDelete) {
                      $.ajax({
                        url:'{{URL::to('shop/reject_quotation')}}',
                        type:'get',
                        data:{
                            'shopid':user_id,
                            'quotationid':quotationid
                        },
                        success:function(result)
                        {
                        swal(result.success, {
                         icon: "success",
                         })
                         .then((result) => {
                           location.reload();
                        });
                        // window.reload();
                         }
                    });
                        // admin/deleteuser
                }
            });
        });

        $('.useraccept').click(function(e){
            e.preventDefault();
           var user_id= $(this).attr('userId');
           var quotationid= $(this).attr('shop');

            swal({
                title: "Are you sure?",
                text: "You want to Accept this quotation!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
            .then((willDelete) => {
                if (willDelete) {
                      $.ajax({
                        url:'{{URL::to('shop/accept_quotation')}}',
                        type:'get',
                        data:{
                            'shopid':user_id,
                            'quotationid':quotationid
                        },
                        success:function(result)
                        {
                        swal(result.success, {
                         icon: "success",
                         })
                         .then((result) => {
                           location.reload();
                        });
                        // window.reload();
                         }
                    });
                        // admin/deleteuser
                }
            });
        });
        // $('.userprogress').click(function(e){
        //     e.preventDefault();
        //    var user_id= $(this).attr('userId');
        //    var quotationid= $(this).attr('shop');

        //     swal({
        //         title: "Are you sure?",
        //         text: "Yor task is completed!",
        //         icon: "warning",
        //         buttons: true,
        //         dangerMode: true,
        //         })
        //     .then((willDelete) => {
        //         if (willDelete) {
        //               $.ajax({
        //                 url:'{{URL::to('shop/complete_quotation')}}',
        //                 type:'get',
        //                 data:{
        //                     'shopid':user_id,
        //                     'quotationid':quotationid
        //                 },
        //                 success:function(result)
        //                 {
        //                 swal(result.success, {
        //                  icon: "success",
        //                  })
        //                  .then((result) => {
        //                    location.reload();
        //                 });
        //                 // window.reload();
        //                  }
        //             });
        //                 // admin/deleteuser
        //         }
        //     });
        // });
</script>
   
@endsection
