@extends('layouts.master')
@section('content')

<div class="main-content-inner pt-4">
    <div class="row pb-3 pt-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User Profile</h2>
            </div>
            <div class="pull-right user-data-btn">
                <a class="btn btn-dark" href="{{ route('users-list') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row" data-aos="fade-up">
        <div class="col-12 user-data-setting shadow">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Name:</strong></td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Roles:</strong></td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label>{{ $v }}</label><br>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>User Bar Code:</strong></td>
                        <td>{!! $barcode !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
