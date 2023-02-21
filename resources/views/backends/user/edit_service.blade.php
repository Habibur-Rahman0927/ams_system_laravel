@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="service2-wrapper">
            <div class="row  pt-4 pb-4  " data-aos="fade-up">
                <div class="col-md-6 col-sm-12">
                    <form action="#" class="services2 shadow ">
                        <h2>Service 2:</h2>
                        <div class="col-12">
                            <label for="meeting-time">Timezone:</label>
                            <input type="datetime-local" id="time" name="meeting-time" value="2018-06-12T19:30"
                                   min="2018-06-07T00:00" max="2018-06-14T00:00">
                        </div>
                        <div class="col-12">
                            <label>Day Time :</label>
                            <select id="dayTime">
                                <option value="7AM">7:00 AM</option>
                                <option value="9PM">9:00 PM</option>
                                <option value="10PM">10:00 PM</option>
                            </select>
                            <select id="#">
                                <option value="1000">1000</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label> Night Time :</label>
                            <select id="nightTime">
                                <option value="9PM">9:00 PM</option>
                                <option value="10PM">10:00 PM</option>
                                <option value="11PM">11:00 PM</option>
                            </select>
                            <select id="#">
                                <option value="800">800</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label>Booster Time :</label>
                            <select id="boosterTime">
                                <option value="8PM">8:00 PM</option>
                                <option value="10PM">10:00 PM</option>
                                <option value="11PM">11:00 PM</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label>Booster Value:</label>
                            <input type="text" value="1000">
                        </div>
                        <div class="col-12">
                            <label>Booster Hawkins value : </label>
                            <div class="col-6">
                                <input type="checkbox" name="500" value="500" checked>500
                                <input type="checkbox" name="600" value="600" checked>600
                                <input type="checkbox" name="700" value="700" checked>700
                                <input type="checkbox" name="800" value="800">800
                                <input type="checkbox" name="900" value="900">900
                                <input type="checkbox" name="1000" value="1000">1000
                                <input type="checkbox" name="1100" value="1100">1100
                                <input type="checkbox" name="1200" value="1200">1200
                            </div>
                        </div>
                        <div class="col-12">
                            <label>Special Frequency : </label>
                            <select id="specialFrequency">
                                <option value="innerPeace">Inner Peace</option>
                                <option value="#">Inner Peace</option>
                            </select>
                        </div>
                        <div class="col-12 sub-status">
                            <label> Subscription :</label>
                            <div class="subscriptions">
                                <h5>Active</h5>
                                <p>Reniew on 7th June 2022</p>
                                <a class="update-sub" href="#">Update Payment</a>
                                <a class="cancel-sub" href="#">Cancel Subscription</a>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="add-service-btn">Save Settings</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="current-data shadow">
                        <h2>Current Data:</h2>
                        <table style="width:100%" class="current-data-table">
                            <tr>
                                <th>Car Brand:</th>
                                <td><input type="text" value="Toyota"></td>
                            </tr>
                            <tr>
                                <th>Model:</th>
                                <td><input type="text" value="1997"></td>
                            </tr>
                            <tr>
                                <th>VIN/Unique Motor Number:</th>
                                <td><input type="text" value="32423423"></td>
                            </tr>
                            <tr>
                                <th>Day/Night Mode:</th>
                                <td>
                                    <input type="checkbox">On
                                </td>
                            </tr>
                            <tr>
                                <th>Booster Time:</th>
                                <td>
                                    <input type="checkbox">On
                                </td>
                            </tr>
                            <tr>
                                <th>Special Frequency:</th>
                                <td>
                                    <select id="specialFrequency">
                                        <option value="innerPeace">Inner Peace</option>
                                        <option value="#">Inner Peace</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
