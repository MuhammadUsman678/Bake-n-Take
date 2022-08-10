 @extends('admin.layout.admin')
 @section('title','Notifications')
@section('main')
    <div class="">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Notifications</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Notifications
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
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>Notifications</h4>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <a href="{{ route('mark_all_read', Auth::user()->id) }}" class="">Mark as
                                                    all read</a>
                                            </div>

                                        </div>

                                        <div class="card m-b-30">
                                            @forelse ($notifications as $notification)
                                                <div class="row no-gutters mt-1">
                                                    <div
                                                        class="col-md-12 rounded border border-light {{ $notification->is_read === 0 ? 'bg-light' : '' }}">
                                                        <div class="card-body">
                                                           

                                                                <h5 class="card-title font-18">
                                                                    {{ $notification->data}}
                                                                </h5>

                                                          

                                                            <p class="card-text"><small class="text-muted text-dark">
                                                                    {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</small>
                                                                <a href="{{ route('mark_as_read', Auth::user()->id) }}"
                                                                    class="stit-mark-as-read">Mark as read</a>
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>

                                            @empty

                                                <div class="card-body">
                                                    <h5 class="card-title font-18 text-center">No new notifications yet</h5>
                                                </div>

                                            @endforelse

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
    <!-- BEGIN:content -->

    <!-- END:content -->
@endsection
