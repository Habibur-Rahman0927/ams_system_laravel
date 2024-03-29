@extends('layouts.master')
@section('content')

    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Admin Management</h2>
                </div>
                @can('admin-create')
                    <div class="pull-right user-data-btn">
                        <a class="btn btn-dark" href="{{ route('admins.create') }}"> Create New User</a>
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
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Status</th>
                        <th width="280px">Action</th>
                    </tr>
                    </thead>
                    <tbody class="user-data">
                    @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        <span class="badge bg-secondary">{{ $v }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td scope="row">
                                <label class="switch">
                                    <input type="checkbox" {{ $user->status == true ? 'checked' : '' }}
                                        data-id="{{ $user->id }}" class="toggle-class">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td>
                                <a class="edit-btn" href="{{ route('admins.show',$user->id) }}"> <i
                                        class="bi bi-eye"></i></a>
                                @can('admin-edit')
                                    <a class="edit-btn" href="{{ route('admins.edit',$user->id) }}"><i
                                            class="bi bi-pencil-square"></i></a>
                                @endcan
                                {!! Form::open(['method' => 'DELETE','route' => ['admins.destroy', $user->id],'style'=>'display:inline']) !!}
                                @can('admin-delete')
                                    <button class='btn btn-link' type='submit' value='submit'>
                                        <i class="bi bi-trash"></i>
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $data->render("pagination::bootstrap-4") !!}
            </div>
        </div>
    </div>
    @section('scripts')
    <script>
        $(function () {
            $('.toggle-class').change(function () {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    dataType: "json",
                    url: '/admin/admin/status/',
                    data: {'status': status, 'id': user_id},
                    success: function (data) {
                        console.log(data.success)
                        if (data.status == true) {
                            toastr.success(data.message);
                        } else {
                            toastr.error(data.message);
                        }
                    },
                    error: function (err) {
                        toastr.error(data.message);
                    }
                });
            });

        });
    </script>
    @endsection
@endsection
