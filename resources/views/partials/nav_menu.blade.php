<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{route('dashboard')}}"> <img src="{{asset('assets/dashboard/img/dash_image.png')}}" alt=""></a>
        </div>
    </div>
    <div class="header-text">
        <a href="{{route('dashboard')}}"><i class="bi bi-house-door"></i>Dashboard</a>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="management">Management</li>
                    {{-- <li>
                        <a href="#" data-bs-toggle="collapse show" data-bs-target="#Service"
                           aria-controls="Service"
                           aria-expanded="true"><i class="bi bi-graph-up"></i><span>Service </span>
                        </a>

                        <ul class="collapse  {{ (Request::segment(2)=='services')?"show":"" }}" id="Service">
                            <li><a href="#"> Create Service</a></li>
                        </ul>
                    </li> --}}
                    @can('time-setups-list')
                    <li id="timesetup">
                        <a href="{{ route('time-setups-list') }}" aria-expanded="true"><i
                                class="bi bi-clock"></i><span>Time Setup</span></a>
                    </li>
                    @endcan
                    {{-- <li>
                        <a href="#" data-bs-toggle="collapse show" data-bs-target="#Orders"
                           aria-controls="Orders" aria-expanded="true"><i class="bi bi-cart"></i><span>Orders </span>
                        </a>
                        <ul class="collapse {{ (Request::segment(2)=='orders')?"show":"" }}" id="orders">
                            <li><a href="#">Subscriber </a></li>
                        </ul>
                    </li> --}}
                    @if(auth()->user()->can('admin-list') || auth()->user()->can('role-list') || auth()->user()->can('user-list'))
                    <li>
                        <a href="#" data-bs-toggle="collapse" data-bs-target="#admins" aria-controls="admins"
                           aria-expanded="true"><i class="bi bi-file-lock"></i><span>Admins</span>
                        </a>
                        <ul class="collapse {{ (Request::segment(2)=='admin')?"show":"" }}" id="admins">
                            @can('admin-list')
                            <li><a href="{{ route('admins.index') }}">Admin Users</a></li>
                            @endcan
                            @can('user-list')
                            <li><a href="{{route('users-list')}}">Users</a></li>
                            @endcan
                            @can('role-list')
                            <li><a href="{{ route('roles.index') }}">Roles</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endif
                    {{-- @endcan --}}
                    {{-- <li>
                        <a href="#" data-bs-toggle="collapse" data-bs-target="#settings" aria-controls="settings"
                           aria-expanded="true"><i class="bi bi-file-lock"></i><span>Settings</span>
                        </a>
                        <ul class="collapse {{ (Request::segment(2)=='settings')?"show":"" }}" id="settings">
                            <li><a href="{{ route('frequency') }}">Frequencies</a></li>
                            <li><a href="{{ route('taxes-list') }}">Taxes</a></li>
                            <li><a href="{{ route('coupons-list') }}">Coupons</a></li>
                            <li><a href="{{ route('payments-list') }}">Payments Settings</a></li>
                            <li><a href="{{ route('languages-list') }}">Languages</a></li>
                            <li><a href="{{ route('emails-list') }}">E-mail Settings</a></li>
                        </ul>
                    </li> --}}

                </ul>
            </nav>
        </div>
    </div>
</div>
