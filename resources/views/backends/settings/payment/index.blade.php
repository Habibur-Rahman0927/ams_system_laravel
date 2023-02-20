@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="service2-wrapper">
            <div class="row  pt-4 pb-4  " data-aos="fade-up">
                <h2>Payment Settings:</h2>
                @foreach ($payments as $payment)
                    <form action="{{ route('payments-update', $payment->id) }}" class="pt-4" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $payment->id }}">
                        <div class="col-md-6 col-sm-12">
                            <div class="current-data shadow">
                                <h2>{{ $payment->method_type }}</h2>
                                <table style="width:100%" class="current-data-table">
                                    <tr>
                                        <th>Method Type :</th>
                                        <td>
                                            <select name="method_type" id="mode">
                                                <option value="paypal"
                                                    {{ $payment->method_type === 'paypal' ? 'selected' : '' }}>Paypal
                                                </option>
                                                <option value="stripe"
                                                    {{ $payment->method_type === 'stripe' ? 'selected' : '' }}>Stripe
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Mode:</th>
                                        <td>
                                            <select name="mode" id="mode">
                                                <option value="test" {{ $payment->mode === 'test' ? 'selected' : '' }}>
                                                    Test</option>
                                                <option value="live" {{ $payment->mode === 'live' ? 'selected' : '' }}>
                                                    Live</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email ID:</th>
                                        <td>
                                            <input type="email" class="@error('account_email') is-invalid @enderror"
                                                name="account_email" value="{{ $payment->account_email }}">
                                            @error('account_email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Client ID:</th>
                                        <td>
                                            <input type="text" class="@error('client_id') is-invalid @enderror"
                                                name="client_id" value="{{ $payment->client_id }}">
                                            @error('client_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Client Secret Key:</th>
                                        <td>
                                            <input type="text" class="@error('client_secret_key') is-invalid @enderror"
                                                name="client_secret_key" value="{{ $payment->client_secret_key }}">
                                            @error('client_secret_key')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Test Public Key:</th>
                                        <td>
                                            <input type="text" class="@error('test_public_key') is-invalid @enderror"
                                                name="test_public_key" value="{{ $payment->test_public_key }}">
                                            @error('test_public_key')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Test Secret Key:</th>
                                        <td><input type="text" class="@error('test_secret_key') is-invalid @enderror"
                                                name="test_secret_key" value="{{ $payment->test_secret_key }}">
                                            @error('test_secret_key')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Live Public Key:</th>
                                        <td>
                                            <input type="text" class="@error('live_public_key') is-invalid @enderror"
                                                name="live_public_key" value="{{ $payment->live_public_key }}">
                                            @error('live_public_key')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Live Secret Key:</th>
                                        <td>
                                            <input type="text" class="@error('live_secret_key') is-invalid @enderror"
                                                name="live_secret_key" value="{{ $payment->live_secret_key }}">
                                            @error('live_secret_key')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Default Payment:</th>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" value="1"
                                                    {{ $payment->default_payment === 1 ? 'checked' : '' }}
                                                    name="default_payment">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>
                                            <label class="switch">
                                                <input value="1" type="checkbox"
                                                    {{ $payment->status === 1 ? 'checked' : '' }} name="status">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Display Order:</th>
                                        <td>
                                            <select name="display_order" id="mode">
                                                <option value="0"
                                                    {{ $payment->display_order === '1' ? 'selected' : '' }}>1</option>
                                                <option value="1"
                                                    {{ $payment->display_order === '1' ? 'selected' : '' }}>2</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                                <div class="tex-insert-btn mt-3">
                                    <button class="btn btn-success"><i class="bi bi-plus-circle"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
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
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    dataType: "json",
                    url: '/admin/users/status/',
                    data: {
                        'status': status,
                        'id': user_id
                    },
                    success: function(data) {
                        console.log(data.success)
                        if (data.status == true) {
                            toastr.success(data.message);
                        } else {
                            toastr.error(data.message);
                        }
                    },
                    error: function(err) {
                        toastr.error(data.message);
                    }
                });
            });

            $('.del-btn').on('click', function(e) {
                e.preventDefault();
                var button = $(this);
                var user_id = $(this).data('id');

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
                    callback: function(result) {
                        if (result) {
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                type: "POST",
                                dataType: "json",
                                url: '/admin/users/delete/',
                                data: {
                                    'id': user_id
                                },
                                success: function(data) {
                                    if (data.status == true) {
                                        toastr.success(data.message);
                                        setInterval(function() {
                                            window.location.reload();
                                        }, 5000);
                                    } else {
                                        toastr.error(data.message);
                                    }
                                },
                                error: function(err) {
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
