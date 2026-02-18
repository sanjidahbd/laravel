@extends("frontend.layouts.master")

@section('head')
    <title>Contact Us - Fresheat Bangladesh</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">
    @endsection

@section('content')
    <section class="breadcrumb-wrapper py-5 bg-color2" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1920'); background-size: cover;">
        <div class="container py-5 text-center">
            <h1 class="text-white display-4 fw-bold">Contact Us</h1>
            <p class="text-white">Home / Contact Us</p>
        </div>
    </section>

    <section class="contact-info-section py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="info-card p-4 text-center shadow-sm bg-white rounded-4 border-bottom border-warning border-4">
                        <div class="icon mb-3 text-danger fs-1"><i class="fas fa-map-marker-alt"></i></div>
                        <h4 class="fw-bold">Our Location</h4>
                        <p class="text-muted">House #12, Road #05, Dhanmondi,<br>Dhaka - 1205, Bangladesh</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="info-card p-4 text-center shadow-sm bg-white rounded-4 border-bottom border-warning border-4">
                        <div class="icon mb-3 text-danger fs-1"><i class="fas fa-phone-alt"></i></div>
                        <h4 class="fw-bold">Phone Number</h4>
                        <p class="text-muted">+880 1700-000000<br>+880 1800-000000</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="info-card p-4 text-center shadow-sm bg-white rounded-4 border-bottom border-warning border-4">
                        <div class="icon mb-3 text-danger fs-1"><i class="fas fa-envelope"></i></div>
                        <h4 class="fw-bold">Email Address</h4>
                        <p class="text-muted">info@fresheatbd.com<br>support@fresheat.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="map-section">
        <div class="container-fluid p-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14608.272951868!2d90.3654215!3d23.7458991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b33cffc3fb%3A0x4a968f0f0474bbf5!2sDhanmondi%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1700000000000" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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