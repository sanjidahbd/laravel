<style>
    /* মেনু আইটেম এবং বাটনের স্টাইল */
    .main-menu ul li a {
        font-weight: 500;
        transition: all 0.3s ease;
        text-transform: uppercase;
        font-size: 14px;
    }

    .main-menu ul li a:hover {
        color: #e52727 !important;
    }

    /* রেজিস্টার বাটন */
    .reg-btn {
        background: #e52727; 
        color: #fff !important;
        padding: 8px 20px !important;
        border-radius: 30px; 
        margin-left: 10px;
        display: inline-block;
        box-shadow: 0 4px 10px rgba(229, 39, 39, 0.3);
    }

    .reg-btn:hover {
        background: #000 !important;
        transform: translateY(-2px);
    }
</style>

<header class="header-section">
    <div class="black-bg"></div>
    <div class="red-bg"></div>
    <div class="container-fluid">
        <div class="main-header-wrapper">
            <div class="logo-image">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/fronted/img/logo/logo.svg') }}" alt="logo">
                </a>
            </div>

            <div class="main-header-items">
                <div class="header-top-wrapper">
                    <span><i class="fa-regular fa-clock"></i> 09:00 am - 10:00 pm</span>
                    <div class="social-icon d-flex align-items-center">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div id="header-sticky" class="header-1">
                    <div class="mega-menu-wrapper">
                        <div class="header-main">
                            <div class="header-left">
                                <div class="mean__menu-wrapper">
                                    <div class="main-menu">
                                        <nav id="mobile-menu">
                                            <ul>
                                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                                <li><a href="{{ url('/about') }}">About Us</a></li>
                                                <li><a href="{{ route('customer.menu') }}">Food Menu</a></li>
                                                <li><a href="{{ url('/contact') }}">Contact</a></li>
                                                
                                                @guest
                                                    <li><a href="{{ route('login') }}"><i class="fa-regular fa-user"></i> Login</a></li>
                                                    <li><a href="{{ route('register') }}" class="reg-btn">Register</a></li>
                                                @else
                                                    <li><a href="{{ route('dashboard') }}">My Account</a></li>
                                                @endguest
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>

                            <div class="header-right d-flex justify-content-end align-items-center">
                                <div class="header__cart mr-3">
                                    <a href="#"> <i class="fa-sharp fa-regular fa-cart-shopping"></i> </a>
                                </div>

                                <a class="theme-btn" href="{{ route('customer.menu') }}">ORDER NOW <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                
                                <div class="header__hamburger d-xl-none my-auto ml-3">
                                    <div class="sidebar__toggle">
                                        <i class="fas fa-bars"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>