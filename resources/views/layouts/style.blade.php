
    <!-- favicon  -->
    <link rel="shortcut icon" href="{{ asset('front/assets/logo.png')}}" type="image/x-icon" />
    <!-- font awesome css -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/font-awesome.min.css')}}" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/bootstrap.min.css')}}" />
    <!-- swiper css -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/swiper.min.css')}}" />
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/datepicker.css')}}" />
    <!-- mapbox css -->
    <link href="{{ asset('front/assets/css/plugins/mapbox-style.css')}}" rel="stylesheet" />
    <!-- fancybox css -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/fancybox.min.css')}}" />
    <!-- starbelly css -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css')}}" />
 
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .sb-cart-quantity{
            z-index:5;
        }
        .filled-input-label{
            top: -25px !important;
            left: 0px !important;
        }
        .custom-select{
            height: 50px;
            position: relative;
            padding: 0 20px;
            font-size: 14px;
            background-color: #f9fafc;
            display: block;
            width: 100%;
            border: none;
            border-bottom: solid 1px #f2f3f5;
        }

        /* Search Popup */

        .search-modal .close, .inner-page .search-modal .close {
            color: #ffffff;
            margin-top: 20px;
            font-size: 14px;
            background-color: rgba(255, 255, 255, 0.4);
            height: 40px;
            width: 40px;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            opacity: 1;
            outline: none;
            transition: all 0.3s ease 0s;
        }

       
        .modal-backdrop {
            opacity: 0.95;
        }

    </style>
    <style >
             
            .search-modal .modal-content {
                background: transparent;
                position: initial;
                border: 0;
            }
            .search-modal .search-block input {
                    height: 60px;
                    line-height: 60px;
                    padding: 0 15px;
                    background: transparent;
                    border-width: 0 0 1px 0;
                    border-radius: 0;
                    border-color: rgba(255,255,255,0.4);
                    box-shadow: none;
                    color: #ffffff;
                    font-weight: 600;
                    font-size: 18px;
            }
            .search-modal .search-block input::placeholder{
                color: white;
            }
            .search-modal .close {
                color: #ffffff;
                margin-top: 20px;
                font-size: 14px;
                background-color: rgba(255,255,255,0.4);
                height: 40px;
                width: 40px;
                text-align: center;
                line-height: 40px;
                border-radius: 50%;
                opacity: 1;
                outline: none;
                transition: all 0.3s ease 0s;
            }
            .search-modal .close:hover{
                background-color: #ff3115;
            }
            .pagination{
                margin-top: 30px !important;
                display: flex !important;
                color: #6f6f87 !important;
                align-items: center !important;
            }
            .pagination li {
               margin-right: 10px;
             }
             .pagination li.sb-active a {
                background-color: #f5c332;
            }
            .pagination li a {
                position: relative;
                background-color: #f9fafc;
                text-align: center;
                display: block;
                height: 55px;
                width: 55px;
                padding-top: 15px;
                color: #231e41;
            }
            .pagination li span {
                position: relative;
                background-color: #f9fafc;
                text-align: center;
                display: block;
                height: 55px;
                width: 55px;
                padding-top: 15px;
                color: #231e41;
            }
            .pagination li a:after {
                position: absolute;
                bottom: 0;
                left: 0;
                content: "";
                height: 2px;
                width: 0;
                background-color: #f5c332;
                transition: 0.3s ease-in-out;
            }
            .page-item.active .page-link {
                z-index: 1;
                color: #fff;
                background-color: #f5c332;
                border-color: #f5c332;
            }
            .page-link {
                position: relative;
                display: block;
                padding: 0.5rem 0.75rem;
                margin-left: -1px;
                line-height: 1.25;
                color: #f5c332;
                background-color: #fff;
                border: 1px solid #dee2e6;
            }
    </style>