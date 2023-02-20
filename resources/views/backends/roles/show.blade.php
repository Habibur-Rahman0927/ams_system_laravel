@extends('layouts.master')
@section('content')

    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Role</h2>
                </div>
                <div class="pull-right user-data-btn">
                    <a class="btn btn-dark" href="{{ route('roles.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <div class="row" data-aos="fade-up">
            <div class="row user-data-setting shadow">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permissions:</strong>
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <span class="badge bg-secondary">{{ $v->name }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
