<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"> <img src="{{asset('assets/dashboard/img/dash_image.png')}}" alt=""></a>
        </div>
    </div>
    <div class="header-text">
        <a href="index.html"><i class="bi bi-house-door"></i>Dashboard</a>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="management">Management</li>
                    <li>
                        <a href="{{ route('service-list') }}" data-bs-toggle="collapse show" data-bs-target="#Service"
                           aria-controls="Service"
                           aria-expanded="true"><i class="bi bi-graph-up"></i><span>Service </span>
                        </a>

                        <ul class="collapse  {{ (Request::segment(2)=='services')?"show":"" }}" id="Service">
                            <li><a href="service1.html"> Service 1</a></li>
                            <li><a href="service2.html"> Service 2</a></li>
                        </ul>
                    </li>
                    <li id="user">
                        <a href="{{ route('users-list') }}" aria-expanded="true"><i
                                class="bi bi-people"></i><span>Users</span></a>
                    </li>
                    <li>
                        <a href="{{ route('order-list') }}" data-bs-toggle="collapse show" data-bs-target="#Orders"
                           aria-controls="Orders" aria-expanded="true"><i class="bi bi-cart"></i><span>Orders </span>
                        </a>
                        <ul class="collapse {{ (Request::segment(2)=='orders')?"show":"" }}" id="orders">
                            <li><a href="subscriber.html">Subscriber </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-bs-toggle="collapse" data-bs-target="#settings" aria-controls="settings"
                           aria-expanded="true"><i class="bi bi-file-lock"></i><span>Settings</span>
                        </a>
                        <ul class="collapse {{ (Request::segment(2)=='settings')?"show":"" }}" id="settings">
                            <li><a href="{{ route('frequency') }}">Frequencies</a></li>
                            <li><a href="{{ route('taxes-list') }}">Taxes</a></li>
                            <li><a href="{{ route('coupons-list') }}">Coupons</a></li>
                            <li><a href="{{ route('payments-list') }}">Payments Settings</a></li>
                            <li><a href="{{ route('languages-list') }}">Languages</a></li>
                            <li><a href="#">E-mail Settings</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
