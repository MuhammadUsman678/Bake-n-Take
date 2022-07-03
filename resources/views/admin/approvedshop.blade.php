@extends('admin.layout.admin')
@section('title', 'Approved Shops')
@section('css')
<style>
    html body .content {
       margin-left: 130px !important;
    }
    </style>
@include('partials._datatable-css')
@endsection


@section('main')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Approved Shops</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Approved Shops
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
                                   
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">

                                    <div class="table-responsive">
                                        <table class="table table-striped data-table" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Shop Name</th>
                                                    <th>Owner Name</th>
                                                    <th>Contact No</th>
                                                    <th>Shop Documents</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            @php
                                            $no=1;
                                                @endphp
                                          
                                            <tbody>
                                        @foreach($approved as $pending)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$pending->shop_name}}</td>
                                                    @php
                                                    $user=App\User::where('id',$pending->user_id)->first();
                                                    @endphp
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$pending->phone}}</td>
                                                    <td>
                                                        <a href="{{asset('shopdocument')}}/{{$pending->document}}" download="{{$pending->document}}">
                                                            Document({{$pending->shop_name}}) <i class="icon-download-alt"></i></a>
                                                    </td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$pending->address}}</td>
                                                    <td >
                                                        <span class="statusCheckActive" statusId="{{$user->id}}"><i class="feather icon-check"></i></span>
                                                        <span class=" userDeleteBtn" userId="{{$user->id}}"><i class="feather icon-trash"></i></span>
                                                    </td>
                                                </tr>
                                             @endforeach      
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
    





<script>
   $(document).ready(function () {
       $('#datatable').DataTable();
     
   })
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.userDeleteBtn').click(function(e){
            e.preventDefault();
           var user_id= $(this).attr('userId');
// alert(user_id);
            swal({
                title: "Are you sure?",
                text: "You want to delete this Shop!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
            .then((willDelete) => {
                if (willDelete) {
                      $.ajax({
                        url:'{{URL::to('admin/delete_shop')}}',
                        type:'get',
                        data:{
                            'user_id':user_id
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
        $('.statusCheckActive').click(function(e){
            e.preventDefault();
           var statusId= $(this).attr('statusId');
// alert(user_id);
            swal({
                title: "Are you sure?",
                text: "You want to Rejected this Shop!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
            .then((willDelete) => {
                if (willDelete) {
                      $.ajax({
                        url:'{{URL::to('admin/shop_status_active')}}',
                        type:'get',
                        data:{
                            'statusId':statusId
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
    </script>
        @endsection