
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
    </style>