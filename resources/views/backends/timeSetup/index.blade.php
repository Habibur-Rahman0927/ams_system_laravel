@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Time Setup</h4>
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
                                    @can('time-setups-create')
                                    <div class="table-left">
                                        <a href="{{ route('time-setups-create') }}" class="add-user"> <span><i
                                                    class="bi bi-person-plus"></i></span> Add
                                            Time</a>
                                    </div>
                                    @endcan
                                </div>
                            </div>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th class="text-nowrap" scope="col">ID</th>
                                                <th class="text-nowrap" scope="col">Start Time</th>
                                                <th class="text-nowrap" scope="col">End Time</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Active</th>
                                            </tr>
                                        </thead>
                                        <tbody class="user-data">
                                            @foreach ($time_setups as $time_setup)
                                                <tr>
                                                    <td scope="row">{{ @$time_setup->id }}</td>
                                                    <td scope="row">{{ @$time_setup->start_time }}</td>
                                                    <td scope="row">{{ @$time_setup->end_time }}</td>
                                                    <td scope="row">
                                                        <label class="switch">
                                                            <input type="checkbox" {{ $time_setup->status == true ? 'checked' : '' }}
                                                                data-id="{{ $time_setup->id }}" class="toggle-class">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="add-userTable-btn">
                                                            @can('time-setups-edit')
                                                            <a href="{{ URL::to('admin/time-setups/update/' . $time_setup->id) }}"
                                                                class="edit-btn"><i <a
                                                                    href="{{ route('time-setups-edit', $time_setup->id) }}"
                                                                    class="edit-btn"><i class="bi bi-pencil-square"></i></a>
                                                            @endcan        
                                                            @can('time-setups-delete')
                                                            <a href="{{ route('time-setups-delete', ['id' => $time_setup->id]) }}"
                                                                class="del-btn"><i class="bi bi-trash"></i></a>
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
                                    {{ $time_setups->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
                    url: '/admin/time-setup/status/',
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
