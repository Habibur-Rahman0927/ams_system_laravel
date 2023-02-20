@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">E-mail Settings</h4>
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
                                        <a href="{{ route('emails-create') }}" class="add-user"> <span><i
                                                    class="bi bi-person-plus"></i></span> Add
                                            E-mail</a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th class="text-nowrap" scope="col">E-mail ID</th>
                                            <th class="text-nowrap" scope="col">E-Mail Type</th>
                                            <th class="text-nowrap" scope="col">E-Mail Subject</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody class="user-data">
                                        @foreach ($emails as $email)
                                            <tr>
                                                <td scope="row">{{ $email->id }}</td>
                                                @if($email->mail_type==1)
                                                    <td scope="row">Sign up</td>
                                                @elseif($email->mail_type==1)
                                                    <td scope="row">Checkout</td>
                                                @else
                                                    <td scope="row">Password Reset</td>
                                                @endif
                                                <td scope="row">{{ $email->email_subject }}</td>
                                                <td scope="row">
                                                    <label class="switch">
                                                        <input type="checkbox"
                                                               {{ $email->status == '1' ? 'checked' : '' }}
                                                               data-id="{{ $email->id }}" class="toggle-class">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="add-userTable-btn">
                                                        <a href="{{ route('emails-edit', $email->id) }}"
                                                           class="edit-btn"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                        <a href="javascrit:void()" class="del-btn"
                                                           data-id="{{$email->id}}"><i
                                                                class="bi bi-trash"></i></a>
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
                                    {{ $emails->links('pagination::bootstrap-4') }}
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
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
        <script>
            $(function () {
                $('.toggle-class').change(function () {
                    var status = $(this).prop('checked') == true ? 1 : 0;
                    var email_id = $(this).data('id');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        dataType: "json",
                        url: '/admin/settings/emails/status/',
                        data: {
                            'status': status,
                            'id': email_id
                        },
                        success: function (data) {
                            console.log(data.success)
                            if (data.status == true) {
                                toastr.success(data.message);
                            } else {
                                toastr.error(data.message);
                            }
                        },
                        error: function (err) {
                            toastr.error(err.message);
                        }
                    });
                });

                $('.del-btn').on('click', function (e) {
                    e.preventDefault();
                    var button = $(this);
                    var email_id = $(this).data('id');

                    bootbox.confirm({
                        title: "Are you sure?",
                        message: "Your about to delete this user!",
                        buttons: {
                            confirm: {
                                label: 'Yes',
                                className: 'btn-success'
                            },
                            cancel: {
                                label: 'No',
                                className: 'btn-danger'
                            }
                        },
                        callback: function (result) {
                            if (result) {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                            'content')
                                    },
                                    type: "POST",
                                    dataType: "json",
                                    url: '/admin/settings/emails/delete',
                                    data: {
                                        'id': email_id
                                    },
                                    success: function (data) {
                                        if (data.status == true) {
                                            toastr.success(data.message);
                                            setInterval(function () {
                                                window.location.reload();
                                            }, 5000);
                                        } else {
                                            toastr.error(data.message);
                                        }
                                    },
                                    error: function (err) {
                                        toastr.error(data.message);
                                    }
                                });

                            }
                        }
                    });
                });

            });
        </script>
    @endsection
@endsection
