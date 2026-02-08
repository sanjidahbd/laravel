<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                {{-- User Profile Section --}}
                <li>
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">
                            <img src="{{url('')}}/assets/images/users/1.jpg" alt="users" class="rounded-circle img-fluid" />
                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <h5 class="m-b-10 user-name font-medium">{{ Auth::user()->name }}</h5>
                            <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-settings"></i>
                            </a>
                            <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </li>

                {{-- Dashboard --}}
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ url('/admin/dashboard') }}" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                {{-- Category Menu --}}
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-view-list"></i>
                        <span class="hide-menu">Category</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('categories.index') }}" class="sidebar-link">
                                <i class="mdi mdi-format-list-bulleted"></i>
                                <span class="hide-menu"> All Categories </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('categories.create') }}" class="sidebar-link">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> Add New Category </span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Subcategory Menu --}}
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-view-quilt"></i>
                        <span class="hide-menu">Subcategory</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('subcategories.index') }}" class="sidebar-link">
                                <i class="mdi mdi-format-list-bulleted"></i>
                                <span class="hide-menu"> All Subcategories </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('subcategories.create') }}" class="sidebar-link">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> Add Subcategory </span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Manage Food Items --}}
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-food"></i>
                        <span class="hide-menu">Manage Food Items</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('fooditems.index') }}" class="sidebar-link">
                                <i class="mdi mdi-silverware-variant"></i>
                                <span class="hide-menu"> All Food Items </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('fooditems.create') }}" class="sidebar-link">
                                <i class="mdi mdi-plus-box"></i>
                                <span class="hide-menu"> Add New Food </span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Customer Orders --}}
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.orders.all') }}" aria-expanded="false">
                        <i class="mdi mdi-cart-outline"></i>
                        <span class="hide-menu">Customer Orders</span>
                    </a>
                </li>

                {{-- Manage Reviews (Notun Add kora hoyeche) --}}
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.all.reviews') }}" aria-expanded="false">
                        <i class="mdi mdi-star text-warning"></i>
                        <span class="hide-menu">Manage Reviews</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>