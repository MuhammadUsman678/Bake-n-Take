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
                        <h2 class="content-header-title float-left mb-0">Manage Complains</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Manage Complains
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
                                                    <th>user Name</th>
                                                    <th>Image</th>
                                                    <th>Complain</th>
                                                   
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            @php
                                            $no=1;
                                                @endphp
                                          
                                            <tbody>
                                        @foreach($report as $reports)
                                                <tr>
                                                    @php
                                                    $user=App\User::where('id',$reports->user_id)->first();
                                                    @endphp
                                                    <td>{{$no++}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td><img src="{{url('profileimages/'.$user->image)}}" style="width:100px;height:100px;"></td>
                                                    <td>{{$reports->description}}</td>
                                                    <td >
                                                        
                                                        <span class=" userDeleteBtn" userId="{{$reports->user_id}}"><button type="button" class="btn btn-danger">Ban</button></span>
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
                        url:'{{URL::to('admin/report_buyer')}}',
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
    
    </script>
        @endsection