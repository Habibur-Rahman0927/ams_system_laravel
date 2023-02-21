@extends('layouts.master')
@section('content')

    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Role Management</h2>
                </div>
                @can('role-create')
                    <div class="pull-right user-data-btn">
                        <a class="btn btn-dark" href="{{ route('roles.create') }}"> Create New Role</a>
                    </div>
                @endcan
            </div>
        </div>

        <div class="row" data-aos="fade-up">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row user-data-setting shadow">
                <table class="table table-bordered">
                    <thead class="text-uppercase">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th width="280px">Action</th>
                    </tr>
                    </thead>
                    <tbody class="user-data">
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <div class="add-userTable-btn">
                                    <a class="edit-btn" href="{{ route('roles.show',$role->id) }}"> <i
                                            class="bi bi-eye"></i></a>
                                    @can('role-edit')
                                        <a class="edit-btn" href="{{ route('roles.edit',$role->id) }}"><i
                                                class="bi bi-pencil-square"></i></a>
                                    @endcan
                                    @can('role-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                        <button class='btn btn-link' type='submit' value='submit'>
                                            <i class="bi bi-trash"></i>
                                        {!! Form::close() !!}
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


                {!! $roles->render() !!}
            </div>
        </div>
    </div>
@endsection
