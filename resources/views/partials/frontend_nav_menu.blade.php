<nav class="navbar navbar-light navbar-expand-lg">
    <div class="container-fluid">
        <div class="collapse navbar-collapse flex-grow-0 order-last order-lg-first" id="navcol-1">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="#">Menu 1</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Menu 2</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Menu 3</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Menu 4</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Menu 5</a></li>
            </ul>
        </div>
        <a class="navbar-brand me-0" href="#"><img src="{{asset('/assets/frontend/img/logo.png')}}"></a>
        <div>
            <ul class="navbar-nav flex-row align-items-center" id="navcol-2">
                @if (Auth::check())
                    <li class="nav-item"><a class="nav-link active p-2" href="{{route('user-account')}}">My Account</a>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link active p-2" href="{{route('user-login')}}">Login</a>
                    </li>
                @endif
                <li class="nav-item"><a class="nav-link p-2" href="javascript:void(null)"><img
                            src="{{asset('/assets/frontend/img/icon-1.png')}}"></a></li>
                <li class="nav-item dropdown dropdown-search"><a class="nav-link p-2" aria-expanded="false"
                                                                 data-bs-toggle="dropdown" href="#"><img
                            src="{{asset('/assets/frontend/img/icon-2.png')}}"></a>
                    <div class="dropdown-menu dropdown-menu-end position-absolute">
                        <form class="p-3"><input class="border rounded-0 form-control" type="text"
                                                 placeholder="Search ..."></form>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#"><span class="fa-stack"><i
                                class="fas fa-circle fa-solid fa-stack-2x"></i><i
                                class="fab fa-telegram-plane fa-solid fa-stack-1x fa-inverse"></i></span></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#"><span class="fa-stack"><i
                                class="fas fa-circle fa-solid fa-stack-2x"></i><i
                                class="fab fa-instagram fa-solid fa-stack-1x fa-inverse"></i></span></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#"><span class="fa-stack"><i
                                class="fas fa-circle fa-solid fa-stack-2x"></i><i
                                class="fab fa-youtube fa-solid fa-stack-1x fa-inverse"></i></span></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#"><span class="fa-stack"><i
                                class="fas fa-circle fa-solid fa-stack-2x"></i><i
                                class="fab fa-facebook-f fa-solid fa-stack-1x fa-inverse"></i></span></a></li>
            </ul>
        </div>
        <button data-bs-target="#navcol-1" data-bs-toggle="collapse" class="navbar-toggler"><span
                class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
    </div>
</nav>
