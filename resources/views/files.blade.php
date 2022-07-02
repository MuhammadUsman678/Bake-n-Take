@extends('shop.layout.shop')
@section('title','Create product')
@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css"> --}}
@include('partials._form_validation-css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/plugins/file-uploaders/dropzone.css')}}">
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
                        <h2 class="content-header-title float-left mb-0"> Product</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item "> Product
                                </li>
                                <li class="breadcrumb-item active">Create
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
                                    @if(count($errors) > 0)
                                    <div class="alert alert-danger" role="alert">
                                      <ul>
                                        @foreach($errors->all() as $error)
                                        <li> {{ $error }} </li>
                                        @endforeach
                                      </ul>
                                  </div>
                                    @endif
                                    <div class="pull-right">
                                        <a href="{{ url('/admin/category') }}" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                     <!-- remove all thumbnails file upload starts -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Add Product Other Images</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <p class="card-text">Accepted Files are <small class="text-warning">.jpeg,.jpg,.png,.gif</small>.</p>
                                                        <form action="#" id="file-dropzone" class="dropzone dropzone-area" id="dpz-remove-all-thumb">
                                                            <div class="dz-message">Drop Files Here To Upload</div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
@endsection
@section('js')
<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    @include('partials._form_validation-js')
    <!-- END: Page JS-->
    <script src="{{asset('app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/extensions/dropzone.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script> --}}

<script>
    var maxFiles = 4-{{ $maxFiles }}
    var dropzone_files = [];
  Dropzone.options.fileDropzone = {
    url: '{{ route('file.store') }}',
    // maxFiles:maxFiles,
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    addRemoveLinks: true,
    headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    init: function() {
        thisDropzone = this;
        $.ajax({
        type: 'GET',
        url: '{{ route("file.exists") }}',
        data: { "_token": "{{ csrf_token() }}"},
        dataType: 'json',
        success: function (data){
            console.log("data",data);
            $.each(data, function(key,value){
                dropzone_files.push({'new_name': value.name, 'old_name': value.name});
                 var mockFile = { name: value.name, size: value.size };
                 thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                 thisDropzone.options.thumbnail.call(thisDropzone, mockFile,value.url);
                  
             });
        },
        error: function(e) {
            console.log(e);
        }});
    },
    removedfile: function(file)
    {
        for(var i=0; i< dropzone_files.length; i++) {
            if (file.name == dropzone_files[i]['old_name']) {
            var file_name = dropzone_files[i]['new_name'];
            break;
            }
         }
      console.log(file_name)
      $.ajax({
        type: 'POST',
        url: '{{ route("file.remove") }}',
        data: { "_token": "{{ csrf_token() }}", file_name: file_name},
        success: function (data){
            // console.log("File has been successfully removed!!");
        },
        error: function(e) {
            console.log(e);
        }});
        var fileRef;
        return (fileRef = file.previewElement) != null ?
        fileRef.parentNode.removeChild(file.previewElement) : void 0;

        if(dropzone_files.length != 0){
            $(".dz-message").addClass('d-none');
        }
    },
    success: function (file, response) {
      dropzone_files.push({'new_name': response, 'old_name': file.name});
    },
  }
</script>
@endsection
