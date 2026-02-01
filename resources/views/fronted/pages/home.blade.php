@extends("fronted.layouts.master")
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
    <link rel="shortcut icon" href="{{url('')}}/assets/fronted/img/favicon.png">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/fronted/css/bootstrap.min.css">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/fronted/css/all.min.css">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/fronted/css/animate.css">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/fronted/css/magnific-popup.css">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/fronted/css/meanmenu.css">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/fronted/css/swiper-bundle.min.css">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/fronted/css/nice-select.css">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{url('')}}/assets/fronted/css/main.css">
</head>  
@endsection

@section('content')

    <section class="banner-section fix" style="position: relative; height: 90vh; min-height: 600px; background: url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?w=1920&q=80') no-repeat center center/cover;">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6);"></div>
        <div class="container" style="position: relative; z-index: 5; height: 100%; display: flex; align-items: center;">
            <div class="banner-content text-white">
                <h6 class="text-warning fw-bold mb-3 animated slideInDown" style="letter-spacing: 2px;">WELCOME TO FRESHEAT</h6>
                <h1 class="display-2 fw-bold mb-4 animated fadeInUp" style="line-height: 1.1;">Delicious Food <br> For Your <span class="text-warning">Healthy Life</span></h1>
                <p class="lead mb-5 animated fadeInUp" style="max-width: 600px;">Experience the authentic taste of premium ingredients and secret recipes from our world-class chefs.</p>
                <div class="banner-btns animated fadeInUp">
                    <a href="#" class="btn btn-warning btn-lg me-3 px-4 py-3 fw-bold rounded-pill">ORDER NOW</a>
                    <a href="#" class="btn btn-outline-light btn-lg px-4 py-3 fw-bold rounded-pill">VIEW MENU</a>
                </div>
            </div>
        </div>
    </section>

    <section class="stats-section py-5 bg-white">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-3">
                    <div class="p-4 shadow-sm rounded-4 border-top border-warning border-4">
                        <h2 class="fw-bold">25k+</h2>
                        <p class="text-muted mb-0">Happy Customers</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-4 shadow-sm rounded-4 border-top border-warning border-4">
                        <h2 class="fw-bold">150+</h2>
                        <p class="text-muted mb-0">Expert Chefs</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-4 shadow-sm rounded-4 border-top border-warning border-4">
                        <h2 class="fw-bold">120+</h2>
                        <p class="text-muted mb-0">Food Varieties</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-4 shadow-sm rounded-4 border-top border-warning border-4">
                        <h2 class="fw-bold">10k+</h2>
                        <p class="text-muted mb-0">Quick Delivery</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="best-food-items-section fix section-padding bg-light">
        <div class="container">
            <div class="title-area text-center mb-5">
                <h2 class="title fw-bold">Our Popular Food Items</h2>
                <div class="mx-auto" style="width: 80px; height: 3px; background: #ffc107; margin-top: 10px;"></div>
            </div>
            <div class="row g-4">
                @php
                    $items = [
                        ['name' => 'Chicken Pizza', 'price' => '$26.99', 'img' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=400'],
                        ['name' => 'Cheese Burger', 'price' => '$15.00', 'img' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=400'],
                        ['name' => 'French Fries', 'price' => '$10.00', 'img' => 'https://images.unsplash.com/photo-1518013034458-30b0ee56d8d6?w=400'],
                        ['name' => 'Bucket Chicken', 'price' => '$35.00', 'img' => 'https://images.unsplash.com/photo-1562967914-608f82629710?w=400'],
                        ['name' => 'Strawberry Cake', 'price' => '$12.99', 'img' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=400'],
                        ['name' => 'Thai Noodles', 'price' => '$18.50', 'img' => 'https://images.unsplash.com/photo-1585032226651-759b368d7246?w=400'],
                        ['name' => 'Chocolate Shake', 'price' => '$08.00', 'img' => 'https://images.unsplash.com/photo-1572490122747-3968b75cc699?w=400'],
                        ['name' => 'Grilled Fish', 'price' => '$22.00', 'img' => 'https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?w=400']
                    ];
                @endphp

                @foreach($items as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="single-food-items text-center p-4 shadow-sm bg-white" style="border-radius: 20px; transition: 0.3s;">
                        <div class="item-thumb mb-3" style="width: 170px; height: 170px; margin: 0 auto; overflow: hidden; border: 5px solid #f8f9fa; border-radius: 50%;">
                            <img src="{{ $item['img'] }}" style="width: 100%; height: 100%; object-fit: cover;" alt="{{ $item['name'] }}">
                        </div>
                        <h4 class="fw-bold mt-2">{{ $item['name'] }}</h4>
                        <p class="text-muted small">Fresh & Tasty Ingredients</p>
                        <h5 class="text-danger fw-bold">{{ $item['price'] }}</h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="promo-banner py-5" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=1920'); background-size: cover; background-attachment: fixed;">
        <div class="container text-center text-white py-4">
            <h2 class="display-4 fw-bold">Get 30% Discount On First Order</h2>
            <p class="lead">Use Coupon Code: <span class="text-warning fw-bold">FRESH30</span></p>
            <a href="#" class="btn btn-warning btn-lg mt-3 px-5 rounded-pill fw-bold">ORDER NOW</a>
        </div>
    </section>

    <section class="about-section py-5 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600" class="img-fluid rounded-4 shadow-lg" alt="About Us">
                </div>
                <div class="col-lg-6 ps-lg-5 mt-4 mt-lg-0">
                    <h6 class="text-danger fw-bold">OUR STORY</h6>
                    <h2 class="fw-bold">Traditional & Modern Food Since 1995</h2>
                    <p class="mt-3 text-muted">Amader restaurant-e protyekti dish toiri kora hoy ekdom fresh material diye. Amra taste ebong hygiene-er dik theke kono compromise kori na.</p>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> 100% Organic & Fresh Food</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Super Fast Home Delivery</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Professional Master Chefs</li>
                    </ul>
                    <a href="#" class="btn btn-danger mt-3 px-4 py-2 rounded-pill">LEARN MORE</a>
                </div>
            </div>
        </div>
    </section>

    <section class="chef-section py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-5">Meet Our Expert Chefs</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?w=400&h=500&fit=crop" class="card-img-top" style="height: 380px; object-fit: cover;" alt="Chef">
                        <div class="card-body">
                            <h4 class="fw-bold">Chef John Doe</h4>
                            <p class="text-muted">Master of Italian Cuisine</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1577219491135-ce391730fb2c?w=400&h=500&fit=crop" class="card-img-top" style="height: 380px; object-fit: cover;" alt="Chef">
                        <div class="card-body">
                            <h4 class="fw-bold">Chef Alex Marina</h4>
                            <p class="text-muted">Fast Food Specialist</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1600565193348-f74bd3c7ccdf?w=400&h=500&fit=crop" class="card-img-top" style="height: 380px; object-fit: cover;" alt="Chef">
                        <div class="card-body">
                            <h4 class="fw-bold">Chef Sarah Ali</h4>
                            <p class="text-muted">Pastry Expert</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-section py-5 bg-white">
        <div class="container text-center">
            <h2 class="fw-bold mb-5">What Our Customers Say</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="review-box p-5 shadow rounded-5 border-bottom border-warning border-5">
                        <div class="text-warning mb-3">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="lead fst-italic">"Fresheat-er khabarer shad tulonahin! Bishesh kore tader Spicy Chicken amar shobcheye priyo. Service o khub druto."</p>
                        <div class="mt-4">
                            <img src="https://i.pravatar.cc/100?u=1" class="rounded-circle mb-2" style="width: 70px; height: 70px; object-fit: cover;" alt="User">
                            <h5 class="fw-bold mb-0">Rahat Ahmed</h5>
                            <small class="text-muted">Satisfied Customer</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    
 <!--<< All JS Plugins >>-->
    <script src="{{url('')}}/assets/fronted/js/jquery-3.7.1.min.js"></script>
    <!--<< Bootstrap Js >>-->
    <script src="{{url('')}}/assets/fronted/js/bootstrap.bundle.min.js"></script>
    <!--<< Waypoints Js >>-->
    <script src="{{url('')}}/assets/fronted/js/jquery.waypoints.js"></script>
    <!--<< Counterup Js >>-->
    <script src="{{url('')}}/assets/fronted/js/jquery.counterup.min.js"></script>
    <!--<< Viewport Js >>-->
    <script src="{{url('')}}/assets/fronted/js/viewport.jquery.js"></script>
    <!--<< Magnific popup Js >>-->
    <script src="{{url('')}}/assets/fronted/js/magnific-popup.min.js"></script>
    <!--<< Tilt Js >>-->
    <script src="{{url('')}}/assets/fronted/js/tilt.min.js"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="{{url('')}}/assets/fronted/js/swiper-bundle.min.js"></script>
    <!--<< MeanMenu Js >>-->
    <script src="{{url('')}}/assets/fronted/js/jquery.meanmenu.min.js"></script>
    <!--<< Wow Animation Js >>-->
    <script src="{{url('')}}/assets/fronted/js/wow.min.js"></script>
    <!--<< Nice Select Js >>-->
    <script src="{{url('')}}/assets/fronted/js/nice-select.min.js"></script>
    <!--<< Main.js >>-->
    <script src="{{url('')}}/assets/fronted/js/main.js"></script>
@endsection