@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Check IN/OUT</h4>
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
                    <form class="row g-3 adduserform" action="{{route('check-in-submit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <strong>Course Name:</strong>
                            <select class="form-control" name="course_id">
                                <option value=""> -- Select Course -- </option>
                                @foreach ($assigns as $assign)
                                    <option value="{{$assign->course->id}}">{{$assign->course->course_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <strong>Check IN/OUT:</strong>
                            <select class="form-control" name="check">
                                <option value=""> -- Select Check IN/OUT -- </option>
                                <option value="check-in">Check In</option>
                                <option value="check-out">Check Out</option>
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
