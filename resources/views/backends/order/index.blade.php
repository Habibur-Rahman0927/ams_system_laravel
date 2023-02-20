@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Orders</h4>
            </div>
            <div class="col-md-10 col-sm-10"> </div>
        </div>
        <div class="row " data-aos="fade-up">
            <div class="col-md-12 ">
                <div class="recentUser">
                    <div class="card shadow">
                        <div class="card-body">
                            {{-- <div class="row pt-3">

                                <div class="col-md-10">
                                    <div class="table-left pb-4">
                                        <select class="rounded" id="bulkaction" >
                                            <option value="#" >Bluk Action</option>
                                            <option value="selectall" >Select All</option>
                                            <option value="deleteall" >Delete All</option>
                                        </select>
                                        <button class="apply-btn rounded">Apply</button>

                                        <select class="rounded" >
                                            <option value="#" >jun 3 2022</option>
                                            <option value="#">Bluk Action</option>
                                        </select>
                                        <select class="rounded" id="customars-ststus" >
                                            <option value="registerCustomers" >registered customers</option>
                                            <option value="unregiesteredCustomer" >Unregiestered Action</option>
                                        </select>
                                        <select class="rounded" id="ordersType" >
                                            <option value="#" >All Orders type</option>
                                            <option value="pending">Pending</option>
                                            <option value="processing">Processing</option>
                                            <option value="complete">Complete</option>
                                        </select>
                                        <button class="filter-btn rounded">filter</button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="table-left text-left">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-end my-0">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-uppercase fw-bold">
                                        <tr>
                                            <th scope="col"><input type="checkbox"></th>
                                            <th scope="col">Id</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Coupons</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col">Payment Method</th>
                                            {{-- <th scope="col">Payment Type</th> --}}
                                            <th scope="col">Total</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                        </thead>

                                        <tbody class="user-data">
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td scope="row"><input type="checkbox"></td>
                                            <td scope="row">{{$order->id}}</td>
                                            <td scope="row">{{$order->user_id}}</td>
                                            <td scope="row">{{$order->coupon_id}}</td>
                                            <td scope="row">{{$order->payment_status}}</td>
                                            <td scope="row">{{$order->payment_method}}</td>
                                            {{-- <td scope="row">{{$order->payment_type}}</td> --}}
                                            <td scope="row">{{$order->total_amount}}</td>
                                            <td scope="row">
                                                <label class="switch">
                                                    <input type="checkbox"
                                                           {{($order->status==true)?"checked":""}}  data-id="{{$order->id}}"
                                                           class="toggle-class">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
