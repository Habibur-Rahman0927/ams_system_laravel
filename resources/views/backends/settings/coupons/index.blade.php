@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Coupon Management</h4>
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
                            @can('coupon-create')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="table-left">
                                            <a href="{{route('coupons-create')}}" class="add-user"> <span><i
                                                        class="bi bi-person-plus"></i></span> Add
                                                Coupon</a>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th class="text-nowrap" scope="col">Coupon ID</th>
                                            <th class="text-nowrap" scope="col">Coupon Name</th>
                                            <th class="text-nowrap" scope="col">Type</th>
                                            <th class="text-nowrap" scope="col">Coupon Code</th>
                                            <th class="text-nowrap" scope="col">Discounts</th>
                                            <th class="text-nowrap" scope="col">Expiry Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody class="user-data">
                                        @foreach ($coupons as $coupon)
                                            <tr>
                                                <td scope="row">{{$coupon->id}}</td>
                                                <td scope="row">{{$coupon->coupon_name}}</td>
                                                <td scope="row">{{ $coupon->coupon_type }}</td>
                                                <td scope="row">{{ $coupon->coupon_code }}</td>
                                                <td scope="row">{{ $coupon->coupon_value }}%</td>
                                                <td scope="row">{{ $coupon->exp_day }}</td>
                                                <td scope="row">
                                                    <label class="switch">
                                                        <input type="checkbox"
                                                               {{($coupon->status==true)?"checked":""}}  data-id="{{$coupon->id}}"
                                                               class="toggle-class">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="add-userTable-btn">
                                                        @can('coupon-edit')
                                                            <a href="{{ route('coupons-edit', $coupon->id) }}"
                                                               class="edit-btn"><i
                                                                    class="bi bi-pencil-square"></i></a>
                                                        @endcan
                                                        @can('coupon-delete')
                                                            <a href="javascrit:void()" class="del-btn"
                                                               data-id="{{$coupon->id}}"><i
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
                            <div class="col-md-8 col-sm-8 pull-right">
                                <ul class="pagination pull-right">
                                    {{ $coupons->links('pagination::bootstrap-4') }}
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
                    var coupon_id = $(this).data('id');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        dataType: "json",
                        url: '/admin/settings/coupons/status/',
                        data: {
                            'status': status,
                            'id': coupon_id
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
            });

            $('.del-btn').on('click', function (e) {
                e.preventDefault();
                var button = $(this);
                var coupon_id = $(this).data('id');
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
                                url: '/admin/settings/coupons/delete/',
                                data: {
                                    'id': coupon_id
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
        </script>
    @endsection
@endsection
