@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('My Address'))

@push('css_or_js')
    <link rel="stylesheet" media="screen"
          href="{{asset('public/assets/front-end')}}/vendor/nouislider/distribute/nouislider.min.css"/>

    <style>
        .headerTitle {
            font-size: 24px;
            font-weight: 600;
            margin-top: 1rem;
        }

        body {
            font-family: 'Titillium Web', sans-serif
        }

        .product-qty span {
            font-size: 14px;
            color: #6A6A6A;
        }

        .font-nameA {

            display: inline-block;
            margin-top: 5px !important;
            font-size: 13px !important;
            color: #030303;
        }

        .font-name {
            font-weight: 600;
            font-size: 15px;
            padding-bottom: 6px;
            color: #030303;
        }

        .modal-footer {
            border-top: none;
        }

        .cz-sidebar-body h3:hover + .divider-role {
            border-bottom: 3px solid {{$web_config['primary_color']}} !important;
            transition: .2s ease-in-out;
        }

        label {
            font-size: 15px;
            margin-bottom: 8px;
            color: #030303;

        }

        .nav-pills .nav-link.active {
            box-shadow: none;
            color: #ffffff !important;
        }

        .modal-header {
            border-bottom: none;
        }

        .nav-pills .nav-link {
            padding-top: .575rem;
            padding-bottom: .575rem;
            background-color: #ffffff;
            color: #050b16 !important;
            font-size: .9375rem;
            border: 1px solid #e4dfdf;
        }

        .nav-pills .nav-link :hover {
            padding-top: .575rem;
            padding-bottom: .575rem;
            background-color: #ffffff;
            color: #050b16 !important;
            font-size: .9375rem;
            border: 1px solid #e4dfdf;
        }

        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #fff;
            background-color: {{$web_config['primary_color']}};
        }

        .iconHad {
            color: {{$web_config['primary_color']}};
            padding: 4px;
        }

        .iconSp {
            margin-top: 0.70rem;
        }

        .fa-lg {
            padding: 4px;
        }

        .fa-trash {
            color: #FF4D4D;
        }

        .namHad {
            color: #030303;
            position: absolute;
            padding-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 13px;
            padding-top: 8px;
        }

        .donate-now {
            list-style-type: none;
            margin: 25px 0 0 0;
            padding: 0;
        }

        .donate-now li {
            float: left;
            margin: {{Session::get('direction') === "rtl" ? '0 0 0 5px' : '0 5px 0 0'}};
            width: 100px;
            height: 40px;
            position: relative;
            padding: 22px;
            text-align: center;
        }

        .donate-now label,
        .donate-now input {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .donate-now input[type="radio"] {
            opacity: 0.01;
            z-index: 100;
        }

        .donate-now input[type="radio"]:checked + label,
        .Checked + label {
            background: {{$web_config['primary_color']}};
            color: white !important;
            border-radius: 7px;
        }

        .donate-now label {
            padding: 5px;
            border: 1px solid #CCC;
            cursor: pointer;
            z-index: 90;
        }

        .donate-now label:hover {
            background: #DDD;
        }

        #edit{
            cursor: pointer;
        }

        .custom-map-control-button {
            margin-top: 10px;
            margin-left: 10px;
            background: white;
            border: 1px solid #ececec;
            padding: 5px 10px;
            color: #666666;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .sidebar_heading h1 {
                text-align: center;
                color: aliceblue;
                padding-bottom: 17px;
                font-size: 19px;
            }
        }
    </style>
@endpush

@section('content')

    <div class="modal fade rtl" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-12"><h5 class="modal-title font-name ">{{\App\CPU\translate('add_new_address')}}</h5></div>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{route('address-store')}}" method="post">
                        @csrf

                        <div class="col-md-12" style="display: flex">
                            <!-- Nav pills -->

                            <ul class="donate-now">
                                <li>
                                    <input type="radio" id="a25" name="addressAs" value="permanent"/>
                                    <label for="a25" class="component">{{\App\CPU\translate('permanent')}}</label>
                                </li>
                                <li>
                                    <input type="radio" id="a50" name="addressAs" value="home"/>
                                    <label for="a50" class="component">{{\App\CPU\translate('Home')}}</label>
                                </li>
                                <li>
                                    <input type="radio" id="a75" name="addressAs" value="office" checked="checked"/>
                                    <label for="a75" class="component">{{\App\CPU\translate('Office')}}</label>
                                </li>

                            </ul>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div id="map" style="width:100%;height:200px;margin-bottom: 20px;"></div>
                                        <input type="hidden" name="lat" id="lat" value="">
                                        <input type="hidden" name="lng" id="lng" value="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="address-city">{{\App\CPU\translate('City')}}</label>
                                        <input class="form-control" type="text" id="address-city" name="city" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address">{{\App\CPU\translate('address')}}</label>
                                        <input class="form-control" type="text" id="address" name="address" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="building">{{\App\CPU\translate('Building')}}</label>
                                        <input class="form-control" type="text" id="building" name="building" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="description">{{\App\CPU\translate('Description')}}</label>
                                        <input class="form-control" type="text" id="description" name="description" required>
                                    </div>
                                </div>
                                {{-- <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="state">{{\App\CPU\translate('State')}}</label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="country">{{\App\CPU\translate('Country')}}</label>
                                        <input type="text" class="form-control" id="country" name="country"
                                               placeholder="" required>
                                    </div>
                                </div> --}}
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="firstName">{{\App\CPU\translate('Phone')}}</label>
                                        <input class="form-control" type="text" id="phone" name="phone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{\App\CPU\translate('close')}}</button>
                                <button type="submit" class="btn btn-primary">{{\App\CPU\translate('Add')}} {{\App\CPU\translate('Informations')}}  </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <div class="row">
            <!-- Sidebar-->
        @include('web-views.partials._profile-aside')
        <!-- Content  -->
            <section class="col-lg-9 mt-3 col-md-9">

                <!-- Addresses list-->
                <div class="row">
                    <div class="col-lg-12 col-md-12  d-flex justify-content-between overflow-hidden">
                        <div class="col-sm-4">
                            <h1 class="h3  mb-0 folot-left headerTitle">{{\App\CPU\translate('ADDRESSES')}}</h1>
                        </div>
                        <div class="mt-2 col-sm-4">
                            <button type="submit" class="btn btn-primary float-right add-btn"
                                data-target="#exampleModal">{{\App\CPU\translate('add_new_address')}}
                            </button>
                        </div>
                    </div>
                    @foreach($shippingAddresses as $shippingAddress)
                        <section class="col-lg-6 col-md-6 mb-4 mt-5">
                            <div class="card" style="text-transform: capitalize;">
                                {{-- <div class="card cardColor"> --}}
                                    <div class="card-header" style="padding: 5px;">
                                        <i class="fa fa-thumb-tack fa-2x iconHad" aria-hidden="true"></i>
                                        <span class="namHad"> {{$shippingAddress['address_type']}} {{\App\CPU\translate('address')}} </span>
                                        {{-- <div> --}}
                                        <span class="float-right iconSp">
                                            <a class="edit-btn" id="edit" data-target="#editAddress_{{$shippingAddress->id}}">
                                                <i class="fa fa-edit fa-lg"></i>
                                            </a>

                                            <a class="" href="{{ route('address-delete',['id'=>$shippingAddress->id])}}" onclick="return confirm('{{\App\CPU\translate('Are you sure you want to Delete')}}?');" id="delete">
                                                <i class="fa fa-trash fa-lg"></i>
                                            </a>
                                        </span>
                                    </div>
                                        {{-- </div> --}}

                                    {{-- Modal Address Edit --}}
                                    <div class="modal fade" id="editAddress_{{$shippingAddress->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <div class="row">
                                                    <div class="col-md-12"> <h5 class="modal-title font-name ">{{\App\CPU\translate('update')}} {{\App\CPU\translate('address')}}  </h5></div>
                                                </div>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="updateForm">
                                                        @csrf
                                                        {{-- <div class="pb-3" style="display: flex">
                                                            <!-- Nav pills -->
                                                            <input type="hidden" id="defaultValue" class="add_type" value="{{$shippingAddress->address_type}}">
                                                            <ul class="donate-now">
                                                                <li class="address_type_li">
                                                                    <input type="radio" class="address_type" id="a25" name="addressAs" value="permanent"  {{ $shippingAddress->address_type == 'permanent' ? 'checked' : ''}} />
                                                                    <label for="a25" class="component">{{\App\CPU\translate('permanent')}}</label>
                                                                </li>
                                                                <li class="address_type_li">
                                                                    <input type="radio" class="address_type" id="a50" name="addressAs" value="home" {{ $shippingAddress->address_type == 'home' ? 'checked' : ''}} />
                                                                    <label for="a50" class="component">{{\App\CPU\translate('Home')}}</label>
                                                                </li>
                                                                <li class="address_type_li">
                                                                    <input type="radio" class="address_type" id="a75" name="addressAs" value="office" {{ $shippingAddress->address_type == 'office' ? 'checked' : ''}}/>
                                                                    <label for="a75" class="component">{{\App\CPU\translate('Office')}}</label>
                                                                </li>
                                                            </ul>
                                                        </div> --}}
                                                        <!-- Tab panes -->
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <div id="map_{{$shippingAddress->id}}" style="width:100%;height:200px;margin-bottom: 20px;"></div>
                                                                <input type="hidden" name="lat" id="lat_{{$shippingAddress->id}}" value="{{$shippingAddress->lat}}">
                                                                <input type="hidden" name="lng" id="lng_{{$shippingAddress->id}}" value="{{$shippingAddress->lng}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="city">{{\App\CPU\translate('City')}}<span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" id="city_{{$shippingAddress->id}}" name="city" value="{{$shippingAddress->city}}" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="own_address">{{\App\CPU\translate('address')}}<span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" id="address_{{$shippingAddress->id}}"
                                                                    name="address"
                                                                    value="{{$shippingAddress->address}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="address-building">{{\App\CPU\translate('Building')}}<span class="text-danger">*</span></label>

                                                                <input class="form-control" type="text" id="building_{{$shippingAddress->id}}" name="building" value="{{$shippingAddress->building}}" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="address-desc">{{\App\CPU\translate('Description')}}</label>
                                                                <input class="form-control" type="text" id="address-desc_{{$shippingAddress->id}}" name="description" value="{{$shippingAddress->description}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                            <label for="own_phone">{{\App\CPU\translate('Phone')}}<span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" id="phone_{{$shippingAddress->id}}" name="phone" value="{{$shippingAddress->phone}}" required="required">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="closeB btn btn-secondary" data-dismiss="modal">{{\App\CPU\translate('close')}}</button>
                                                            <button type="submit" class="btn btn-primary addressUpdate" data-id="{{$shippingAddress->id}}">{{\App\CPU\translate('update')}}  </button>
                                                        </div>
                                                    </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body" style="padding: {{Session::get('direction') === "rtl" ? '0 13px 15px 15px' : '0 15px 15px 13px'}};">
                                        {{-- <div class="font-name"><span>{{$shippingAddress['contact_person_name']}}</span>
                                        </div> --}}
                                        <div><span class="font-nameA"> <strong>{{\App\CPU\translate('Phone')}}  :</strong>  {{$shippingAddress['phone']}}</span>
                                        </div>
                                        <div><span class="font-nameA"> <strong>{{\App\CPU\translate('City')}}  :</strong>  {{$shippingAddress['city']}}</span>
                                        </div>
                                        {{-- <div><span class="font-nameA"> <strong> {{\App\CPU\translate('zip_code')}} :</strong> {{$shippingAddress['zip']}}</span>
                                        </div> --}}
                                        <div><span class="font-nameA"> <strong>{{\App\CPU\translate('address')}} :</strong> {{$shippingAddress['address']}}</span>
                                        </div>
                                        <div><span class="font-nameA"> <strong>{{\App\CPU\translate('Building')}} :</strong> {{$shippingAddress['building']}}</span>
                                        </div>
                                        <div><span class="font-nameA"> <strong>{{\App\CPU\translate('Description')}} :</strong> {{$shippingAddress['description']}}</span>
                                        </div>
                                    </div>
                                {{-- </div> --}}
                            </div>
                        </section>
                    @endforeach
                </div>

            </section>

        </div>
    </div>

@endsection

@push('script')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{\App\CPU\Helpers::get_business_settings('google_maps_key')}}"></script>
    <script>
       let map, infoWindow, marker, geocoder;

        function initMap(id = null) {
            if(id == null){
                div = "map";
                lat_inp = "lat";
                lng_inp = "lng";
                address_div = "address";
                city_div = "address-city";
            }else{
                div = "map_" + id;
                lat_inp = "lat_" + id;
                lng_inp = "lng_" + id;
                address_div = "address_" + id;
                city_div = "city_" + id;
            }

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
                    setGeoLocation(address_div, city_div);
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
                            setGeoLocation(address_div, city_div);
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
                setGeoLocation(address_div, city_div);

                //Listen for drag events!
                google.maps.event.addListener(marker, 'dragend', function(event){
                    var currentLocation = marker.getPosition();
                    $('#'+lat_inp).val(currentLocation.lat())
                    $('#'+lng_inp).val(currentLocation.lng())

                    setGeoLocation(address_div, city_div);
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
        $('.edit-btn').on('click', function(){
            target = $(this).attr('data-target');
            id = target.split('_')[1];

            initMap(id);
            $(target).modal('show');
        })

        $('.add-btn').on('click', function(){
            target = $(this).attr('data-target');

            initMap();
            $(target).modal('show');
        })

        $(document).ready(function (){
            $('.address_type_li').on('click', function (e) {
                // e.preventDefault();
                $('.address_type_li').find('.address_type').removeAttr('checked', false);
                $('.address_type_li').find('.component').removeClass('active_address_type');
                $(this).find('.address_type').attr('checked', true);
                $(this).find('.address_type').removeClass('add_type');
                $('#defaultValue').removeClass('add_type');
                $(this).find('.address_type').addClass('add_type');

                $(this).find('.component').addClass('active_address_type');
            });
        })

        $('.addressUpdate').on('click', function(e){
            e.preventDefault();
            let addressAs, address, name, zip, city, state, country, phone;

            // addressAs = $('.add_type').val();

            // name = $('#person_name').val();
            // zip = $('#zip_code').val();
            // state = $('#own_state').val();
            // country = $('#own_country').val();

            let id = $(this).attr('data-id');
            lat = $('#lat_' + id).val();
            lng = $('#lng_' + id).val();
            address = $('#address_' + id).val();
            city = $('#city_' + id).val();
            description = $('#address-desc_' + id).val();
            building = $('#building_' + id).val();
            phone = $('#phone_' + id).val();

            if (address != '' && city != '' && building != '' && phone != '' && lat != '' && lng != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('address-update')}}",
                    method: 'POST',
                    data: {
                        id : id,
                        // addressAs: addressAs,
                        address: address,
                        lat: lat,
                        lng: lng,
                        city: city,
                        description: description,
                        building: building,
                        phone: phone
                    },
                    success: function () {
                        toastr.success('{{\App\CPU\translate('Address Update Successfully')}}.');
                        location.reload();
                        // $('#name').val('');
                        // $('#link').val('');
                        // $('#icon').val('');
                        // $('#image-set').val('');

                    }
                });
            }else{
                toastr.error('{{\App\CPU\translate('* Input Fields Required')}}.');
            }

        });
    </script>
    <style>
        .modal-backdrop {
            z-index: 0 !important;
            display: none;
        }
    </style>
@endpush
