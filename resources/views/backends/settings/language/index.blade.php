@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Languages</h4>
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
                            @can('language-create')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="table-left">
                                            <a href="{{ route('languages-create') }}" class="add-user"> <span><i
                                                        class="bi bi-gear"></i></span> Add
                                                Language</a>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th class="text-nowrap" scope="col">Lang Id</th>
                                            <th class="text-nowrap" scope="col">Language Name</th>
                                            <th class="text-nowrap" scope="col">Slug</th>
                                            <th class="text-nowrap" scope="col">Default</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Display Order</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                        </thead>

                                        <tbody class="user-data">
                                        @foreach ($languages as $language)
                                            <tr>
                                                <td scope="row">{{ $language->id }}</td>
                                                <td scope="row">{{ $language->language_name }}</td>
                                                <td scope="row">{{ $language->slug }}</td>
                                                <td scope="row">
                                                    <label class="switch">
                                                        <input type="checkbox"
                                                               {{ $language->default == true ? 'checked' : '' }}
                                                               data-id="{{ $language->id }}" class="toggle-class1">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td scope="row">
                                                    <label class="switch">
                                                        <input type="checkbox"
                                                               {{ $language->status == true ? 'checked' : '' }}
                                                               data-id="{{ $language->id }}" class="toggle-class2">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td scope="row">{{ $language->display_order }}</td>
                                                <td>
                                                    <div class="add-userTable-btn">
                                                        @can('language-edit')
                                                            <a href="{{ route('languages-edit', $language->id) }}"
                                                               class="edit-btn"><i class="bi bi-pencil-square"></i></a>
                                                        @endcan
                                                        @can('language-delete')
                                                            <a href="javascrit:void()" class="del-btn"
                                                               data-id="{{ $language->id }}"><i
                                                                    class="bi bi-trash"></i></a>
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @if (count($languages) === 1)
                                <div class="col-md-8 col-sm-8 pull-right">
                                    <ul class="pagination pull-right">
                                        {{ $languages->links('pagination::bootstrap-4') }}
                                    </ul>
                                </div>
                            @endif
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
                // $('.toggle-class1').change(function() {
                //     var
                //     default = $(this).prop('checked') == true ? 1 : 0;
                //     var language_id = $(this).data('id');
                //     $.ajax({
                //         headers: {
                //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //         },
                //         type: "POST",
                //         dataType: "json",
                //         url: '/admin/settings/languages/default/',
                //         data: {
                //             'default': default,
                //             'id': language_id,
                //         },
                //         success: function(data) {
                //             console.log(data.success)
                //             if (data.status == true) {
                //                 toastr.success(data.message);
                //             } else {
                //                 toastr.error(data.message);
                //             }
                //         },
                //         error: function(err) {
                //             toastr.error(data.message);
                //         }
                //     });
                // });
                $('.toggle-class2').change(function () {
                    var status = $(this).prop('checked') == true ? 1 : 0;
                    var language_id = $(this).data('id');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        dataType: "json",
                        url: '/admin/settings/languages/status/',
                        data: {
                            'status': status,
                            'id': language_id,
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
                            toastr.error(data.message);
                        }
                    });
                });
                $('.del-btn').on('click', function (e) {
                    e.preventDefault();
                    var button = $(this);
                    var language_id = $(this).data('id');
                    bootbox.confirm({
                        title: "Are you sure?",
                        message: "Your about to delete this Coupon!",
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
                                    url: '/admin/settings/languages/delete/',
                                    data: {
                                        'id': language_id,
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
                                        toastr.error(err.message);
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
