@extends('layouts.master')
@section('content')
    <div class="main-content-inner">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Overview</h4>
            </div>
            <div class="col-md-10 col-sm-10"></div>
        </div>

        <!-- Dashboard Card Start -->
        <div class="row" data-aos="fade-up">
            <div class="col-lg-3 col-md-6">
                <div class="dashboard_card shadow">
                    <h6>Total Profits</h6>
                    <strong>$95,595</strong>
                    <span>+ 3.55%</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="dashboard_card shadow">
                    <h6>Total Users</h6>
                    <strong>$95,595</strong>
                    <span>+ 3.55%</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="dashboard_card shadow">
                    <h6>New Users</h6>
                    <strong>1,984</strong>
                    <span class="text-danger"> - 9.89%</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="dashboard_card shadow">
                    <h6>Total Memberships</h6>
                    <strong>95,595</strong>
                    <span>+ 3.55%</span>
                </div>
            </div>
        </div>
        <!-- Dashboard Card End -->

        <!-- Chart Start -->
        <div class="row pt-3 ">
            <div class="col-md-8 pb-5" data-aos="fade-up">
                <div class="chart shadow chart-container">
                    <span>Membership Reports</span>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="col-md-4 " data-aos="fade-up">
                <div class="chart2 activeuser shadow">
                    <span>Active Users</span>
                    <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
                <div class="row chart activMembarship mt-4 shadow" data-aos="fade-up">
                    <div class="membars-wrapper">
                        <div class="membar-left">
                            <div class="overview-total">
                                <span class="overview-num">60%</span>
                                <canvas id="chart-cicle" class="chart-canvas" width="123" height="121"
                                        style="display: block;box-sizing: border-box;height: 121px;width: 123px;"></canvas>
                            </div>
                        </div>
                        <div class="membar-right">
                            <div class="members">
                                <h4>1,860</h4>
                                <strong> / 3k Target</strong>
                                <p>Orders in Period</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
