@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;"> Add Service</h4>
            </div>
            <div class="col-md-10 col-sm-10"></div>
        </div>

        <div class="row" data-aos="fade-up">
            <div class="col-md-10">
                @if (session('redirect-message'))
                    <div class="alert alert-danger">
                        {{ session('redirect-message') }}
                    </div>
                @endif
                <div class="user-data-setting shadow ">
                    <form class="row g- addserviceform" action="{{route('service-submit')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <table style="width:100%" class="current-data-table">
                            <tr>
                                <th>Name:</th>
                                <td><input type="text"
                                           class="form-control shadow-none @error('service_name') is-invalid @enderror"
                                           name="service_name" id="serviceName" value="{{old('service_name')}}"
                                           placeholder="Service Name"></td>

                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    @error('service_name')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </td>

                            </tr>
                            <tr>
                                <th>Service Short Description:</th>
                                <td>
                                    <textarea
                                        class="form-control shadow-none @error('service_short_description') is-invalid @enderror"
                                        name="service_short_description" id="serviceShortDescription"
                                        value="{{old('service_short_description')}}"
                                        placeholder="Service short description">{{old('service_short_description')}}</textarea>
                                </td>

                            </tr>

                            <tr>
                                <th></th>
                                <td>
                                    @error('service_short_description')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </td>

                            </tr>

                            <tr>
                                <th>Service Long Description:</th>
                                <td>
                                    <textarea
                                        class="form-control shadow-none @error('service_long_description') is-invalid @enderror"
                                        name="service_long_description" id="serviceLongDescription"
                                        value="{{old('service_long_description')}}"
                                        placeholder="Service long description">{{old('service_long_description')}}</textarea>
                                </td>

                            </tr>

                            <tr>
                                <th></th>
                                <td>
                                    @error('service_long_description')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </td>

                            </tr>

                            <tr>
                                <th class="text-nowrap ">Subscription Type:</th>
                                <td>
                                    <select id="subscription_duration"
                                            class="@error('subscription_duration') is-invalid @enderror"
                                            name="subscription_duration" id="subscriptionDuration"
                                    >
                                        <option value="">Add Duration</option>
                                        <option value="1" {{ old('subscription_duration') == 1 ? "selected" : "" }}>1
                                        </option>
                                        <option value="2" {{ old('subscription_duration') == 2 ? "selected" : "" }}>2
                                        </option>
                                        <option value="3" {{ old('subscription_duration') == 3 ? "selected" : "" }}>3
                                        </option>
                                        <option value="4" {{ old('subscription_duration') == 4 ? "selected" : "" }}>4
                                        </option>
                                        <option value="5" {{ old('subscription_duration') == 5 ? "selected" : "" }}>5
                                        </option>
                                        <option value="6" {{ old('subscription_duration') == 6 ? "selected" : "" }}>6
                                        </option>
                                        <option value="7" {{ old('subscription_duration') == 7 ? "selected" : "" }}>7
                                        </option>
                                        <option value="8" {{ old('subscription_duration') == 8 ? "selected" : "" }}>8
                                        </option>
                                        <option value="9" {{ old('subscription_duration') == 9 ? "selected" : "" }}>9
                                        </option>
                                        <option value="10" {{ old('subscription_duration') == 10 ? "selected" : "" }}>10
                                        </option>
                                        <option value="11" {{ old('subscription_duration') == 11 ? "selected" : "" }}>11
                                        </option>
                                        <option value="12" {{ old('subscription_duration') == 12 ? "selected" : "" }}>12
                                        </option>
                                    </select>
                                    <!-- <select id="valueStatus" onchange="subscriptionValueSelector() ;">
                        <option value="Free">Free</option>
                        <option value="Locked">Locked</option>
                      </select> -->
                                    <input type="number" class="@error('subscription_amount')  is-invalid @enderror"
                                           id="subscriptionAmount" name="subscription_amount"
                                           placeholder="Chargable Amount"
                                           value="{{old('subscription_amount')}}">
                                    <span class="add-value" id="addSubscriptionValue"><i class="bi bi-plus-circle"></i></span>
                                </td>
                            </tr>

                            <tr>
                                <th></th>
                                <td>
                                    @error('subscription_input_value')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <input type="hidden" value="{{old('subscription_input_value')}}" id="subscriptionInputValue"
                                   name="subscription_input_value"/>

                            <tr>
                                <th>

                                </th>
                                <td>
                                    <div id="textValue">
                                        @if(old('subscription_input_value'))
                                            @foreach(json_decode(old('subscription_input_value')) as $k=>$v)
                                                <p class="price__field">{{$v->duration}} {{$v->amount}} <span
                                                        class="existingDeleteBtn" data-id="{{$k}}"><i
                                                            class="bi bi-dash-circle"></i></span></p>
                                            @endforeach
                                        @endif

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Trail Period in Days:</th>
                                <td>
                                    <input type="number" value="{{old('trial_period')}}"
                                           class="@error('trial_period') is-invalid @enderror" name="trial_period"
                                           id="trial_period" placeholder="Number of days">
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    @error('trial_period')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="text-nowrap ">Hakins Scale Value :</th>
                                <td>

                                    <div class="col-12">
                                        <div class="col-6">
                                            <input type="checkbox" name="hawkin_scale[]"
                                                   @if(old('hawkin_scale') && in_array("500", old('hawkin_scale'))) checked
                                                   @endif value="500">500

                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" name="hawkin_scale[]" value="600"
                                                   @if(old('hawkin_scale') && in_array("600", old('hawkin_scale'))) checked @endif>600

                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" name="hawkin_scale[]" value="700"
                                                   @if(old('hawkin_scale') && in_array("700", old('hawkin_scale'))) checked @endif>700

                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" name="hawkin_scale[]" value="800"
                                                   @if(old('hawkin_scale') && in_array("800", old('hawkin_scale'))) checked @endif>800

                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" name="hawkin_scale[]" value="900"
                                                   @if(old('hawkin_scale') && in_array("900", old('hawkin_scale'))) checked @endif>900

                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" name="hawkin_scale[]" value="1000"
                                                   @if(old('hawkin_scale') && in_array("1000", old('hawkin_scale'))) checked @endif>1000
                                            <input type="checkbox" name="hawkin_scale[]" value="Lock_1000"
                                                   @if(old('hawkin_scale') && in_array("Lock_1000", old('hawkin_scale'))) checked @endif>Lock
                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" name="hawkin_scale[]" value="1100"
                                                   @if(old('hawkin_scale') && in_array("1100", old('hawkin_scale'))) checked @endif>1100
                                            <input type="checkbox" name="hawkin_scale[]" value="Lock_1100"
                                                   @if(old('hawkin_scale') && in_array("Lock_1100", old('hawkin_scale'))) checked @endif>Lock
                                        </div>
                                        <div class="col-6">
                                            <input type="checkbox" name="hawkin_scale[]" value="1200"
                                                   @if(old('hawkin_scale') && in_array("1200", old('hawkin_scale'))) checked @endif>1200
                                            <input type="checkbox" name="hawkin_scale[]" value="Lock_1200"
                                                   @if(old('hawkin_scale') && in_array("Lock_1200", old('hawkin_scale'))) checked @endif>Lock
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    @error('hawkin_scale')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Data Fields:</th>
                                <td>
                                    <input class="mb-2" type="text" id="inputDataFields" onchange="dataFields() ;">
                                    <select id="datafield" onchange="dataFields() ;">
                                        <option value="text">Text Field</option>
                                        <option value="number">Number Field</option>
                                        <option value="date">Date Field</option>
                                        <option value="select">Select</option>
                                    </select>
                                    <select id="requiredField" onchange="dataFields() ;">
                                        <option value="required">Required</option>
                                        <option value="optional">Optional</option>
                                    </select>
                                    <span class="addDataBtn" id="addDataFieldBtn"><i
                                            class="bi bi-plus-circle"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td class="data " style="display: flex; flex-direction: column; width: 50%;">
                                    @if(old('dataField_form_input_value'))
                                        @foreach(json_decode(old('dataField_form_input_value')) as $k=>$v)
                                            <p>{{$v->name}} *<span class="deleteBtn"><i
                                                        class="bi bi-dash-circle"></i></span></p>
                                            <input type="{{$v->type}}" value="{{$v->value}}"
                                                   oninput="getSelectValue({{$v->id}})" id="inputVal{{$v->id}}"/>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    @error('dataField_form_input_value')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <input type="hidden" value="{{old('dataField_form_input_value')}}"
                                   id="dataFieldFormInputValue" name="dataField_form_input_value"/>
                            <tr>
                                <th>Default Value For Day:</th>
                                <td>
                                    <select id="default_value_day_time"
                                            class="@error('default_value_day_time') is-invalid @enderror"
                                            name="default_value_day_time" id="defaultValueDayTime">
                                        <option value="">Select Value</option>
                                        <option
                                            value="8AM" {{ old('default_value_day_time') == "8AM" ? "selected" : "" }}>
                                            8:00 AM
                                        </option>
                                        <option
                                            value="9AM" {{ old('default_value_day_time') == "9AM" ? "selected" : "" }}>
                                            9:00 AM
                                        </option>
                                        <option
                                            value="10AM" {{ old('default_value_day_time') == "10AM" ? "selected" : "" }}>
                                            10:00 AM
                                        </option>
                                    </select>
                                    <select id="default_value_day_value"
                                            class="@error('default_value_day_value') is-invalid @enderror"
                                            name="default_value_day_value" id="defaultValueDayValue">
                                        <option value="">Select Value</option>
                                        <option
                                            value="800" {{ old('default_value_day_value') == 800 ? "selected" : "" }}>
                                            800
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    @error('default_value_day_time')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                    @error('default_value_day_value')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Default Value For Night:</th>
                                <td>
                                    <select id="default_value_night_time"
                                            class="@error('default_value_night_time') is-invalid @enderror"
                                            name="default_value_night_time" id="defaultValueNightTime">
                                        <option value="">Select Value</option>
                                        <option value="8AM"
                                            {{ old('default_value_night_time') == "8AM" ? "selected" : "" }}>8:00 AM
                                        </option>
                                        <option value="9AM"
                                            {{ old('default_value_night_time') == "8AM" ? "selected" : "" }}>9:00 AM
                                        </option>
                                        <option value="10AM"
                                            {{ old('default_value_night_time') == "8AM" ? "selected" : "" }}>10:00 AM
                                        </option>
                                    </select>
                                    <select id="default_value_night_value"
                                            class="@error('default_value_night_value') is-invalid @enderror"
                                            name="default_value_night_value" id="defaultValueNightValue">
                                        <option value="">Select Value</option>
                                        <option
                                            value="800" {{ old('default_value_night_value') == 800 ? "selected" : "" }}>
                                            800
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    @error('default_value_night_time')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                    @error('default_value_night_value')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Booster Default Time:</th>
                                <td>
                                    <select id="default_value_booster_time"
                                            class="@error('default_value_booster_time') is-invalid @enderror"
                                            name="default_value_booster_time" id="defaultValueBoosterTime">
                                        <option value="">Select Value</option>
                                        <option value="8PM"
                                            {{ old('default_value_booster_time') == "8PM" ? "selected" : "" }}>8:00 PM
                                        </option>
                                        <option value="10PM"
                                            {{ old('default_value_booster_time') == "10PM" ? "selected" : "" }}>10:00 PM
                                        </option>
                                        <option value="11PM"
                                            {{ old('default_value_booster_time') == "11PM" ? "selected" : "" }}>11:00 PM
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    @error('default_value_night_time')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Booster subscription value Default:</th>
                                <td>
                                    <select id="default_value_booster_value"
                                            class="@error('default_value_booster_value') is-invalid @enderror"
                                            name="default_value_booster_value" id="defaultValueBoosterValue">
                                        <option value="">Select Value</option>
                                        <option value="1000"
                                            {{ old('default_value_booster_value') == 1000 ? "selected" : "" }}>1000
                                        </option>
                                        <option value="1100"
                                            {{ old('default_value_booster_value') == 1100 ? "selected" : "" }}>1100
                                        </option>
                                        <option value="1200"
                                            {{ old('default_value_booster_value') == 1200 ? "selected" : "" }}>1200
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    @error('default_value_booster_value')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Special Frequency Default:</th>
                                <td>
                                    <select id="default_special_feq"
                                            class="@error('default_special_feq') is-invalid @enderror"
                                            name="default_special_feq" id="defaultSpecialFeq">
                                        @foreach($frequency as $k=>$v)
                                            <option value="{{$v->frequency_name}}"
                                                {{ old('default_special_feq') == $v->frequency_name ? "selected" : "" }}>{{$v->frequency_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    @error('default_special_feq')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Upload Image:</th>
                                <td>
                                    <input type="file" class="form-control shadow-none" name="service_image_url"
                                           id="files"
                                           placeholder="Upload Image" onchange="loadFile(event)">
                                    <img id="output" style="width: 110px;"/>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    @error('service_image_url')
                                    <div class="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                        </table>

                        <div class=" text-center user-data-btn">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-md-4 add-user-card ">

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script>
        let subscriptionInputValue = [];
        let subscriptionExistingValue = $("#subscriptionInputValue").val();
        if (subscriptionExistingValue) {
            subscriptionInputValue = JSON.parse(subscriptionExistingValue);
        }
        let subscriptionStringyfyValue = '';

        let dataFieldInputValue = [];
        let dataFieldStringyfyValue = '';
        let dataFieldExistingValue = $("#dataFieldFormInputValue").val();
        if (dataFieldExistingValue) {
            dataFieldInputValue = JSON.parse(dataFieldExistingValue);
        }

        $(".existingDeleteBtn").on("click", function () {
            const index = $(this).data("id");
            console.log(index);
            subscriptionInputValue.splice(index, 1);
            console.log($(this).parent().remove())
            subscriptionStringyfyValue = JSON.stringify(subscriptionInputValue)
            $("#subscriptionInputValue").val(subscriptionStringyfyValue);
        })

        $(function () {


            $("#addSubscriptionValue").on("click", function () {
                let subscriptionValue = document.getElementById("subscription_duration").value;
                let valueStatus = document.getElementById("subscriptionAmount").value;
                if (subscriptionValue && valueStatus) {
                    let a = {duration: subscriptionValue, amount: valueStatus}
                    console.log(subscriptionInputValue)
                    subscriptionInputValue.push(a);
                    var values =
                        `<p class="price__field">${subscriptionValue} ${valueStatus}   <span class="deleteBtn"><i class="bi bi-dash-circle"></i></span> </p>`;
                    textValue.innerHTML += values;
                    let priceField = document.querySelectorAll(".price__field");
                    let deleteBtn = document.querySelectorAll(".deleteBtn");
                    for (let i = 0; i < deleteBtn.length; i++) {
                        deleteBtn[i].addEventListener("click", () => {
                            priceField[i].remove();
                            subscriptionInputValue.splice(i, 1);
                            $("#subscriptionInputValue").val(subscriptionInputValue);
                        });
                    }
                }
                subscriptionStringyfyValue = JSON.stringify(subscriptionInputValue)
                $("#subscriptionInputValue").val(subscriptionStringyfyValue);
            })


            $("#addDataFieldBtn").on("click", function () {
                let inputDataFields = document.querySelector("#inputDataFields").value;
                let requiredFields = document.getElementById("requiredField");
                let dataFields = document.getElementById("datafield");
                let showValue = document.querySelector("#showValue");
                let arrayLength = parseInt(parseInt(dataFieldInputValue.length) + 1);
                if (inputDataFields) {
                    let input = document.createElement("input");
                    input.setAttribute("type", "text");
                    let tr = document.createElement("tr");
                    let th = document.createElement("th");
                    let td = document.createElement("td");
                    let data = document.querySelector(".data");
                    if (dataFields.value == "select") {
                        input.setAttribute("required", "");
                        input.setAttribute("oninput", "getSelectValue(" + arrayLength + ")");
                        var tableRow = data.innerHTML += ` <td><p>${inputDataFields} *(Please write the values with comma separated)<span class="deleteBtn"><i class="bi bi-dash-circle"></i></span></p></td>`;
                    } else {
                        // input.removeAttribute("required");
                        data.innerHTML += `<p><span>${inputDataFields}  </span><span class="deleteBtn"><i class="bi bi-dash-circle"></i></span></p>`;
                    }
                    if (dataFields.value == "text") {
                        input.setAttribute("type", "text");
                    } else if (dataFields.value == "date") {
                        input.setAttribute("type", "date");
                    } else if (dataFields.value == "number") {
                        input.setAttribute("type", "number");
                    } else if (dataFields.value == "textarea") {
                        input.setAttribute("class", "textarea");
                    }
                    input.setAttribute("id", "inputVal" + arrayLength);
                    data.appendChild(input);

                    let obj = {
                        id: arrayLength,
                        name: inputDataFields,
                        type: dataFields.value,
                        dataType: requiredFields.value,
                        value: ""
                    }
                    dataFieldInputValue.push(obj);

                } else {
                    alert("Please fill the input value")
                }
                dataFieldStringyfyValue = JSON.stringify(dataFieldInputValue)
                $("#dataFieldFormInputValue").val(dataFieldStringyfyValue);

            })
        });
        var loadFile = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        function getSelectValue(id) {
            const object = dataFieldInputValue.find(obj => obj.id === id);
            const index = dataFieldInputValue.findIndex(entry => entry.id === id);
            const source = {
                dataType: object.dataType,
                id: object.id,
                name: object.name,
                type: object.type,
                value: $("#inputVal" + id).val()
            }
            dataFieldInputValue[index] = source
            dataFieldStringyfyValue = JSON.stringify(dataFieldInputValue)
            $("#dataFieldFormInputValue").val(dataFieldStringyfyValue);
        }
    </script>
@endsection
