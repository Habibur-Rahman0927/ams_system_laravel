@extends('layouts.frontend_master')
@section('content')
    <div id="hero-img" class="mt-3">
        <h1>Register</h1>
    </div>

    <section id="login-form" class="mt-5">
        <div class="wrapper">
            <form method="POST" action="{{ route('user-register') }}">
                @csrf
                <h1>Register Now</h1>
                <div class="row  row-cols-1 row-cols-lg-1 mt-3">
                    <div id="login-form-input">
                        <div class="col align-items-center">
                            <input type="text" class="form-control mb-3 @error('first_name') is-invalid @enderror"
                                name="first_name" placeholder="First Name" />
                            @error('first_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="text" class="form-control mb-3 @error('last_name') is-invalid @enderror"
                                name="last_name" placeholder="Last Name" />
                            @error('last_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="email" class="form-control mb-3 @error('email') is-invalid @enderror"
                                name="email" placeholder="Email Address" />
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="password" class="form-control mb-3 @error('password') is-invalid @enderror"
                                name="password" placeholder="Password" />
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="password"
                                class="form-control mb-3 @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" placeholder="Confirm Password" />
                            @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col align-items-center1">
                        <input class="btn btn-success border rounded-1 login-button" type="submit" value="Register">
                    </div>

                    <div class="login-forget mt-3">
                        <p><a href="{{ route('user-login') }}">Login</a> | <a href="{{ route('forget-password') }}">Forget
                                Password</a></p>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection
