@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Subscribers</h4>
            </div>
            <div class="col-md-10 col-sm-10"> </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-md-12">
                <div class="recentUser">
                    <div class="card shadow">
                        <div class="card-body">
                            {{-- <div class="row pt-2 pb-3" style="border-bottom: 1px solid #ddd;">
                                <div class="col-md-6 col-sm-12">
                                    <div class="all-subscribe-wrapper">
                                        <div class="all-subscriber">
                                            <h6 class="mb-0">All <span>(22)</span> </h6>
                                        </div>
                                        <div class="all-active">
                                            <h6 class="mb-0">Active <span>(12)</span> </h6>
                                        </div>
                                        <div class="all-onhold">
                                            <h6 class="mb-0">On hold <span>(8)</span></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="subscriber-search text-end">
                                        <input type="search" placeholder="Search...">
                                        <button> Search Subscribtions</button>
                                    </div>
                                </div>
                            </div>

                            <div class="table-left pb-3 mb-4 pt-3 border-bottom">
                                <select id="bulkAction">
                                    <option value="bulkAction">Bulk Action</option>
                                    <option value="selectAll">Select All</option>
                                    <option value="deleteAll">Delete All</option>
                                </select>
                                <button class="apply-btn ">Apply</button>
                                <select id="daterange">
                                    <option value="allDate">All Dates</option>
                                    <option value="#">jun 3 2022</option>
                                    <option value="#">jun 4 2022</option>
                                </select>
                                <select id="payment">
                                    <option value="anyPaymentMethot">Any Payments Method</option>
                                </select>
                                <input type="search" placeholder="Search  Products...">
                                <input type="search" placeholder="Search  Customers...">
                                <button class="filter-btn ">filter</button>
                            </div> --}}



                            <div class="subscriber-table" style="overflow-x:auto;">
                                <table class="mytable mb-3">
                                    <thead>
                                        <tr>
                                            <th scope="col"><input type="checkbox"></th>
                                            <th scope="col">Order ID</th>
                                            <th scope="col">Service ID</th>
                                            <th scope="col">User ID</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Payment Status</th>
                                            <th class="text-nowrap" scope="col">Start Date</th>
                                            <th class="text-nowrap" scope="col">End Date</th>
                                            <th class="text-nowrap" scope="col">Trial End</th>
                                            <th class="text-nowrap" scope="col">Next Payment Date</th>
                                            <th class="text-nowrap" scope="col">Over Payment Date</th>
                                            <th scope="col">Orders</th>
                                        </tr>
                                    </thead>

                                    <tbody class="user-data">
                                        @foreach ($orderSubscribers as $orderSubscriber)
                                            <tr>
                                                <td scope="row"><input type="checkbox"></td>
                                                <td class="text-nowrap">{{$orderSubscriber->order_id}}</td>
                                                <td class="text-nowrap">{{$orderSubscriber->service_id}}</td>
                                                <td class="text-nowrap">{{$orderSubscriber->user_id}}</td>
                                                <td scope="row">{{$orderSubscriber->status}}</td>
                                                <td class="text-nowrap" scope="row">{{$orderSubscriber->payments_status}} </td>
                                                <td class="text-nowrap" scope="row">{{$orderSubscriber->start_date}}</td>
                                                <td class="text-nowrap" scope="row">{{$orderSubscriber->end_date}}</td>
                                                <td class="text-nowrap" scope="row">{{$orderSubscriber->trial_end_date}}</td>
                                                <td class="text-nowrap" scope="row">{{$orderSubscriber->next_payment_date}}</td>
                                                <td class="text-nowrap" scope="row">{{$orderSubscriber->over_payment_date}}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <div class="table-left text-left pt-3">
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
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
