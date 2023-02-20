@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;"> Add Tax</h4>
            </div>
            <div class="col-md-10 col-sm-10"></div>
        </div>

        <div class="row" data-aos="fade-up">
            <div class="col-md-6 ">
                @if (session('redirect-message'))
                    <div class="alert alert-danger">
                        {{ session('redirect-message') }}
                    </div>
                @endif
                <div class="user-data-setting shadow ">
                    <form class="row g-3 adduserform" action="{{ route('taxes-submit') }}" method="post">
                        @csrf


                        <div class="col-12">
                            <select class="form-control" name="tax_type">
                                <option value="local">local</option>
                                <option value="global">global</option>

                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-control shadow-none @error('country') is-invalid @enderror" id="country"
                                name="country">
                                <option value="">Select Your Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                            @error('country')
                                <div class="alert">
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <select class="form-control shadow-none @error('state') is-invalid @enderror" id="state" name="state">
                                <option value="">Select Your state</option>
                            </select>
                            @error('state')
                                <div class="alert">
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control shadow-none @error('post_code') is-invalid @enderror"
                                placeholder="City" name="city" value="">
                            @error('city')
                                <div class="alert">
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control shadow-none @error('post_code') is-invalid @enderror"
                                placeholder="Post Code" name="post_code" value="">
                            @error('post_code')
                                <div class="alert">
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror

                        </div>
                        <div class="col-12">
                            <label for="tax_rate">Tax Rate</label>
                            <input type="number" class="form-control shadow-none @error('tax_rate') is-invalid @enderror" name="tax_rate">
                            @error('tax_rate')
                                <div class="alert">
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="switch">
                                <input type="checkbox" name="status">
                                <span class="slider round"></span>
                            </label>
                        </div>


                        <div class=" text-center user-data-btn">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-md-4 add-user-card ">

            </div>
        </div>
    </div>
    @push('css-styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @endpush
@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script>
        $(function() {
            $('#country').change(function() {
                var country_id = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    dataType: "json",
                    url: '/admin/settings/taxes/getState',
                    data: {
                        country_id: country_id,
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state').html('<option value="">Select Your state</option>');
                        $.each(result, function(key, value) {
                            $('#state').append('<option value="' + value.id + '">' +
                                value.state_name + '</option>');
                        })
                        $('#city').html('<option value="">Select state First</option>');
                    },
                    error: function(err) {
                        toastr.error(data.message);
                    }
                });
            });

            // $('#state').change(function() {
            //     var state_id = $(this).val();

            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         type: "POST",
            //         dataType: "json",
            //         url: '/admin/settings/taxes/getCity/',
            //         data: {
            //             state_id: state_id,
            //         },
            //         dataType: 'json',
            //         success: function(result) {
            //             $('#city').html('<option value="">Select Your city</option>');
            //             $.each(result, function(key, value) {
            //                 $('#city').append('<option value="' + value.id + '">' +
            //                     value.city_name + '</option>');
            //             })
            //             // $('#city').html('<option value="">Select state First</option>');
            //         },
            //         error: function(err) {
            //             toastr.error(data.message);
            //         }
            //     });
            // });


        });
    </script>
@endsection
@endsection
