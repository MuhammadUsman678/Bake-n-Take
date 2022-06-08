@extends('admin.layout.admin')


<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/file-uploaders/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/data-list-view.css')}}">


@section('main')
<div class="">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
               
            </div>
         
        </div>
        <div class="content-body">
            
            <!-- Zero configuration table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pending Sellers Requests</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <p class="card-text">All of the pending Requests.</p>
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
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
                                            @endphp
                                            <tbody>
                                        @foreach($pendingshop as $pending)
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
            <!--/ Zero configuration table -->
         

         

       

      

           

        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
    <script src="{{asset('app-assets/js/scripts/datatables/datatable.js')}}"></script>
</section>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('app-assets/js/scripts/ui/data-list-view.js')}}"></script>
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
                text: "You want to Approve this Shop!",
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