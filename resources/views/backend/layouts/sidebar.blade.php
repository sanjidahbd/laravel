<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">
                            <img src="{{url('')}}/assets/images/users/1.jpg" alt="users" class="rounded-circle img-fluid" />
                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <h5 class="m-b-10 user-name font-medium">Customer Name</h5>
                            <a href="javascript:void(0)" title="Logout" class="btn btn-circle btn-sm">
                                <i class="ti-power-off"></i>
                            </a>
                        </div>
                    </div>
                </li>

                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Restaurant</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ route('customer.menu') }}" aria-expanded="false">
                        <i class="mdi mdi-silverware-variant"></i>
                        <span class="hide-menu">View Menu</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('customer.orders') }}" class="sidebar-link">
    <i class="mdi mdi-history"></i><span class="hide-menu"> My Orders </span>
</a>
                </li>

            </ul>
        </nav>
        </div>
</aside>