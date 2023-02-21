@extends('layouts.frontend_master')
@section('content')
    <div id="hero-img" class="mt-3">
        <h1>My Account</h1>
    </div>
    <section id="checkout-form" class="mt-5">
        @if (session('redirect-message'))
            <div class="row col-12">
                <div class="alert alert-success">
                    {{ session('redirect-message') }}
                </div>
            </div>
        @endif
        <div class="row col-12">
            <div class="tab col-3">
                <button class="tablinks" onclick="myAccount(event, 'Welcome')">Welcome</button>
                <button class="tablinks" onclick="myAccount(event, 'Profile')">Profile</button>
                <button class="tablinks" onclick="myAccount(event, 'Subscriptons')">Subscriptons</button>
                <button class="tablinks" onclick="myAccount(event, 'Transactions')">Transactions</button>
                <button class="tablinks" onclick="myAccount(event, 'Payments')">Payments</button>
                <form action="{{ route('user-logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="tablinks" onclick="myAccount(event, 'logout')">Log Out</button>
                </form>

            </div>
            <div id="Welcome" class="tabcontent col-9">
                <h3>Hello, [{{ $user->first_name }} {{ $user->last_name }}]</h3>
                <p>{{ @$user->user_bio }}</p>
            </div>

            <div id="Profile" class="tabcontent col-9">
                <h3>Profile Settings</h3>
                <div class="row" data-aos="fade-up">
                    <div class="col-md-12 p-3">
                        <div class="user-data-setting">
                            <form class="row g-3 adduserform" action="{{ route('user-account-update', $user->id) }}"
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <input type="text"
                                           class="form-control shadow-none @error('first_name') is-invalid @enderror"
                                           value="{{ $user->first_name }}" id="firstName" name="first_name"
                                           placeholder="First Name">
                                    @error('first_name')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="form-control shadow-none @error('last_name') is-invalid @enderror"
                                           id="lastName" value="{{ $user->last_name }}" name="last_name"
                                           placeholder="Last Name">
                                    @error('last_name')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <input type="text" name="street_address"
                                           class="form-control shadow-none @error('street_address') is-invalid @enderror"
                                           id="streetaddress" placeholder="Street Address">
                                    @error('street_address')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <select id="country" class="form-control @error('country') is-invalid @enderror"
                                            name="country">
                                        @foreach ($countries as $k => $v)
                                            <option value="{{ $v->id }}"
                                                {{ $user->country == $v->id ? 'selected' : '' }}>
                                                {{ $v->country_name }}</option>
                                        @endforeach

                                    </select>
                                    @error('country')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <select id="state" class="form-control @error('state') is-invalid @enderror"
                                            name="state">
                                        @foreach ($states as $s => $v)
                                            <option value="{{ $v->id }}"
                                                {{ $user->state == $v->id ? 'selected' : '' }}>
                                                {{ $v->state_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('state')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <input type="text"
                                           class="form-control shadow-none @error('zipcode') is-invalid @enderror"
                                           value="{{ $user->zipcode }}" id="zipcode" name="zipcode"
                                           placeholder="Zipcode">
                                    @error('zipcode')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <input type="text"
                                           class="form-control shadow-none @error('city') is-invalid @enderror"
                                           value="{{ $user->city }}" id="city" name="city" placeholder="Town/City">
                                    @error('city')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <input type="text"
                                           class="form-control shadow-none @error('phone') is-invalid @enderror"
                                           value="{{ $user->phone }}" id="inputAddress2" name="phone"
                                           placeholder="Phone">
                                    @error('phone')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <input type="email"
                                           class="form-control shadow-none @error('email') is-invalid @enderror"
                                           value="{{ $user->email }}" id="inputEmail4" name="email"
                                           placeholder="Email">
                                    @error('email')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="password"
                                           class="form-control shadow-none @error('password') is-invalid @enderror"
                                           id="inputPassword" name="password" placeholder="Password">
                                    @error('password')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="password"
                                           class="form-control shadow-none @error('password_confirmation') is-invalid @enderror"
                                           id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <select name="timezones" id="timezone-offset"
                                            class="span5 @error('timezones') is-invalid @enderror">
                                        @foreach ($timezones as $timezone)
                                            <option value="{{ $timezone->id }}"
                                                {{ $user->timezone_id == $timezone->id ? 'selected' : '' }}>
                                                {{ $timezone->label }}</option>
                                        @endforeach
                                    </select>
                                    @error('timezones')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control shadow-none" name="primary_address"
                                           value="{{ $user->primary_address }}" id="address" placeholder="Address">
                                </div>

                                <div class="col-md-6">
                                    <img id="output" style="width: 150px;"
                                         src="{{ URL::to('images/user/' . $user->user_profile) }}"/>
                                    <input type="file" class="form-control shadow-none" name="user_profile"
                                           id="files" placeholder="Upload Image" onchange="loadFile(event)">

                                </div>

                                <div class=" text-center user-data-btn">
                                    <button type="submit" class="btn-site">Save</button>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>


            <div id="Subscriptons" class="tabcontent col-9">
                <h3>Subscriptons</h3>
                <?php
                $listedIndex=[];
                ?>
                @foreach($user_service as $k=>$v)
                    @if(!in_array($k, $listedIndex))
                        <div class="accordion mb-3" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                        {{$v['service']->service_name}}
                                    </button>
                                </h2>
                                <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        @foreach($user_service as $m=>$n)
                                            @if($n->service_id==$v->service_id)
                                                <div class="row mb-3">
                                                    <div class="col-2">
                                                        <button type="button" class="btn sub-active">{{$n->status}}</button>
                                                        <!-- <button type="button" class="btn sub-hold">Hold</button>
                                                                                                                    <button type="button" class="btn sub-disable">Canceled</button> -->
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="m-2"><strong><a href=""> {{$n['service']->service_name}}</a></strong>
                                                        </p>
                                                    </div>
                                                    <div class="col-1">
                                                        <a href="{{ route('account-service', $n->order_id) }}" type="button"
                                                           class="btn btn-default">View</a>
                                                    </div>
                                                </div>
                                                <?php
                                                array_push($listedIndex,$m);
                                                ?>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
            <div id="Transactions" class="tabcontent col-9">
                <h3>Transactions</h3>
                <div class="row " data-aos="fade-up">
                    <div class="col-md-12 ">
                        <div class="recentUser">
                            <div class="card shadow">
                                <div class="card-body">

                                    <div class="single-table">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="text-uppercase fw-bold">
                                                <tr>
                                                    <th scope="col">Order</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                                </thead>

                                                <tbody class="user-data">
                                                @foreach($user_subscription as $k=>$v)
                                                    <tr>
                                                        <td scope="row">#{{$v->order_id}}</td>
                                                        <td scope="row"><span></span> {{$v->created_at}}</td>
                                                        <td scope="row" class="pendingPayment">{{$v->payments_status}} Payment</td>
                                                        <td scope="row"><a href="#">{{$v->monthly_amount}}</a></td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                            <div class="col-12">
                                                <div class="table-left text-left">
                                                    <nav aria-label="Page navigation example">
                                                        <ul class="pagination justify-content-end my-0">
                                                            <li class="page-item">
                                                                <a class="page-link" href="#"
                                                                   aria-label="Previous">
                                                                    <span aria-hidden="true">&laquo;</span>
                                                                </a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link"
                                                                                     href="#">1</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link"
                                                                                     href="#">2</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link"
                                                                                     href="#">3</a>
                                                            </li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="#" aria-label="Next">
                                                                    <span aria-hidden="true">&raquo;</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Payments" class="tabcontent col-9">
                <h3>Payment Modes</h3>
                <div class="col-md-12">
                    <h5>Current payment mode</h5>
                    <div class="col-12 mb-4">
                        <div class="col-12">
                            <input type="checkbox" name="" id="" checked>
                            <span>Paypal</span>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <form action="#">
                            <h5>Add a new payment mode</h5>
                            <div class="col-12">
                                <div class="col-12">
                                    <input type="checkbox" name="" id="">
                                    <span>Paypal</span>
                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                        account.</p>
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="" id="">
                                    <span>Credit Card</span>
                                    <p>Pay with your credit card via Stripe.</p>
                                </div>
                                <p>Your personal data will only be used to process your order, support your experience
                                    throughout this website, and for other purposes described in our <a
                                        href="">privacy
                                        policy</a> .
                                </p>
                                <input class="btn btn-success border rounded-1 login-button" type="submit"
                                       value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('css-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endpush
@push('scripts')
    <script>
        tabshow = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabshow.length; i++) {
            if (tabshow[2]) {
                tabshow[2].style.display = "block";
            }
            tabshow[i].style.display = "none";
        }
        tabactive = document.getElementsByClassName("tablinks");
        for (i = 0; i < tabactive.length; i++) {
            if (tabactive[2]) {
                tabactive[2].classList.add("active");
            }
        }
        function myAccount(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;
            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            // Show the current tab, and add an "active" class to the link that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
    <script>
        var loadFile = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#country').change(function() {
                var country_id = $(this).val();
                // console.log(country_id);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    dataType: "json",
                    url: '/profile/getState',
                    data: {
                        country_id: country_id,
                    },
                    dataType: 'json',
                    success: function(result) {
                        // console.log(result);
                        $('#state').html('<option value="">Select Your state</option>');
                        $.each(result, function(key, value) {
                            $('#state').append('<option value="' + value.id + '">' +
                                value.state_name + '</option>');
                        })
                    },
                    error: function(err) {
                        toastr.error(err.message);
                    }
                });
            });
        });
    </script>
@endpush
