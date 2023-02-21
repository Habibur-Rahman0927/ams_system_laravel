@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;"> Add Course</h4>
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
                    <form class="row g-3 adduserform" action="{{route('course-submit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <strong>Course Name:</strong>
                            <input type="text"
                                   class="form-control shadow-none @error('course_name') is-invalid @enderror"
                                   name="course_name" id="course_name" value="{{old('course_name')}}"
                                   placeholder="Course Name">
                            @error('course_name')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <strong>Duration:</strong>
                            <select class="form-control" name="time_setup_id">
                                <option value=""> -- Select Time -- </option>
                                @foreach ($time_setups as $time_setup)
                                    <option value="{{$time_setup->id}}">{{$time_setup->start_time}} - {{$time_setup->end_time}}</option>
                                @endforeach
                            </select>
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
