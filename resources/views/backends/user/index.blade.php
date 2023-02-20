@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Users</h4>
            </div>
            <div class="col-md-10 col-sm-10"></div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-md-12 position-relative">
                @if (session('redirect-message'))
                    <div class="alert alert-success">
                        {{ session('redirect-message') }}
                    </div>
                @endif
                <div class="recentUser">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="table-left">
                                        <a href="{{ route('users-create') }}" class="add-user"> <span><i
                                                    class="bi bi-person-plus"></i></span> Add
                                            User</a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th class="text-nowrap" scope="col">User ID</th>
                                                <th class="text-nowrap" scope="col">First Name</th>
                                                <th class="text-nowrap" scope="col">Last Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Services</th>
                                                <th scope="col">Active</th>
                                            </tr>
                                        </thead>
                                        <tbody class="user-data">
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td scope="row">{{ @$user->id }}</td>
                                                    <td scope="row">{{ @$user->first_name }}</td>
                                                    <td scope="row">{{ @$user->last_name }}</td>
                                                    <td scope="row">{{ @$user->email }}</td>
                                                    <td scope="row">
                                                        <label class="switch">
                                                            <input type="checkbox" {{ $user->status == true ? 'checked' : '' }}
                                                                data-id="{{ $user->id }}" class="toggle-class">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="add-userTable-btn">
                                                            <a href="{{ URL::to('admin/users/update/' . $user->id) }}"
                                                                class="edit-btn"><i <a
                                                                    href="{{ route('users-edit', $user->id) }}"
                                                                    class="edit-btn"><i class="bi bi-pencil-square"></i></a>
                                                            <a href="{{ route('users-delete', ['id' => $user->id]) }}"
                                                                class="del-btn"><i class="bi bi-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 pull-right">
                                <ul class="pagination pull-right">
                                    {{ $users->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script></script>
@endsection
@endsection
