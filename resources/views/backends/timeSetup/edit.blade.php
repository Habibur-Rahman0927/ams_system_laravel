@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Update Time</h4>
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
                    <form class="row g-3 adduserform" action="{{URL::to('admin/time-setups/update/'.$time_setup->id)}}"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            @php 
                                use Illuminate\Support\Carbon;
                                $start_time = new Carbon($time_setup->start_time);
                                $end_time = new Carbon($time_setup->end_time);
                            @endphp
                            <input type="time"
                                   class="form-control shadow-none @error('start_time') is-invalid @enderror"
                                   name="start_time" id="start_time" value="{{$start_time->format('h:i')}}"
                                   placeholder="Sstart Time">
                            @error('start_time')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="time" class="form-control shadow-none @error('end_time') is-invalid @enderror"
                                   name="end_time" id="end_time" value="{{$end_time->format('h:i')}}"
                                   placeholder="End Time">

                            @error('end_time')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
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

@endsection

@section('scripts')
    
@endsection
