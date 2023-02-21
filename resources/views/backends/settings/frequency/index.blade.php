@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Frequency</h4>
            </div>
            <div class="col-md-10 col-sm-10"></div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-md-12 position-relative">
                <div class="recentUser">
                    <div class="card shadow">
                        <div class="card-body">
                            @can('frequency-create')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="frequencyAddBtn">
                                            <button class="add-user " id="add-frequency"> Add Frequency</button>
                                            <input type="text" placeholder="Enter Frequency Name.." id="frequency"
                                                   class="hide">
                                            <span class="hide" id="addFrequencyBtn"><i class="bi bi-plus"></i></span>
                                            <span class="hide" id="updateFrequencyBtn"><i class="bi bi-plus"></i></span>
                                            <span class="hide" id="cancelFrequencyBtn"><i
                                                    class="bi bi-x-circle"></i></span>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table" id="frequency-table">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th class="text-nowrap" scope="col">ID</th>
                                            <th class="text-nowrap" scope="col">Frequency Name</th>
                                            <th scope="col">Active</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody class="frequency-data">
                                        @foreach ($frequency as $f)
                                            <tr>
                                                <td scope="row">{{$f->id}}</td>
                                                <td scope="row">{{$f->frequency_name}}</td>
                                                <td scope="row">
                                                    <label class="switch">
                                                        <input type="checkbox"
                                                               {{($f->status==true)?"checked":""}}  data-id="{{$f->id}}"
                                                               class="toggle-class">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="add-userTable-btn">
                                                        @can('frequency-edit')
                                                            <a href="javascrpit:void()" class="edit-btn"
                                                               data-id="{{$f->id}}"
                                                               data-name="{{$f->frequency_name}}"><i
                                                                    class="bi bi-pencil-square"></i></a>
                                                        @endcan
                                                        @can('frequency-delete')
                                                            <a href="javascrit:void()" class="del-btn"
                                                               data-id="{{$f->id}}"><i
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
                                    {{ $frequency->links("pagination::bootstrap-4") }}
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

                let frequencyBtn = document.querySelector("#addFrequencyBtn");
                let updateFrequencyBtn = document.querySelector("#updateFrequencyBtn");
                let cancelFrequencyBtn = document.querySelector("#cancelFrequencyBtn");
                let addfrequency = document.querySelector("#add-frequency");
                let frequency_id = "";
                addfrequency.onclick = function () {
                    updateFrequencyBtn.classList.add("hide");
                    cancelFrequencyBtn.classList.remove("hide");
                    frequency.classList.remove("hide")
                    frequencyBtn.classList.remove("hide");
                };
                frequencyBtn.onclick = function () {

                    let frequencyName = document.getElementById("frequency").value;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        dataType: "json",
                        url: '/admin/frequency/create/',
                        data: {'frequency_name': frequencyName},
                        success: function (data) {
                            console.log(data.success)
                            if (data.status == true) {
                                $("#frequency").val('');
                                toastr.success(data.message);
                                setInterval(function () {
                                    window.location.reload();
                                }, 3000);
                            } else {
                                toastr.error(data.message);
                            }
                        },
                        error: function (err) {
                            toastr.error(data.message);
                        }
                    });
                };

                $('.edit-btn').on('click', function (e) {
                    e.preventDefault();
                    var button = $(this);
                    frequency_id = $(this).data('id');
                    var frequency_name = $(this).data('name');
                    frequency.value = frequency_name;
                    frequency.classList.remove("hide")
                    frequencyBtn.classList.add("hide");
                    updateFrequencyBtn.classList.remove("hide");
                    cancelFrequencyBtn.classList.remove("hide");
                })

                cancelFrequencyBtn.onclick = function () {
                    frequency.classList.add("hide")
                    frequencyBtn.classList.add("hide");
                    updateFrequencyBtn.classList.add("hide");
                    cancelFrequencyBtn.classList.add("hide");
                    frequency.value = ""
                    frequency_id = ""
                }

                updateFrequencyBtn.onclick = function () {

                    let frequencyName = document.getElementById("frequency").value;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        dataType: "json",
                        url: '/admin/frequency/update/',
                        data: {'frequency_name': frequencyName, 'id': frequency_id},
                        success: function (data) {
                            console.log(data.success)
                            if (data.status == true) {
                                $("#frequency").val('');
                                frequency_id = "";
                                toastr.success(data.message);
                                setInterval(function () {
                                    window.location.reload();
                                }, 3000);
                            } else {
                                toastr.error(data.message);
                            }
                        },
                        error: function (err) {
                            toastr.error(data.message);
                        }
                    });
                };

            });

            $('.toggle-class').change(function () {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var frequency_id = $(this).data('id');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    dataType: "json",
                    url: '/admin/frequency/status/',
                    data: {'status': status, 'id': frequency_id},
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
                var frequency_id = $(this).data('id');

                bootbox.confirm({
                    title: "Are you sure?",
                    message: "Your about to delete this frequency!",
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
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                dataType: "json",
                                url: '/admin/frequency/delete/',
                                data: {'id': parseInt(frequency_id)},
                                success: function (data) {
                                    if (data.status == true) {
                                        toastr.success(data.message);
                                        setInterval(function () {
                                            window.location.reload();
                                        }, 3000);
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


        </script>
    @endsection
@endsection
