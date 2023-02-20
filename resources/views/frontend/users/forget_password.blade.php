@extends('layouts.frontend_master')
@section('content')
    <div id="hero-img" class="mt-3">
        <h1>Forget Password</h1>
    </div>

    <section id="login-form" class="mt-5">
        @if ($errors->any())
            <div class="alert-danger">
                <div class="font-medium text-red-600">
                    {{ __('Whoops! Something went wrong.') }}
                </div>

                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="wrapper">
            <form method="POST" action="{{ route('forget-password-send') }}">
                @csrf
                <h1>Forget Your Password?</h1>
                <div class="row  row-cols-1 row-cols-lg-1 mt-3">
                    <div id="login-form-input">
                        <div class="col align-items-center">
                            <input type="text" class="form-control mb-3" name="email" placeholder="Email Address"/>
                        </div>

                    </div>
                    <div class="col align-items-center1">
                        <input class="btn btn-success border rounded-1 login-button" type="submit"
                               value="Email Me Password">
                    </div>
                    <div class="login-forget mt-3">
                        <p><a href="{{ route('user-login') }}">Login</a> | <a
                                href="{{ route('user-register') }}">Registration</a></p>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection
