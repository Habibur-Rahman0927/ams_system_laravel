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
                    <form class="row g-3 adduserform" action="{{route('assign-submit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <strong>Course Name:</strong>
                            <select class="form-control" name="course_id">
                                <option value=""> -- Select Course -- </option>
                                @foreach ($courses as $course)
                                    <option value="{{$course->id}}">{{$course->course_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <strong>Student Name:</strong>
                            <select class="form-control" name="student_id">
                                <option value=""> -- Select Student -- </option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->first_name}} - {{$user->last_name}}</option>
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
