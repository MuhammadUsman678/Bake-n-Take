@extends('shop.layout.shop')





@section('main')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
               
            </div>
         
        </div>
        <div class="content-body">
            
            <!-- Zero configuration table -->
            <section id="dashboard-analytics">
                <div class="row">
                  
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-users text-primary font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1 mb-25">0</h2>
                                <p class="mb-0">Total Orders</p>
                            </div>
                            <div class="card-content">
                                <div id="subscribe-gain-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-package text-warning font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1 mb-25">6</h2>
                                <p class="mb-0">Total Rfqs</p>
                            </div>
                            <div class="card-content">
                                <div id="orders-received-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
           \
            </section>>
            <!--/ Zero configuration table -->
         

         

       

      

           

        </div>
    </div>
</div>
        @endsection