@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;"> Add Users</h4>
            </div>
            <div class="col-md-10 col-sm-10"></div>
        </div>

        <div class="row" data-aos="fade-up">
            <div class="col-md-8 ">
                @if (session('redirect-message'))
                    <div class="alert alert-danger">
                        {{ session('redirect-message') }}
                    </div>
                @endif
                <div class="user-data-setting shadow ">
                    <form class="row g-3 adduserform" action="{{route('users-submit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <input type="text"
                                   class="form-control shadow-none @error('first_name') is-invalid @enderror"
                                   name="first_name" id="firstName" value="{{old('first_name')}}"
                                   placeholder="First Name">
                            @error('first_name')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control shadow-none @error('last_name') is-invalid @enderror"
                                   name="last_name" id="lastName" value="{{old('last_name')}}"
                                   placeholder="Last Name">

                            @error('last_name')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input type="email" class="form-control shadow-none @error('email') is-invalid @enderror" name="email" id="inputEmail4"
                                   placeholder="Email" value="{{old('email')}}">
                            @error('email')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror" name="password" id="inputPassword"
                                   placeholder="Password" value="{{old('password')}}">
                            @error('password')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control shadow-none @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                   id="confirmPassword" value="{{old('password_confirmation')}}"
                                   placeholder="Confirm Password">
                            @error('password_confirmation')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="text-center user-data-btn" style="margin-top: 25px">
                            <button type="submit" class="text-center user-data-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-md-4 add-user-card ">

            </div>
        </div>
    </div>
@endsection
