@extends('frontend.layouts.master')
@section('head')
    <head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="gramentheme">
    <meta name="description" content="Fresheat food & Restaurant Html Template">
    <!-- ======== Page title ============ -->
    <title>Fresheat food & Restaurant Html Template</title>
    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="{{url('')}}/assets/frontend/img/favicon.png">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/frontend/css/bootstrap.min.css">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/frontend/css/all.min.css">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/frontend/css/animate.css">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/frontend/css/magnific-popup.css">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/frontend/css/meanmenu.css">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/frontend/css/swiper-bundle.min.css">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/frontend/css/nice-select.css">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/frontend/css/main.css">
</head>  
@endsection
@section('content')
<section class="breadcrumb-wrapper py-5 bg-color2" style="background-image: url('https://img.freepik.com/free-photo/restaurant-interior_1127-3394.jpg'); background-size: cover; background-position: center;">
    <div class="container py-5 text-center">
        <h1 class="text-white display-4 fw-bold">About Our FreshEat</h1>
        <p class="text-white">Home / About Us</p>
    </div>
</section>

<section class="about-section py-5 bg-color2">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-image position-relative">
                    <img src="https://img.freepik.com/free-photo/chef-working-kitchen-restaurant_23-2148835127.jpg" alt="Chef" class="img-fluid rounded-4 shadow-lg">
                    <div class="experience-badge bg-theme-color1 p-3 text-white rounded shadow-sm position-absolute bottom-0 end-0 m-4 text-center">
                        <h2 class="fw-bold mb-0 text-white">10+</h2>
                        <small>Years of Experience</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ps-lg-5 mt-4 mt-lg-0">
                <h6 class="text-danger text-uppercase fw-bold">Who We Are</h6>
                <h2 class="display-5 fw-bold mb-4">We Serving Delicious Food Since 2014</h2>
                <p class="text-muted">FreshEat is more than just a restaurant; it's a place where passion for cooking meets premium ingredients. Our mission is to provide an unforgettable dining experience through authentic flavors and warm hospitality.</p>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2"><i class="fa-solid fa-circle-check text-danger me-2"></i> Fresh and organic ingredients</li>
                    <li class="mb-2"><i class="fa-solid fa-circle-check text-danger me-2"></i> Expert chefs from around the world</li>
                    <li class="mb-2"><i class="fa-solid fa-circle-check text-danger me-2"></i> Hygienic and pleasant environment</li>
                </ul>
                <a href="{{ route('customer.menu') }}" class="theme-btn">EXPLORE MENU <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    
 <!--<< All JS Plugins >>-->
    <script src="{{url('')}}/assets/frontend/js/jquery-3.7.1.min.js"></script>
    <!--<< Bootstrap Js >>-->
    <script src="{{url('')}}/assets/frontend/js/bootstrap.bundle.min.js"></script>
    <!--<< Waypoints Js >>-->
    <script src="{{url('')}}/assets/frontend/js/jquery.waypoints.js"></script>
    <!--<< Counterup Js >>-->
    <script src="{{url('')}}/assets/frontend/js/jquery.counterup.min.js"></script>
    <!--<< Viewport Js >>-->
    <script src="{{url('')}}/assets/frontend/js/viewport.jquery.js"></script>
    <!--<< Magnific popup Js >>-->
    <script src="{{url('')}}/assets/frontend/js/magnific-popup.min.js"></script>
    <!--<< Tilt Js >>-->
    <script src="{{url('')}}/assets/frontend/js/tilt.min.js"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="{{url('')}}/assets/frontend/js/swiper-bundle.min.js"></script>
    <!--<< MeanMenu Js >>-->
    <script src="{{url('')}}/assets/frontend/js/jquery.meanmenu.min.js"></script>
    <!--<< Wow Animation Js >>-->
    <script src="{{url('')}}/assets/frontend/js/wow.min.js"></script>
    <!--<< Nice Select Js >>-->
    <script src="{{url('')}}/assets/frontend/js/nice-select.min.js"></script>
    <!--<< Main.js >>-->
    <script src="{{url('')}}/assets/frontend/js/main.js"></script>
@endsection