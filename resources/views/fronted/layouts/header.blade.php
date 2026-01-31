
<style>
    /* মেনু আইটেম এবং বাটনের স্টাইল */
    .main-menu ul li a {
        font-weight: 500;
        transition: all 0.3s ease;
    }

    /* লগইন বাটনে হোভার ইফেক্ট */
    .main-menu ul li a:hover {
        color: #e52727 !important;
    }

    /* রেজিস্টার বাটনটিকে আলাদা এবং সুন্দর করার জন্য */
    .reg-btn {
        background: #e52727; /* থিমের সাথে মিল রেখে লাল রঙ */
        color: #fff !important;
        padding: 8px 20px !important;
        border-radius: 30px; /* রাউন্ড শেপ */
        margin-left: 15px;
        display: inline-block;
        box-shadow: 0 4px 10px rgba(229, 39, 39, 0.3);
    }

    .reg-btn:hover {
        background: #000 !important; /* হোভার করলে কালো হবে */
        color: #fff !important;
        transform: translateY(-2px); /* সামান্য উপরে উঠবে */
    }

    .reg-btn i {
        margin-right: 5px;
    }
</style>

<header class="header-section">
    <div class="black-bg"></div>
    <div class="red-bg"></div>
    <div class="container-fluid">
        <div class="main-header-wrapper">
            <div class="logo-image">
                <a href="index.html">
                    <img src="{{url('')}}/assets/fronted/img/logo/logo.svg" alt="img">
                </a>
            </div>
            <div class="main-header-items">
                <div class="header-top-wrapper">
                    <span><i class="fa-regular fa-clock"></i> 09:00 am - 06:00 pm</span>
                    <div class="social-icon d-flex align-items-center">
                        <span>Follow Us:</span>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div id="header-sticky" class="header-1">
                    <div class="mega-menu-wrapper">
                        <div class="header-main">
                            <div class="logo">
                                <a href="index.html" class="header-logo">
                                    <img src="{{url('')}}/assets/fronted/img/logo/logo.svg" alt="logo-img">
                                </a>
                            </div>
                            <div class="header-left">
                                <div class="mean__menu-wrapper">
                                    <div class="main-menu">
                                        <nav id="mobile-menu">
                                            <ul>
                                                <li class="has-dropdown active">
                                                    <a href="index.html">Home <i class="fa-regular fa-plus"></i></a>
                                                    <ul class="submenu">
                                                        <li><a href="index.html">Home 01</a></li>
                                                        <li><a href="index-2.html">Home 02</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="{{url('/about')}}">About Us</a></li>
                                                <li><a href="shop.html">Shop</a></li>
                                                <li class="has-dropdown">
                                                    <a href="#">Pages <i class="fa-regular fa-plus"></i></a>
                                                    <ul class="submenu">
                                                        <li><a href="chef.html">Chef</a></li>
                                                        <li><a href="menu.html">Food Menu</a></li>
                                                        <li><a href="gallery.html">Gallery</a></li>
                                                        <li><a href="reservation.html">Reservation</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="contact.html">Contact</a></li>

                                                <li>
                                                    <a href="/login"><i class="fa-regular fa-user"></i> Login</a>
                                                </li>
                                                <li>
                                                    <a href="/register" class="reg-btn"><i class="fa-regular fa-id-card"></i> Register</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="header-right d-flex justify-content-end align-items-center">
                                <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>
                                <div class="header__cart">
                                    <a href="#"> <i class="fa-sharp fa-regular fa-cart-shopping"></i> </a>
                                    <div class="header__right__dropdown__wrapper">
                                        <div class="header__right__dropdown__inner">
                                            <div class="single__header__right__dropdown">
                                                <div class="header__right__dropdown__img">
                                                    <a href="#"><img src="{{url('')}}/assets/fronted/img/blog/blogRecentThumb3_1.png" alt="photo"></a>
                                                </div>
                                                <div class="header__right__dropdown__content">
                                                    <a href="shop.html">Fried Chicken</a>
                                                    <p>1 x <span class="price">$ 80.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="dropdown__price">Total: <span>$80.00</span></p>
                                        <div class="header__right__dropdown__button">
                                            <a href="cart.html" class="theme-btn mb-2">View Cart</a>
                                            <a href="checkout.html" class="theme-btn style3">Checkout</a>
                                        </div>
                                    </div>
                                </div>

                                <a class="theme-btn" href="menu.html">ORDER NOW <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                
                                <div class="header__hamburger d-xl-block my-auto">
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