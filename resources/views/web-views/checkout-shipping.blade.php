@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Shipping Address Choose'))

@section('content')
    <div class="container pb-5 mb-2 mb-md-4 rtl" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <div class="row">
            <div class="col-md-12 mb-5 pt-5">
                <div class="feature_header" style="background: #dcdcdc;line-height: 1px">
                    <span>{{ \App\CPU\translate('shipping_address')}}</span>
                </div>
            </div>
            <section class="col-lg-8">
                <hr>
                <div class="checkout_details mt-3">
                    <!-- Steps-->
                @include('web-views.partials._checkout-steps',['step'=>2])
                <!-- Shipping methods table-->
                    <h2 class="h4 pb-3 mb-2 mt-5">{{ \App\CPU\translate('shipping_address')}} {{ \App\CPU\translate('choose_shipping_address')}}</h2>
                    @php($shipping_addresses=\App\Model\ShippingAddress::where('customer_id',auth('customer')->id())->get())
                    <form method="post" action="" id="address-form">
                        @csrf
                        <div class="card-body" style="padding: 0!important;">
                            <ul class="list-group">
                                @foreach($shipping_addresses as $key=>$address)
                                    <li class="list-group-item mb-2 mt-2"
                                        style="cursor: pointer;background: rgba(245,245,245,0.51)"
                                        onclick="$('#sh-{{$address['id']}}').prop( 'checked', true )">
                                        <input type="radio" name="shipping_method_id"
                                               id="sh-{{$address['id']}}"
                                               value="{{$address['id']}}" {{$key==0?'checked':''}}>
                                        <span class="checkmark" style="margin-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 10px"></span>
                                        <label class="badge"
                                               style="background: {{$web_config['primary_color']}}; color:white !important;">{{$address['address_type']}}</label>
                                        <small>
                                            <i class="fa fa-phone"></i> {{$address['phone']}}
                                        </small>
                                        <hr>
                                        <span>{{ \App\CPU\translate('contact_person_name')}}: {{$address['contact_person_name']}}</span><br>
                                        <span>{{ \App\CPU\translate('address')}} : {{$address['address']}}, {{$address['city']}}, {{$address['zip']}}, {{$address['country']}}.</span>
                                    </li>
                                @endforeach
                                <li class="list-group-item mb-2 mt-2" onclick="anotherAddress()">
                                    <input type="radio" name="shipping_method_id"
                                           id="sh-0" value="0" data-toggle="collapse"
                                           data-target="#collapseThree" {{$shipping_addresses->count()==0?'checked':''}}>
                                    <span class="checkmark" style="margin-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 10px"></span>
                                    <label class="badge"
                                           style="background: {{$web_config['primary_color']}}; color:white !important;">
                                        <i class="fa fa-plus-circle"></i></label>
                                    <button type="button" class="btn btn-outline" data-toggle="collapse"
                                            data-target="#collapseThree">{{ \App\CPU\translate('Another')}} {{ \App\CPU\translate('address')}}
                                    </button>
                                    <div id="accordion">
                                        <div id="collapseThree"
                                             class="collapse {{$shipping_addresses->count()==0?'show':''}}"
                                             aria-labelledby="headingThree"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div id="map" style="width:100%;height:200px;margin-bottom: 20px;"></div>
                                                    <input type="hidden" name="lat" id="lat" value="">
                                                    <input type="hidden" name="lng" id="lng" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{ \App\CPU\translate('City')}} <span
                                                            style="color: red">*</span></label>
                                                    <input type="text" class="form-control"
                                                           name="city" id="city" {{$shipping_addresses->count()==0?'required':''}}>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        for="exampleInputEmail1">{{ \App\CPU\translate('address')}} <span
                                                            style="color: red">*</span></label>
                                                    <textarea class="form-control"
                                                              name="address" id="address" {{$shipping_addresses->count()==0?'required':''}}></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleInputPassword1">{{ \App\CPU\translate('address')}} {{ \App\CPU\translate('Type')}}</label>
                                                    <select class="form-control" name="address_type">
                                                        <option
                                                            value="permanent">{{ \App\CPU\translate('Permanent')}}</option>
                                                        <option value="home">{{ \App\CPU\translate('Home')}}</option>
                                                        <option value="others">{{ \App\CPU\translate('Others')}}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{ \App\CPU\translate('Building')}} <span
                                                            style="color: red">*</span></label>
                                                    <input type="text" class="form-control"
                                                           name="building" {{$shipping_addresses->count()==0?'required':''}}>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleInputEmail1">{{ \App\CPU\translate('Description')}}</label>
                                                    <textarea class="form-control"
                                                              name="description"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{ \App\CPU\translate('Phone')}}<span
                                                            style="color: red">*</span></label>
                                                    <input type="text" class="form-control"
                                                           name="phone" {{$shipping_addresses->count()==0?'required':''}}>
                                                </div>
                                                <div class="form-check" style="padding-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 1.25rem;">
                                                    <input type="checkbox" name="save_address" class="form-check-input"
                                                           id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1" style="padding-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 1.09rem">
                                                        {{ \App\CPU\translate('save_this_address')}}
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn btn-primary" style="display: none"
                                                        id="address_submit"></button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>
                    <!-- Navigation (desktop)-->
                    <div class="row">
                        <div class="col-6">
                            <a class="btn btn-secondary btn-block" href="{{route('shop-cart')}}">
                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'right' : 'left'}} mt-sm-0 mx-1"></i>
                                <span class="d-none d-sm-inline">{{ \App\CPU\translate('shop_cart')}}</span>
                                <span class="d-inline d-sm-none">{{ \App\CPU\translate('shop_cart')}}</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-primary btn-block" href="javascript:" onclick="proceed_to_next()">
                                <span class="d-none d-sm-inline">{{ \App\CPU\translate('proceed_payment')}}</span>
                                <span class="d-inline d-sm-none">{{ \App\CPU\translate('Next')}}</span>
                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}} mt-sm-0 mx-1"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Sidebar-->
                </div>
            </section>
            @include('web-views.partials._order-summary')
        </div>
    </div>
@endsection

@push('script')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{\App\CPU\Helpers::get_business_settings('google_maps_key')}}&callback=initMap"></script>
    <script>
       let map, infoWindow, marker;

       function initMap() {
            div = "map";
            lat_inp = "lat";
            lng_inp = "lng";
            address_div = "address";
            city_div = "city";

            map = new google.maps.Map(document.getElementById(div), {
                center: { lat: 0, lng: 0 },
                zoom: 14,
                mapTypeControl: false
            });
            geocoder = new google.maps.Geocoder();
            infoWindow = new google.maps.InfoWindow();

            if($('#'+lat_inp).val() != ""){
                lat = parseFloat($('#'+lat_inp).val());
                lng = parseFloat($('#'+lng_inp).val());
                initialLocation = new google.maps.LatLng(lat, lng);

                map.setCenter(initialLocation);
                marker = new google.maps.Marker({position: initialLocation, map: map});
            }
            else if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                    $('#'+lat_inp).val(position.coords.latitude)
                    $('#'+lng_inp).val(position.coords.longitude)

                    map.setCenter(initialLocation);
                    marker = new google.maps.Marker({position: initialLocation, map: map});
                    setGeoLocation('address', 'city');
                });
            }

            // Get Location Button
            const locationButton = document.createElement("button");
            locationButton.textContent = "Get Current Location";
            locationButton.classList.add("custom-map-control-button");
            locationButton.type = "button";
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(locationButton);
            locationButton.addEventListener("click", () => {
                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };
                            $('#'+lat_inp).val(position.coords.latitude)
                            $('#'+lng_inp).val(position.coords.longitude)

                            marker.setMap(null);
                            marker = new google.maps.Marker({position: pos, map: map});
                            map.setCenter(pos);
                            setGeoLocation('address', 'city');
                        },
                        () => {
                            handleLocationError(true, infoWindow, map.getCenter());
                        }
                    );
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            });

            //Click and drag marker
            google.maps.event.addListener(map, 'click', function(event) {
                //clear previous marker
                marker.setMap(null);

                //Get the location that the user clicked.

                var clickedLocation = event.latLng;
                //If the marker hasn't been added.
                //Create the marker.
                marker = new google.maps.Marker({
                    position: clickedLocation,
                    map: map,
                    draggable: true //make it draggable
                });
                var currentLocation = marker.getPosition();
                $('#'+lat_inp).val(currentLocation.lat())
                $('#'+lng_inp).val(currentLocation.lng())
                setGeoLocation('address', 'city');

                //Listen for drag events!
                google.maps.event.addListener(marker, 'dragend', function(event){
                    var currentLocation = marker.getPosition();
                    $('#'+lat_inp).val(currentLocation.lat())
                    $('#'+lng_inp).val(currentLocation.lng())

                    setGeoLocation('address', 'city');
                });
            });
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation
                ? "Error: The Geolocation service failed."
                : "Error: Your browser doesn't support geolocation."
            );
            infoWindow.open(map);
        }

        function setGeoLocation(address_id, city_id){
            var currentLocation = marker.getPosition();
            var uluru = {lat: currentLocation.lat(), lng: currentLocation.lng()};
            geocoder.geocode({
                    'latLng': uluru
                }, function(responses) {
                    if (responses && responses.length > 0) {
                        var address = responses[0].formatted_address;
                        var  value = address.split("-");

                    count = value.length;
                    city = value[count-2];
                    document.getElementById(address_id).value = address;
                    document.getElementById(city_id).value = city;
                } else {
                    console.log('Cannot determine address at this location.');
                }
            });
        }
    </script>

    <script>
        function anotherAddress() {
            $('#sh-0').prop('checked', true);
            $("#collapseThree").collapse();
        }

        function proceed_to_next() {

            let allAreFilled = true;
            document.getElementById("address-form").querySelectorAll("[required]").forEach(function (i) {
                if (!allAreFilled) return;
                if (!i.value) allAreFilled = false;
                if (i.type === "radio") {
                    let radioValueCheck = false;
                    document.getElementById("address-form").querySelectorAll(`[name=${i.name}]`).forEach(function (r) {
                        if (r.checked) radioValueCheck = true;
                    });
                    allAreFilled = radioValueCheck;
                }
            });


            if (allAreFilled) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post({
                    url: '{{route('customer.choose-shipping-address')}}',
                    dataType: 'json',
                    data: $('#address-form').serialize(),
                    beforeSend: function () {
                        $('#loading').show();
                    },
                    success: function (data) {
                        if (data.errors) {
                            for (var i = 0; i < data.errors.length; i++) {
                                toastr.error(data.errors[i].message, {
                                    CloseButton: true,
                                    ProgressBar: true
                                });
                            }
                        } else {
                            location.href = '{{route('checkout-payment')}}';
                        }
                    },
                    complete: function () {
                        $('#loading').hide();
                    },
                    error: function () {
                        toastr.error('{{\App\CPU\translate('Something went wrong!')}}', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }
                });
            } else {
                toastr.error('{{\App\CPU\translate('Please fill all required fields')}}', {
                    CloseButton: true,
                    ProgressBar: true
                });
            }
        }
    </script>
@endpush
@push('css_or_js')
    <style>
        .btn-outline {
            border-color: {{$web_config['primary_color']}};
        }

        .btn-outline {
            color: #020512;
            border-color: {{$web_config['primary_color']}}!important;
        }

        .btn-outline:hover {
            color: white;
            background: {{$web_config['primary_color']}};

        }

        .btn-outline:focus {
            border-color: {{$web_config['primary_color']}}!important;
        }
    </style>
@endpush
