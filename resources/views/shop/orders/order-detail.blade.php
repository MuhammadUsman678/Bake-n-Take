@extends('shop.layout.shop')
@section('title', 'Order Detail<b>')
@section('css')

@include('partials._datatable-css')
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
                        <h2 class="content-header-title float-left mb-0">Order Detail</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Order Detail
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
                                        <h4 class="card-title">{{ "Order Detail" }}</h4>
                                    </div>
                                    <div class="col-md-8 col-lg-6 col-sm-6 col-xs-6 pull-right">

                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="row">
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
                                           <b> Delivery Date </b> :{{ date('Y-F-d H:i:A',strtotime($order->delivery_date)) }}
                                        </div>
                                        <div class="col-md-12 mt-5">
                                            @php
                                              $product_status=$order->products->first()->status;
                                              if($product_status=='new') $status='packed';
                                              else if($product_status=='packed') $status ='delivered';
                                              else if($product_status=='delivered') $status =null;

                                            @endphp
                                            Chage Order Status :
                                            @if(($product_status !='delivered'))
                                            <a onclick="return confirm('Are you sure you want to change order status ?')" href=" {{  route('shop.order.changeStatus',[$order->id,$status]) }}" class="btn btn-primary btn-sm"> {{ strtoupper($product_status) }}</a>
                                            @else
                                            <a  href="#" class="btn btn-primary btn-sm">  Delivered From Your Site </a>
                                            @endif
                                         </div>
                                         @if($order->payment_method =='jazzcash')
                                         <div class="col-md-12 mt-5">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                Add Delivery Time
                                            </button>
                                         </div>
                                         @endif
                                    </div>
                                    <div class="table-responsive">

                                        

                                        <table class="table table-striped data-table" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Product Name</th>
                                                    <th>Shop Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    @if($order->products->first()->status == 'packed')
                                                    <th>Packing Date</th>
                                                    @endif
                                                    @if($order->products->first()->take_way_time)
                                                    <th >Take Way Time</th>
                                                    @endif
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $products=$order->products->reject(function($q){
                                                             return $q->productDetails->shop_id != auth()->user()->shop->id;
                                                           })
                                                @endphp
                                                @forelse ($products as $key=>$row)
                                                <tr>
                                                    <td> {{ ++$key }} </td>
                                                    <td> {{ $row->productDetails->product_name }} </td>
                                                    <td> {{ $row->productDetails->shop->shop_name }} </td>
                                                    <td> {{ $row->quantity }} </td>
                                                    <td> {{ $row->price }} </td>
                                                    @if($order->products->first()->status == 'packed')
                                                     <td>{{ $row->status_change_date }}</td>
                                                    @endif
                                                    @if($order->products->first()->take_way_time)
                                                    <td>{{ $row->take_way_time }}</td>
                                                   @endif
                                                    <td> {{ $row->quantity * $row->price }} </td>
                                                </tr>
                                                @empty
                                                    
                                                @endforelse

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Product Name</th>
                                                    <th>Shop Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    @if($order->products->first()->status == 'packed')
                                                    <th>Packing Date</th>
                                                    @endif
                                                    @if($order->products->first()->take_way_time)
                                                     <th >Take Way Time</th>
                                                    @endif
                                                    <th>Amount</th>
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
            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Takeway Time</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('shop.add.take.time',$order->id) }}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Add Time in Minutes</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="time" aria-describedby="emailHelp" placeholder="Enter Time Example : 10">
                <small id="emailHelp" class="form-text text-muted">Please Enter Minutes Only.</small>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

        </div>
    </div>
</div>
<!-- END: Content-->

@endsection
@section('js')
    <!-- BEGIN: Page Vendor JS-->
    @include('partials._datatable-js')
    <!-- END: Page Vendor JS-->
    <!-- END: Page JS-->

    <script type="text/javascript">
        $(function () {
          var table = $('#datatable').DataTable();
    });

      </script>
@endsection
