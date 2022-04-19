<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ Session::get('direction') === 'rtl' ? 'rtl' :  'ltr'}}">
<head>
    <meta charset="utf-8">
    <title>
        Become A Seller | HRF Home
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180"
          href="{{asset('public/storage/app/public/company')}}/{{$web_config['fav_icon']->value}}">
    <link rel="icon" type="image/png" sizes="32x32"
          href="{{asset('public/storage/app/public/company')}}/{{$web_config['fav_icon']->value}}">

    <link rel="stylesheet" media="screen"
          href="{{asset('public/assets/front-end')}}/vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen"
          href="{{asset('public/assets/front-end')}}/vendor/tiny-slider/dist/tiny-slider.css"/>
    <link rel="stylesheet" media="screen"
          href="{{asset('public/assets/front-end')}}/vendor/drift-zoom/dist/drift-basic.min.css"/>
    <link rel="stylesheet" media="screen"
          href="{{asset('public/assets/front-end')}}/vendor/lightgallery.js/dist/css/lightgallery.min.css"/>
    <link rel="stylesheet" href="{{asset('public/assets/back-end')}}/css/toastr.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{asset('public/assets/front-end')}}/css/theme.min.css">
    <link rel="stylesheet" media="screen" href="{{asset('public/assets/front-end')}}/css/slick.css">
    <link rel="stylesheet" media="screen" href="{{asset('public/assets/front-end')}}/css/font-awesome.min.css">
    <!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="{{asset('public/assets/back-end')}}/css/toastr.css"/>
    <link rel="stylesheet" href="{{asset('public/assets/front-end')}}/css/master.css"/>

    @if (Session::get('direction') === "rtl")
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">


    @else
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Titillium+Web:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @endif

    <link rel="stylesheet" href="{{asset('public/assets/front-end')}}/css/home.css"/>
    <link rel="stylesheet" href="{{asset('public/assets/front-end')}}/css/responsive1.css"/>



    <link rel="stylesheet" media="screen" href="{{asset('public/assets/front-end')}}/css/theme.min.css">

    <link rel="stylesheet" href="{{asset('public/css/landing.css')}}"/>
    @stack('css')

    {{--dont touch this--}}
    <meta name="_token" content="{{csrf_token()}}">
    {{--dont touch this--}}
    <!--to make http ajax request to https-->
    <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->
    <style>
        .rtl {
            direction: {{ Session::get('direction') }};
        }

        .password-toggle-btn .password-toggle-indicator:hover {
            color: {{$web_config['primary_color']}};
        }

        .password-toggle-btn .custom-control-input:checked ~ .password-toggle-indicator {
            color: {{$web_config['secondary_color']}};
        }
    </style>
</head>
<!-- Body-->
<body>
    <!-- Page Content-->
    @yield('content')


    <footer class="page-footer font-small mdb-color pt-3 rtl">
        <!-- Footer Links -->
        <div class="container text-center" style="padding-bottom: 13px;">

            <!-- Footer links -->
            <div
                class="row text-center {{Session::get('direction') === "rtl" ? 'text-md-right' : 'text-md-left'}} mt-3 pb-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mt-3">
                    <div class="text-nowrap mb-4">
                        <a class="d-inline-block mt-n1" href="{{route('home')}}">
                            <img width="100%" style="height: 60px!important;"
                                 src="{{asset("storage/app/public/company/")}}/{{ $web_config['footer_logo']->value }}"
                                 onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                 alt="{{ $web_config['name']->value }}"/>
                        </a>
                    </div>
                    @php($social_media = \App\Model\SocialMedia::where('active_status', 1)->get())
                    @if(isset($social_media))
                        @foreach ($social_media as $item)
                            <span class="social-media">
                                    <a class="social-btn sb-light sb-{{$item->name}} {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} mb-2"
                                       target="_blank" href="{{$item->link}}">
                                        <i class="{{$item->icon}}" aria-hidden="true"></i>
                                    </a>
                                </span>
                        @endforeach
                    @endif

                    <div class="widget mb-4 for-margin">
                        @php($ios = \App\CPU\Helpers::get_business_settings('download_app_apple_stroe'))
                        @php($android = \App\CPU\Helpers::get_business_settings('download_app_google_stroe'))

                        @if($ios['status'] || $android['status'])
                            <h6 class="text-uppercase font-weight-bold footer-heder">
                                {{\App\CPU\translate('download_our_app')}}
                            </h6>
                        @endif


                        <div class="store-contents" style="display: flex;">
                            @if($ios['status'])
                                <div class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} mb-2">
                                    <a class="" href="{{ $ios['link'] }}" role="button"><img
                                            src="{{asset("public/assets/front-end/png/apple_app.png")}}"
                                            alt="" style="height: 40px!important;">
                                    </a>
                                </div>
                            @endif

                            @if($android['status'])
                                <div class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} mb-2">
                                    <a href="{{ $android['link'] }}" role="button">
                                        <img src="{{asset("public/assets/front-end/png/google_app.png")}}"
                                             alt="" style="height: 40px!important;">
                                    </a>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold footer-heder">{{\App\CPU\translate('special')}}</h6>
                    <ul class="widget-list" style="padding-bottom: 10px">
                        @php($flash_deals=\App\Model\FlashDeal::where(['status'=>1,'deal_type'=>'flash_deal'])->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first())
                        @if(isset($flash_deals))
                            <li class="widget-list-item">
                                <a class="widget-list-link"
                                   href="{{route('flash-deals',[$flash_deals['id']])}}">
                                    {{\App\CPU\translate('flash_deal')}}
                                </a>
                            </li>
                        @endif
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="{{route('products',['data_from'=>'featured','page'=>1])}}">{{\App\CPU\translate('featured_products')}}</a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="{{route('products',['data_from'=>'latest','page'=>1])}}">{{\App\CPU\translate('latest_products')}}</a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="{{route('products',['data_from'=>'best-selling','page'=>1])}}">{{\App\CPU\translate('best_selling_product')}}</a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="{{route('products',['data_from'=>'top-rated','page'=>1])}}">{{\App\CPU\translate('top_rated_product')}}</a>
                        </li>

                        {{-- <li class="widget-list-item"><a class="widget-list-link"
                                                        href="{{route('brands')}}">{{\App\CPU\translate('all_brand')}}</a>
                        </li> --}}
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="{{route('categories')}}">{{\App\CPU\translate('all_category')}}</a>
                        </li>

                    </ul>
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold footer-heder">{{\App\CPU\translate('account&shipping_info')}}</h6>
                    @if(auth('customer')->check())
                        <ul class="widget-list" style="padding-bottom: 10px">
                            <li class="widget-list-item"><a class="widget-list-link"
                                                            href="{{route('user-account')}}">{{\App\CPU\translate('profile_info')}}</a>
                            </li>
                            <li class="widget-list-item"><a class="widget-list-link"
                                                            href="{{route('wishlists')}}">{{\App\CPU\translate('wish_list')}}</a>
                            </li>
                            {{--<li class="widget-list-item">
                                <a class="widget-list-link"
                                   href="{{route('customer.auth.login')}}">{{\App\CPU\translate('chat_with_seller_s')}}
                                </a>
                            </li>--}}
                            <li class="widget-list-item"><a class="widget-list-link"
                                                            href="{{route('track-order.index')}}">{{\App\CPU\translate('track_order')}}</a>
                            </li>
                            <li class="widget-list-item"><a class="widget-list-link"
                                                            href="{{ route('account-address') }}">{{\App\CPU\translate('address')}}</a>
                            </li>
                            <li class="widget-list-item"><a class="widget-list-link"
                                                            href="{{ route('account-tickets') }}">{{\App\CPU\translate('support_ticket')}}</a>
                            </li>
                            {{--<li class="widget-list-item">
                                <a class="widget-list-link"
                                   href="{{route('customer.auth.login')}}">{{\App\CPU\translate('tansction_history')}}
                                </a>
                            </li>--}}
                        </ul>
                    @else
                        <ul class="widget-list" style="padding-bottom: 10px">
                            <li class="widget-list-item"><a class="widget-list-link"
                                                            href="{{route('customer.auth.login')}}">{{\App\CPU\translate('profile_info')}}</a>
                            </li>
                            <li class="widget-list-item"><a class="widget-list-link"
                                                            href="{{route('customer.auth.login')}}">{{\App\CPU\translate('wish_list')}}</a>
                            </li>
                            {{--<li class="widget-list-item">
                                <a class="widget-list-link"
                                   href="{{route('customer.auth.login')}}">{{\App\CPU\translate('chat_with_seller_s')}}
                                </a>
                            </li>--}}
                            <li class="widget-list-item"><a class="widget-list-link"
                                                            href="{{route('track-order.index')}}">{{\App\CPU\translate('track_order')}}</a>
                            </li>
                            <li class="widget-list-item"><a class="widget-list-link"
                                                            href="{{route('customer.auth.login')}}">{{\App\CPU\translate('address')}}</a>
                            </li>
                            <li class="widget-list-item"><a class="widget-list-link"
                                                            href="{{route('customer.auth.login')}}">{{\App\CPU\translate('support_ticket')}}</a>
                            </li>
                            {{--to do--}}
                            {{--<li class="widget-list-item">
                                <a class="widget-list-link"
                                   href="{{route('customer.auth.login')}}">{{\App\CPU\translate('tansction_history')}}
                                </a>
                            </li>--}}
                        </ul>
                    @endif
                </div>

                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold footer-heder">{{\App\CPU\translate('about_us')}}</h6>


                    <ul class="widget-list" style="padding-bottom: 10px">
                        {{-- <p class="widget-list-item">{!! substr($web_config['about']->value,0,100) !!}</p> --}}
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="{{route('about-us')}}">{{\App\CPU\translate('about_company')}}</a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="{{route('helpTopic')}}">{{\App\CPU\translate('faq')}}</a></li>
                        <li class="widget-list-item "><a class="widget-list-link"
                                                         href="{{route('terms')}}">{{\App\CPU\translate('terms_&_conditions')}}</a>

                        </li>

                        <li class="widget-list-item ">
                            <a class="widget-list-link" href="{{route('privacy-policy')}}">
                                {{\App\CPU\translate('privacy_policy')}}
                            </a>
                        </li>
                        <li class="widget-list-item "><a class="widget-list-link"
                                                         href="{{route('contacts')}}">{{\App\CPU\translate('contact_us')}}</a>

                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Footer links -->
        </div>

        <hr>
        <!-- Grid row -->
        <div class="container text-center">
            <div class="row d-flex align-items-center footer-end">
                <div class="col-md-12 mt-3">
                    <p class="text-center" style="font-size: 12px;">{{ $web_config['copyright_text']->value }}</p>
                </div>
            </div>
            <!-- Grid row -->
        </div>
        <!-- Footer Links -->
    </footer>
    <!-- Footer -->
    <!-- Vendor scrits: js libraries and plugins-->
    {{--<script src="{{asset('public/assets/front-end')}}/vendor/jquery/dist/jquery.slim.min.js"></script>--}}
    <script src="{{asset('public/assets/front-end')}}/vendor/jquery/dist/jquery-2.2.4.min.js"></script>
    <script src="{{asset('public/assets/front-end')}}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script
        src="{{asset('public/assets/front-end')}}/vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="{{asset('public/assets/front-end')}}/vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="{{asset('public/assets/front-end')}}/vendor/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="{{asset('public/assets/front-end')}}/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <script src="{{asset('public/assets/front-end')}}/vendor/drift-zoom/dist/Drift.min.js"></script>
    <script src="{{asset('public/assets/front-end')}}/vendor/lightgallery.js/dist/js/lightgallery.min.js"></script>
    <script src="{{asset('public/assets/front-end')}}/vendor/lg-video.js/dist/lg-video.min.js"></script>
    {{--Toastr--}}
    <script src={{asset("public/assets/back-end/js/toastr.js")}}></script>
    <!-- Main theme script-->
    <script src="{{asset('public/assets/front-end')}}/js/theme.min.js"></script>
    <script src="{{asset('public/assets/front-end')}}/js/slick.min.js"></script>

    <script src="{{asset('public/assets/front-end')}}/js/sweet_alert.js"></script>
    {{--Toastr--}}
    <script src={{asset("public/assets/back-end/js/toastr.js")}}></script>
    {!! Toastr::message() !!}

    <script>
        $(document).ready(function () {
            $('.client-single').on('click', function (event) {
                event.preventDefault();

                var active = $(this).hasClass('active');

                var parent = $(this).parents('.testi-wrap');

                if (!active) {
                var activeBlock = parent.find('.client-single.active');

                var currentPos = $(this).attr('data-position');

                var newPos = activeBlock.attr('data-position');

                activeBlock.removeClass('active').removeClass(newPos).addClass('inactive').addClass(currentPos);
                activeBlock.attr('data-position', currentPos);

                $(this).addClass('active').removeClass('inactive').removeClass(currentPos).addClass(newPos);
                $(this).attr('data-position', newPos);

                }
            });

        }(jQuery));
    </script>
    @stack('js')

</body>

</html>
