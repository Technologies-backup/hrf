
@extends('layouts.back-end.app-seller')
@section('title', \App\CPU\translate('Shop Edit'))
@push('css_or_js')
    <!-- Custom styles for this page -->
    <link href="{{asset('public/assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
     <!-- Custom styles for this page -->
     <link href="{{asset('public/assets/back-end/css/croppie.css')}}" rel="stylesheet">
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <style>
        .custom-map-control-button {
            margin-top: 10px;
            margin-left: 10px;
            background: white;
            border: 1px solid #ececec;
            padding: 5px 10px;
            color: #666666;
            font-size: 13px;
        }
    </style>
@endpush
@section('content')
    <!-- Content Row -->
    <div class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 mb-0 ">{{\App\CPU\translate('Edit Shop Info')}}</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('seller.shop.update',[$shop->id])}}" method="post"
                          style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">{{\App\CPU\translate('Shop Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{$shop->name}}" class="form-control" id="name"
                                            required>
                                </div>
                                <div class="form-group">
                                    <label for="name">{{\App\CPU\translate('Contact')}} <small class="text-danger">( * {{\App\CPU\translate('country_code_is_must')}} {{\App\CPU\translate('like_for_BD_880')}} )</small></label>
                                    <input type="number" name="contact" value="{{$shop->contact}}" class="form-control" id="name"
                                            required>
                                </div>
                                <div class="form-group">
                                    <label for="address">{{\App\CPU\translate('Address')}} <span class="text-danger">*</span></label>
                                    <div id="map" style="width:100%;height:200px;margin-bottom: 20px;"></div>
                                    <input type="hidden" name="lat" id="lat" value="{{($shop->lat == null)?"":$shop->lat}}">
                                    <input type="hidden" name="lng" id="lng" value="{{($shop->lng == null)?"":$shop->lng}}">
                                    <textarea type="text" rows="4" name="address" value="" class="form-control" id="address"
                                            required>{{$shop->address}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">{{\App\CPU\translate('Upload')}} {{\App\CPU\translate('image')}}</label>
                                    <div class="custom-file text-left">
                                        <input type="file" name="image" id="customFileUpload" class="custom-file-input"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label" for="customFileUpload">{{\App\CPU\translate('choose')}} {{\App\CPU\translate('file')}}</label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <img style="width: auto;border: 1px solid; border-radius: 10px; max-height:200px;" id="viewer"
                                    onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                    src="{{asset('storage/app/public/shop/'.$shop->image)}}" alt="Product thumbnail"/>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mt-2">
                                <div class="form-group">
                                    <div class="flex-start">
                                        <div for="name">{{\App\CPU\translate('Upload')}} {{\App\CPU\translate('Banner')}} </div>
                                        <div class="mx-1" for="ratio"><small style="color: red">{{\App\CPU\translate('Ratio')}} : ( 6:1 )</small></div>
                                    </div>
                                    <div class="custom-file text-left">
                                        <input type="file" name="banner" id="BannerUpload" class="custom-file-input"
                                               accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label" for="BannerUpload">{{\App\CPU\translate('choose')}} {{\App\CPU\translate('file')}}</label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <img style="width: auto; height:auto; border: 1px solid; border-radius: 10px; max-height:200px" id="viewerBanner"
                                         onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                         src="{{asset('storage/app/public/shop/banner/'.$shop->banner)}}" alt="Product thumbnail"/>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn_update">{{\App\CPU\translate('Update')}}</button>
                        <a class="btn btn-danger" href="{{route('seller.shop.view')}}">{{\App\CPU\translate('Cancel')}}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('script')
   <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readBannerURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewerBanner').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUpload").change(function () {
            readURL(this);
        });

        $("#BannerUpload").change(function () {
            readBannerURL(this);
        });
   </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{\App\CPU\Helpers::get_business_settings('google_maps_key')}}&callback=initMap"></script>
    <script>
       let map, infoWindow, marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 0, lng: 0 },
                zoom: 14,
                mapTypeControl: false
            });
            infoWindow = new google.maps.InfoWindow();

            if($('#lat').val() != ""){
                lat = parseFloat($('#lat').val());
                lng = parseFloat($('#lng').val());
                initialLocation = new google.maps.LatLng(lat, lng);

                map.setCenter(initialLocation);
                marker = new google.maps.Marker({position: initialLocation, map: map});
            }
            else if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                    $('#lat').val(position.coords.latitude)
                    $('#lng').val(position.coords.longitude)

                    map.setCenter(initialLocation);
                    marker = new google.maps.Marker({position: initialLocation, map: map});
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
                            $('#lat').val(position.coords.latitude)
                            $('#lng').val(position.coords.longitude)

                            marker.setMap(null);
                            marker = new google.maps.Marker({position: pos, map: map});
                            map.setCenter(pos);
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
                $('#lat').val(currentLocation.lat())
                $('#lng').val(currentLocation.lng())

                //Listen for drag events!
                google.maps.event.addListener(marker, 'dragend', function(event){
                    var currentLocation = marker.getPosition();
                    $('#lat').val(currentLocation.lat())
                    $('#lng').val(currentLocation.lng())
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
    </script>

@endpush
