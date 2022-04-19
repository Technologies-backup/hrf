@extends('layouts.front-end.landing-app')
@php($lang = str_replace('_', '-', app()->getLocale()))

@push('css')
<link rel="stylesheet" href="{{ asset('public/css/IntlTelInput/intlTelInput.min.css') }}" defer>
<style>
    .iti{
        width: 100%;
    }
</style>
@endpush

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
    <div class="container">
        <a class="navbar-brand" href="#">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" width="60px" height="60px" viewBox="0 0 100 100" enable-background="new 0 0 100 100"
                xml:space="preserve">
                <g>
                    <path fill="#FF6C0C" d="M59.251,76.505l-0.007-0.015h-5.892L43.086,61.016c-0.015,0-0.033,0-0.048,0l-5.742-8.955v8.938v1.148
		c0,4.757-4.397,7.974-9.59,7.974V37.366H8.735v8.684c0,5.265-3.423,9.533-8.688,9.533v38.191c0,3.438,2.788,6.226,6.225,6.226
		h60.26V76.505H59.251z" />
                    <path fill="#FF6C0C" d="M93.728,0.096h-56.62V28.81h11.679c2.22,0,4.298,0.424,6.236,1.272c1.937,0.849,3.633,2.002,5.094,3.46
		c1.458,1.46,2.609,3.178,3.46,5.158c0.849,1.981,1.272,4.081,1.272,6.301c0,3.265-0.86,6.182-2.579,8.749
		c-1.72,2.569-3.949,4.484-6.691,5.746c-0.54,0.247-1.059,0.459-1.558,0.636l5.28,7.885h7.232V52.23c0-2.285,1.854-4.138,4.14-4.138
		h29.279V6.321C99.952,2.883,97.166,0.096,93.728,0.096" />
                    <path fill="#FF6C0C" d="M37.107,0c-0.454,0-0.899,0.034-1.336,0.096h1.336V0z" />
                    <path fill="#201747" d="M70.673,48.092c-2.286,0-4.138,1.853-4.138,4.138v15.786H59.3l-5.279-7.884
		c0.499-0.178,1.018-0.39,1.558-0.636c2.742-1.263,4.972-3.178,6.691-5.747c1.719-2.567,2.579-5.484,2.579-8.748
		c0-2.221-0.424-4.32-1.272-6.301c-0.851-1.98-2.002-3.699-3.46-5.159c-1.461-1.458-3.157-2.611-5.094-3.46
		c-1.938-0.849-4.016-1.273-6.236-1.273H37.107V0h0c-5.192,0-9.401,4.209-9.401,9.402v19.477H8.735V12.958L0.048,23.619v31.963
		c5.265,0,8.687-4.268,8.687-9.532v-8.684h18.971V70.12c5.192,0,9.59-3.217,9.59-7.974v-1.148v-8.938l5.742,8.955
		c0.016,0,0.033,0,0.049,0L53.352,76.49h5.893l0.007,0.015h7.284V100c5.083,0,9.205-4.121,9.205-9.206V76.505h8.463l6.679-8.488
		H75.74V56.608h16.44c4.292,0,7.771-4.224,7.771-8.516H70.673z M48.787,51.856H37.296v-0.125v-0.064V37.366h11.491
		c0.958,0,1.861,0.199,2.71,0.599c0.849,0.399,1.588,0.935,2.22,1.606c0.63,0.672,1.132,1.439,1.501,2.3
		c0.37,0.861,0.555,1.753,0.555,2.677c0,2.226-0.675,4.001-2.023,5.324C52.399,51.195,50.745,51.856,48.787,51.856" />
                </g>
            </svg>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto text-center text-lg-start">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">{{ __('landing.menu1') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">{{ __('landing.menu2') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">{{ __('landing.menu3') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#process">{{ __('landing.menu4') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonials">{{ __('landing.menu5') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('lang', [($lang == "en")?"ae":"en"])}}" class="d-inline-flex px-4 btn-main nav-link py-2 mt-2 btn btn-outline-primary text-decoration-none mx-2">
                        {{ __('landing.langchange') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('seller.auth.login')}}" class="d-inline-flex px-4 btn-main nav-link py-2 mt-2 btn btn-outline-primary text-decoration-none mx-2">
                        {{ __('landing.login') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
    <section class="container-fluid">
        <section class="row row-cols-1 row-cols-lg-2 hero align-items-center">
            <div class="col order-1">
                <h1 class="display-3 fw-bold {{Session::get('direction') === "rtl" ? '' : 'lh-1'}}  mb-4 mt-4 mt-md-0">
                    {{ __('landing.s1_title1') }}
                    <br /> {{ __('landing.s1_title2') }}
                </h1>
                <p class="fs-4 me-0 pe-0 me-md-5 pe-md-5 ms-md-0 ps-md-0">
                    {{ __('landing.s1_description') }}
                </p>
                <div class="mt-5">
                    <p class="fw-bold mb-3 text-dark"><bdi>{{ __('landing.s1_downloadtext') }}</bdi></p>
                    <a href="https://play.google.com/store/apps/details?id=com.hrf.seller" target="_blank" class="{{Session::get('direction') === "rtl" ? 'ms-2 me-0' : 'ms-0 me-2'}} px-3 py-4 btn-download rounded-custom">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" width="145px" height="50px" viewBox="0 0 145 50"
                            enable-background="new 0 0 145 50" xml:space="preserve">
                            <g>
                                <path fill="#6C757D" d="M50.002,14.036c0,0.937-0.277,1.683-0.833,2.239c-0.631,0.662-1.454,0.993-2.464,0.993
        c-0.968,0-1.792-0.335-2.469-1.007c-0.678-0.671-1.017-1.504-1.017-2.497c0-0.994,0.339-1.826,1.017-2.497
        c0.677-0.671,1.5-1.007,2.469-1.007c0.48,0,0.94,0.094,1.377,0.281c0.437,0.188,0.787,0.438,1.049,0.75l-0.589,0.59
        c-0.444-0.531-1.056-0.796-1.836-0.796c-0.707,0-1.317,0.248-1.832,0.745c-0.516,0.497-0.773,1.142-0.773,1.935
        c0,0.793,0.257,1.438,0.773,1.935c0.515,0.497,1.125,0.745,1.832,0.745c0.749,0,1.374-0.25,1.874-0.749
        c0.324-0.325,0.512-0.778,0.563-1.358h-2.436V13.53h3.25C49.986,13.705,50.002,13.874,50.002,14.036z" />
                                <path fill="#6C757D"
                                    d="M55.155,11.234H52.1v2.127h2.755v0.806H52.1v2.127h3.055v0.824h-3.917V10.41h3.917V11.234z" />
                                <path fill="#6C757D"
                                    d="M58.79,17.118h-0.863v-5.884h-1.874V10.41h4.61v0.824H58.79V17.118z" />
                                <path fill="#6C757D" d="M63.999,17.118V10.41h0.861v6.708H63.999z" />
                                <path fill="#6C757D"
                                    d="M68.684,17.118h-0.863v-5.884h-1.874V10.41h4.61v0.824h-1.874V17.118z" />
                                <path fill="#6C757D" d="M79.284,16.251c-0.66,0.678-1.479,1.017-2.46,1.017s-1.801-0.339-2.459-1.017
        c-0.659-0.678-0.988-1.507-0.988-2.487s0.329-1.81,0.988-2.487c0.658-0.678,1.479-1.017,2.459-1.017
        c0.975,0,1.793,0.341,2.455,1.021s0.993,1.508,0.993,2.483C80.272,14.745,79.942,15.574,79.284,16.251z M75.002,15.689
        c0.497,0.503,1.104,0.754,1.822,0.754c0.718,0,1.326-0.251,1.822-0.754c0.496-0.502,0.745-1.145,0.745-1.925
        s-0.249-1.423-0.745-1.925c-0.496-0.503-1.104-0.754-1.822-0.754c-0.719,0-1.325,0.251-1.822,0.754
        c-0.496,0.502-0.745,1.145-0.745,1.925S74.506,15.187,75.002,15.689z" />
                                <path fill="#6C757D" d="M81.481,17.118V10.41h1.05l3.26,5.218h0.037l-0.037-1.292V10.41h0.862v6.708h-0.899l-3.411-5.471h-0.037
        l0.037,1.293v4.178H81.481z" />
                                <path fill="#6C757D" d="M73.164,26.903c-2.629,0-4.772,1.999-4.772,4.755c0,2.737,2.143,4.755,4.772,4.755
        c2.631,0,4.773-2.018,4.773-4.755C77.938,28.902,75.795,26.903,73.164,26.903z M73.164,34.539c-1.44,0-2.684-1.188-2.684-2.881
        c0-1.711,1.243-2.882,2.684-2.882c1.441,0,2.684,1.171,2.684,2.882C75.848,33.352,74.605,34.539,73.164,34.539z M62.751,26.903
        c-2.629,0-4.773,1.999-4.773,4.755c0,2.737,2.144,4.755,4.773,4.755c2.63,0,4.773-2.018,4.773-4.755
        C67.525,28.902,65.382,26.903,62.751,26.903z M62.751,34.539c-1.44,0-2.684-1.188-2.684-2.881c0-1.711,1.243-2.882,2.684-2.882
        c1.441,0,2.684,1.171,2.684,2.882C65.435,33.352,64.193,34.539,62.751,34.539z M50.365,28.361v2.019h4.828
        c-0.144,1.134-0.522,1.963-1.099,2.539c-0.702,0.702-1.801,1.477-3.729,1.477c-2.972,0-5.295-2.396-5.295-5.368
        c0-2.971,2.323-5.367,5.295-5.367c1.604,0,2.774,0.63,3.639,1.441l1.423-1.423c-1.207-1.152-2.81-2.035-5.062-2.035
        c-4.071,0-7.493,3.314-7.493,7.384c0,4.07,3.422,7.386,7.493,7.386c2.197,0,3.855-0.721,5.151-2.071
        c1.333-1.333,1.748-3.207,1.748-4.72c0-0.468-0.036-0.9-0.108-1.261H50.365z M101.021,29.929c-0.396-1.063-1.603-3.025-4.07-3.025
        c-2.449,0-4.484,1.927-4.484,4.755c0,2.665,2.018,4.755,4.719,4.755c2.179,0,3.44-1.332,3.963-2.107l-1.621-1.081
        c-0.541,0.793-1.278,1.314-2.342,1.314c-1.063,0-1.819-0.485-2.305-1.441l6.357-2.629L101.021,29.929z M94.537,31.514
        c-0.054-1.837,1.423-2.774,2.485-2.774c0.829,0,1.531,0.415,1.766,1.009L94.537,31.514z M89.368,36.125h2.089V22.148h-2.089
        V36.125z M85.945,27.966h-0.072c-0.469-0.559-1.369-1.063-2.504-1.063c-2.378,0-4.557,2.09-4.557,4.773
        c0,2.665,2.179,4.736,4.557,4.736c1.135,0,2.035-0.505,2.504-1.081h0.072v0.685c0,1.82-0.973,2.792-2.54,2.792
        c-1.278,0-2.071-0.919-2.396-1.692l-1.818,0.755c0.521,1.262,1.908,2.811,4.214,2.811c2.45,0,4.521-1.441,4.521-4.953v-8.537
        h-1.981V27.966z M83.55,34.539c-1.441,0-2.647-1.206-2.647-2.862c0-1.676,1.206-2.9,2.647-2.9c1.423,0,2.539,1.225,2.539,2.9
        C86.089,33.333,84.973,34.539,83.55,34.539z M110.808,22.148h-4.998v13.977h2.086v-5.296h2.912c2.313,0,4.586-1.674,4.586-4.341
        C115.394,23.822,113.12,22.148,110.808,22.148z M110.862,28.884h-2.967v-4.791h2.967c1.56,0,2.445,1.291,2.445,2.395
        C113.308,27.571,112.422,28.884,110.862,28.884z M123.755,26.877c-1.51,0-3.074,0.666-3.722,2.14l1.852,0.773
        c0.395-0.773,1.133-1.024,1.906-1.024c1.078,0,2.176,0.646,2.193,1.797v0.145c-0.378-0.216-1.187-0.539-2.176-0.539
        c-1.996,0-4.028,1.096-4.028,3.146c0,1.87,1.637,3.074,3.472,3.074c1.401,0,2.176-0.629,2.66-1.367h0.072v1.08h2.015v-5.358
        C127.999,28.262,126.146,26.877,123.755,26.877z M123.503,34.537c-0.683,0-1.636-0.342-1.636-1.187
        c0-1.079,1.187-1.493,2.212-1.493c0.916,0,1.349,0.198,1.905,0.468C125.822,33.62,124.708,34.537,123.503,34.537z M135.335,27.183
        l-2.392,6.06h-0.072l-2.481-6.06h-2.247l3.723,8.47l-2.123,4.711h2.176l5.736-13.181H135.335z M116.545,36.125h2.085V22.148
        h-2.085V36.125z" />
                                <path fill="#6C757D"
                                    d="M8.749,10.947c-0.033,0.011-0.056,0.033-0.089,0.067l0.078-0.078L8.749,10.947z" />
                                <path fill="#6C757D" d="M22.03,24.911L8.424,38.572c-0.19-0.323-0.291-0.749-0.291-1.262V12.579c0-0.503,0.101-0.906,0.279-1.23
        L22.03,24.911z" />
                                <path fill="#6C757D"
                                    d="M26.995,29.854l-16.021,9.099c-0.771,0.438-1.487,0.471-1.99,0.169l13.606-13.663L26.995,29.854z" />
                                <path fill="#6C757D"
                                    d="M22.589,24.352L8.961,10.779c0.514-0.324,1.23-0.28,2.012,0.167l15.932,9.056L22.589,24.352z" />
                                <path fill="#6C757D" d="M32.774,26.565l-5.064,2.884l-4.562-4.55l4.472-4.494l5.154,2.929
        C34.34,24.218,34.34,25.671,32.774,26.565z" />
                            </g>
                        </svg>

                    </a>
                    <a href="https://apps.apple.com/us/app/hrf-vendors/id1602468442" target="_blank" class="{{Session::get('direction') === "rtl" ? 'ms-2 me-0' : 'ms-0 me-2'}} px-3 py-4 btn-download rounded-custom">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" width="145px" height="50px" viewBox="0 0 145 50"
                            enable-background="new 0 0 145 50" xml:space="preserve">
                            <g>
                                <path id="_Path_" fill="#6C757D" d="M27.622,24.608c0.028-2.209,1.186-4.248,3.067-5.404c-1.192-1.703-3.117-2.744-5.194-2.809
              c-2.186-0.23-4.304,1.309-5.418,1.309c-1.135,0-2.85-1.285-4.696-1.248c-2.429,0.08-4.639,1.428-5.821,3.551
              c-2.517,4.357-0.64,10.764,1.771,14.285c1.207,1.725,2.616,3.65,4.461,3.584c1.806-0.076,2.48-1.152,4.659-1.152
              c2.159,0,2.791,1.152,4.673,1.107c1.937-0.031,3.158-1.73,4.322-3.473c0.867-1.23,1.534-2.588,1.976-4.025
              C29.12,29.36,27.625,27.106,27.622,24.608z" />
                                <path id="_Path_2" fill="#6C757D" d="M24.066,14.079c1.057-1.268,1.577-2.898,1.451-4.543c-1.614,0.17-3.104,0.941-4.175,2.16
              c-1.057,1.203-1.592,2.777-1.489,4.375C21.489,16.089,23.042,15.354,24.066,14.079z" />
                                <path fill="#6C757D" d="M50.442,33.509H44.28l-1.479,4.369h-2.608l5.834-16.162h2.713l5.833,16.162h-2.653L50.442,33.509z
             M44.918,31.493h4.884l-2.408-7.09h-0.066L44.918,31.493z" />
                                <path fill="#6C757D" d="M67.175,31.985c0,3.662-1.958,6.016-4.918,6.016c-1.527,0.08-2.968-0.721-3.706-2.063h-0.056v5.836
            h-2.42V26.093h2.341v1.961h0.046c0.771-1.334,2.213-2.133,3.752-2.084C65.203,25.97,67.175,28.335,67.175,31.985z
             M64.689,31.985c0-2.385-1.232-3.953-3.113-3.953c-1.849,0-3.092,1.602-3.092,3.953c0,2.375,1.243,3.965,3.092,3.965
            C63.457,35.95,64.689,34.394,64.689,31.985z" />
                                <path fill="#6C757D" d="M80.146,31.985c0,3.662-1.961,6.016-4.92,6.016c-1.527,0.08-2.967-0.721-3.706-2.063h-0.057v5.836h-2.42
            V26.093h2.342v1.961h0.045c0.77-1.334,2.211-2.133,3.752-2.084C78.174,25.97,80.146,28.335,80.146,31.985z M77.66,31.985
            c0-2.385-1.234-3.953-3.115-3.953c-1.848,0-3.09,1.602-3.09,3.953c0,2.375,1.242,3.965,3.09,3.965
            C76.426,35.95,77.66,34.394,77.66,31.985L77.66,31.985z" />
                                <path fill="#6C757D" d="M88.717,33.374c0.178,1.604,1.736,2.654,3.865,2.654c2.037,0,3.504-1.051,3.504-2.496
            c0-1.256-0.885-2.006-2.979-2.521l-2.096-0.504c-2.969-0.717-4.346-2.105-4.346-4.357c0-2.789,2.43-4.703,5.883-4.703
            c3.414,0,5.754,1.914,5.834,4.703h-2.441c-0.146-1.613-1.479-2.586-3.43-2.586c-1.947,0-3.281,0.984-3.281,2.418
            c0,1.143,0.852,1.814,2.936,2.33l1.779,0.438c3.318,0.783,4.695,2.115,4.695,4.48c0,3.023-2.41,4.916-6.24,4.916
            c-3.584,0-6.004-1.848-6.158-4.771H88.717z" />
                                <path fill="#6C757D" d="M103.859,23.306v2.787h2.242v1.916h-2.242v6.496c0,1.01,0.451,1.48,1.434,1.48
            c0.268-0.004,0.533-0.025,0.797-0.057v1.904c-0.443,0.082-0.893,0.121-1.342,0.111c-2.389,0-3.318-0.896-3.318-3.182v-6.754
            h-1.713v-1.916h1.713v-2.787H103.859z" />
                                <path fill="#6C757D" d="M107.398,31.985c0-3.707,2.184-6.037,5.59-6.037c3.416,0,5.59,2.33,5.59,6.037
            c0,3.719-2.164,6.037-5.59,6.037S107.398,35.704,107.398,31.985z M116.113,31.985c0-2.543-1.166-4.043-3.125-4.043
            s-3.125,1.512-3.125,4.043c0,2.555,1.166,4.043,3.125,4.043S116.113,34.54,116.113,31.985L116.113,31.985z" />
                                <path fill="#6C757D" d="M120.57,26.093h2.309v2.006h0.057c0.32-1.291,1.504-2.18,2.834-2.129c0.277,0,0.557,0.029,0.828,0.09
            v2.264c-0.354-0.107-0.719-0.156-1.088-0.146c-1.344-0.055-2.479,0.992-2.533,2.336c-0.004,0.125,0,0.25,0.014,0.375v6.99h-2.42
            V26.093z" />
                                <path fill="#6C757D" d="M137.75,34.417c-0.326,2.139-2.41,3.605-5.074,3.605c-3.43,0-5.557-2.297-5.557-5.98
            c0-3.695,2.141-6.094,5.455-6.094c3.26,0,5.311,2.24,5.311,5.813v0.828h-8.322v0.146c-0.15,1.689,1.098,3.18,2.785,3.328
            c0.127,0.012,0.256,0.014,0.385,0.01c1.172,0.111,2.279-0.564,2.719-1.656H137.75z M129.572,30.899h5.893
            c0.086-1.564-1.109-2.9-2.672-2.986c-0.074-0.004-0.146-0.006-0.219-0.004c-1.646-0.012-2.992,1.318-3.002,2.965
            C129.572,30.882,129.572,30.892,129.572,30.899z" />
                                <path fill="#6C757D"
                                    d="M44.616,9.55c1.893-0.135,3.536,1.287,3.673,3.18c0.015,0.227,0.01,0.455-0.02,0.68
          c0,2.48-1.341,3.906-3.654,3.906h-2.805V9.55H44.616z M43.017,16.218h1.464c1.346,0.08,2.502-0.945,2.583-2.291
          c0.01-0.168,0.002-0.336-0.021-0.502c0.184-1.34-0.754-2.574-2.093-2.758c-0.155-0.021-0.312-0.029-0.468-0.02h-1.464V16.218z" />
                                <path fill="#6C757D" d="M49.632,14.382c-0.146-1.525,0.973-2.881,2.501-3.027c1.524-0.146,2.881,0.973,3.027,2.5
          c0.017,0.176,0.017,0.354,0,0.527c0.148,1.527-0.969,2.887-2.494,3.033c-1.527,0.148-2.885-0.967-3.034-2.494
          C49.616,14.743,49.616,14.562,49.632,14.382z M53.97,14.382c0-1.27-0.57-2.012-1.571-2.012c-1.006,0-1.571,0.742-1.571,2.012
          c0,1.281,0.565,2.02,1.571,2.02C53.399,16.401,53.97,15.659,53.97,14.382L53.97,14.382z" />
                                <path fill="#6C757D" d="M62.508,17.315h-1.2l-1.211-4.316h-0.092l-1.206,4.316H57.61l-1.615-5.859h1.173l1.05,4.471h0.087
          l1.204-4.471h1.11l1.204,4.471h0.092l1.045-4.471h1.157L62.508,17.315z" />
                                <path fill="#6C757D" d="M65.476,11.456h1.113v0.93h0.086c0.299-0.686,1.002-1.104,1.748-1.043
          c1.051-0.08,1.965,0.707,2.045,1.758c0.01,0.141,0.004,0.281-0.016,0.422v3.793h-1.156v-3.504c0-0.941-0.411-1.408-1.266-1.408
          c-0.74-0.035-1.371,0.537-1.404,1.279c-0.004,0.068-0.002,0.137,0.006,0.205v3.428h-1.156V11.456z" />
                                <path fill="#6C757D" d="M72.296,9.167h1.157v8.148h-1.157V9.167z" />
                                <path fill="#6C757D" d="M75.061,14.382c-0.146-1.525,0.973-2.883,2.5-3.027c1.525-0.146,2.883,0.973,3.027,2.5
          c0.018,0.176,0.018,0.354,0,0.527c0.15,1.527-0.969,2.887-2.494,3.033c-1.527,0.148-2.885-0.969-3.033-2.494
          C75.043,14.743,75.043,14.562,75.061,14.382z M79.398,14.382c0-1.27-0.57-2.012-1.572-2.012c-1.006,0-1.57,0.742-1.57,2.012
          c0,1.281,0.564,2.02,1.57,2.02C78.828,16.401,79.398,15.659,79.398,14.382z" />
                                <path fill="#6C757D" d="M81.805,15.659c0-1.055,0.787-1.664,2.182-1.75l1.586-0.092v-0.506c0-0.619-0.408-0.969-1.199-0.969
          c-0.646,0-1.094,0.238-1.221,0.652h-1.121c0.119-1.008,1.066-1.652,2.395-1.652c1.471,0,2.299,0.73,2.299,1.969v4.004h-1.113
          v-0.822H85.52c-0.377,0.6-1.051,0.953-1.76,0.92c-0.973,0.1-1.842-0.605-1.943-1.578C81.809,15.776,81.805,15.718,81.805,15.659z
           M85.572,15.157v-0.49l-1.43,0.092c-0.807,0.055-1.172,0.33-1.172,0.846c0,0.527,0.457,0.834,1.084,0.834
          c0.76,0.076,1.438-0.477,1.516-1.234C85.57,15.188,85.572,15.173,85.572,15.157z" />
                                <path fill="#6C757D" d="M88.244,14.382c0-1.852,0.953-3.023,2.434-3.023c0.748-0.035,1.449,0.365,1.797,1.027h0.086V9.167h1.156
          v8.148h-1.107V16.39h-0.092c-0.375,0.656-1.084,1.051-1.84,1.023C89.188,17.413,88.244,16.239,88.244,14.382z M89.439,14.382
          c0,1.244,0.588,1.992,1.566,1.992c0.975,0,1.578-0.758,1.578-1.986c0-1.221-0.611-1.99-1.578-1.99
          C90.031,12.397,89.439,13.149,89.439,14.382L89.439,14.382z" />
                                <path fill="#6C757D" d="M98.504,14.382c-0.146-1.525,0.973-2.881,2.498-3.027c1.527-0.146,2.883,0.973,3.027,2.5
          c0.02,0.176,0.02,0.354,0,0.527c0.15,1.527-0.967,2.887-2.492,3.033c-1.527,0.148-2.885-0.967-3.033-2.494
          C98.486,14.743,98.486,14.562,98.504,14.382z M102.84,14.382c0-1.27-0.568-2.012-1.57-2.012c-1.006,0-1.57,0.742-1.57,2.012
          c0,1.281,0.564,2.02,1.57,2.02C102.271,16.401,102.84,15.659,102.84,14.382z" />
                                <path fill="#6C757D" d="M105.584,11.456h1.113v0.93h0.086c0.301-0.686,1.002-1.104,1.748-1.043
          c1.051-0.08,1.967,0.707,2.045,1.758c0.01,0.141,0.004,0.281-0.016,0.422v3.793h-1.156v-3.504c0-0.941-0.41-1.408-1.266-1.408
          c-0.742-0.035-1.371,0.537-1.406,1.279c-0.002,0.068,0,0.137,0.008,0.205v3.428h-1.156V11.456z" />
                                <path fill="#6C757D" d="M117.096,9.997v1.484h1.27v0.975h-1.27v3.014c0,0.613,0.252,0.883,0.83,0.883
          c0.146-0.002,0.293-0.01,0.439-0.027v0.965c-0.207,0.037-0.418,0.057-0.629,0.059c-1.285,0-1.799-0.453-1.799-1.584v-3.309
          h-0.932v-0.975h0.932V9.997H117.096z" />
                                <path fill="#6C757D" d="M119.945,9.167h1.146v3.23h0.092c0.314-0.691,1.029-1.111,1.787-1.051
          c1.064-0.059,1.975,0.758,2.033,1.824c0.006,0.119,0,0.24-0.016,0.361v3.783h-1.158v-3.498c0-0.936-0.436-1.41-1.254-1.41
          c-0.752-0.063-1.412,0.498-1.475,1.252c-0.008,0.078-0.008,0.156,0,0.234v3.422h-1.156V9.167z" />
                                <path fill="#6C757D" d="M131.732,15.733c-0.324,1.105-1.395,1.818-2.539,1.695c-1.471,0.039-2.693-1.121-2.732-2.592
          c-0.002-0.145,0.006-0.289,0.025-0.434c-0.199-1.479,0.84-2.84,2.32-3.037c0.125-0.018,0.254-0.025,0.381-0.023
          c1.631,0,2.613,1.113,2.613,2.953V14.7h-4.137v0.064c-0.072,0.852,0.561,1.602,1.412,1.674c0.051,0.004,0.1,0.006,0.148,0.006
          c0.566,0.066,1.117-0.213,1.395-0.711H131.732z M127.664,13.845h2.961c0.057-0.779-0.527-1.457-1.307-1.516
          c-0.047-0.004-0.092-0.004-0.137-0.004c-0.828-0.01-1.508,0.652-1.518,1.482C127.664,13.819,127.664,13.833,127.664,13.845
          L127.664,13.845z" />
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col {{Session::get('direction') === "rtl" ? 'order-2 order-md-1' : 'order-2 order-md-2'}}">
                <form class="user" id="seller-form" novalidate action="{{route('shop.apply')}}" method="post" enctype="multipart/form-data" onsubmit="return sellerSubmit(this);">
                    @csrf
                    <h3 class="fw-bold lh-1 mb-2 mt-5 mt-lg-0 mb-4 fs-5">
                        <bdi>
                            {{\App\CPU\translate('Becom A Seller')}} {{ __('landing.at') }} {{ __('landing.s9_title2') }}
                        </bdi>
                    </h3>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="exampleFirstName" name="f_name" value="{{old('f_name')}}" placeholder="{{\App\CPU\translate('first_name')}}" required>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="exampleLastName" name="l_name" value="{{old('l_name')}}" placeholder="{{\App\CPU\translate('last_name')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" value="{{old('email')}}" placeholder="{{\App\CPU\translate('email_address')}}" autocomplete="new-email" required>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="tel" class="form-control form-control-user" id="exampleInputPhone" name="phone" value="{{old('phone')}}" placeholder="{{\App\CPU\translate('phone_number')}}" required>
                            <input type="hidden" name="s_phone" id="s_phone">
                            <input type="hidden" name="is_verified" id="is_verified">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" minlength="6" id="exampleInputPassword1" name="password" autocomplete="new-password" placeholder="{{\App\CPU\translate('password')}}" required>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" minlength="6" id="exampleInputPassword2" placeholder="{{\App\CPU\translate('repeat_password')}}" name="password2" required>
                            <div class="pass invalid-feedback">{{\App\CPU\translate('Repeat')}}  {{\App\CPU\translate('password')}} {{\App\CPU\translate('not match')}} .</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="shop_name" name="shop_name" placeholder="{{\App\CPU\translate('shop_name')}}" value="{{old('shop_name')}}"required>
                        </div>
                        <div class="col-sm-6">
                            <textarea name="shop_address" class="form-control" id="shop_address"rows="1" placeholder="{{\App\CPU\translate('shop_address')}}" required>{{old('shop_address')}}</textarea>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <div class="custom-file" style="text-align: left">
                                <input type="file" name="logo" id="LogoUpload" class="custom-file-input"
                                    accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <label class="custom-file-label" for="LogoUpload">{{\App\CPU\translate('Upload')}} {{\App\CPU\translate('logo')}}</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block" id="apply">{{\App\CPU\translate('Apply')}} {{ __('landing.Now')}} </button>
                </form>
            </div>
        </section>
    </section>

    <div class="bg-left d-none d-md-block">
        <img src="{{asset('public/images/landing/bg-left.png')}}" alt="" width="350" height="auto">
    </div>
    <section class="container-fluid py-2 py-md-5" id="about">
        <section class="row section-wrapper align-items-center py-2">
            <div class="col-12 col-md-7 order-2 order-md-1">
                <p class=" fw-normal h6 text-uppercase text-white bg-primary d-inline-flex px-3 py-1  {{Session::get('direction') === "rtl" ? 'order-1' : 'ta'}}"><bdi>{{ __('landing.s2_titlesmall') }}</bdi></p>
                <h2 class="mt-1 display-4 fw-bold mb-4 ">
                    {{ __('landing.s2_title1') }}<br /> {{ __('landing.s2_title2') }}
                </h2>
                <p class="fs-4 me-0 pe-0 ms-0 ps-0 me-md-4 pe-md-5">
                    <bdi>
                        {{ __('landing.s2_description') }}
                    </bdi>
                </p>
            </div>
            <div class="col-9 col-md-5 mb-4 mb-md-0 order-1 order-md-2">
                <img src="{{asset('public/images/landing/hrf-features.png')}}" alt="" class="rtl-flip img-fluid">
            </div>
        </section>
    </section>

    <section class="container-fluid py-5 bg-light" id="features">
        <section class="row section-wrapper align-items-center justify-content-center pb-5 text-center">
            <div class="col-12 shrinked-section">
                <p class=" fw-normal h6 text-uppercase text-white bg-primary d-inline-flex px-3 py-1 {{Session::get('direction') === "rtl" ? 'order-1' : 'ta'}}">
                    {{ __('landing.s3_titlesmall') }}
                </p>
                <h3 class="mt-1 fs-1 fw-bold mb-4">{{ __('landing.s3_title1') }}</h3>
                <p class="fs-4">
                    {{ __('landing.s3_description') }}
                </p>
            </div>
        </section>

        <section
            class="row row-cols-1 row-cols-md-3 section-wrapper align-items-start justify-content-center py-2 py-md-5 text-center">
            <div class="col my-3 px-5">

                <div
                    class="bg-secondary rounded-circle p-3 icon d-flex align-items-center justify-content-center mx-auto mb-4">
                    <img src="{{asset('public/images/landing/feature-1.png')}}" alt="" width="30" height="30">
                </div>
                <h4 class="mt-1 fs-5 mb-4 fw-bold features-shrink mx-auto text-center">
                    {{ __('landing.s4_title') }}
                    </h4>
                <p class="fs-5">
                    {{ __('landing.s4_description') }}

                </p>
            </div>
            <div class="col my-3 px-5">
                <div
                    class="bg-secondary rounded-circle p-3 icon d-flex align-items-center justify-content-center mx-auto mb-4">
                    <img src="{{asset('public/images/landing/feature-2.png')}}" alt="" width="30" height="30">
                </div>
                <h4 class="mt-1 fs-5 mb-4 fw-bold features-shrink mx-auto text-center">
                    {{ __('landing.s5_title') }}
                </h4>
                <p class="fs-5">
                    <bdi>
                    {{ __('landing.s5_description') }}
                </bdi>
                </p>
            </div>
            <div class="col my-3 px-5">
                <div
                    class="bg-secondary rounded-circle p-3 icon d-flex align-items-center justify-content-center mx-auto mb-4">
                    <img src="{{asset('public/images/landing/feature-3.png')}}" alt="" width="30" height="30">
                </div>
                <h4 class="mt-1 fs-5 mb-4 fw-bold features-shrink mx-auto text-center">

                    {{ __('landing.s6_title') }}
                </h4>
                <p class="fs-5">

                    {{ __('landing.s6_description') }}
                </p>
            </div>
        </section>
    </section>


    <section class="container-fluid pt-2 pt-md-5">
        <section class="row section-wrapper align-items-center py-2 justify-content-around" id="process">
            <div class="col-12">
                <p class=" fw-normal h6 text-uppercase text-white bg-primary d-inline-flex px-3 py-1 {{Session::get('direction') === "rtl" ? 'order-1' : 'ta'}}">{{ __('landing.s7_titlesmall') }}</p>
                <h5 class="mt-1 display-4 fw-bold mb-4">
                    {{ __('landing.s7_title') }}
                </h5>
                <p class="fs-4">
                    {{ __('landing.s7_description') }}
                </p>
            </div>

            <div class="col-8 col-md-4 col-xl-3 my-5 position-relative hm">
                <img src="{{asset('public/images/landing/process-1.png')}}" alt="" class="w-100">
                <div class="position-absolute">
                    <h6 class="h3 mb-0 fw-bold text-center bg-secondary py-4 rounded">
                        {{ __('landing.s8_title1') }}
                        <br />{{ __('landing.s8_title2') }}
                    </h6>
                </div>
            </div>
            <div class="col-8 col-md-4 col-xl-3 my-5 position-relative hm">
                <img src="{{asset('public/images/landing/process-2.png')}}" alt="" class="w-100">
                <div class="position-absolute">
                    <h6 class="h3 mb-0 fw-bold text-center bg-secondary py-4 rounded">
                        {{ __('landing.s9_title1') }}<br />{{ __('landing.s9_title2') }}
                    </h6>
                </div>
            </div>
            <div class="col-8 col-md-4 col-xl-3 my-5 position-relative hm">
                <img src="{{asset('public/images/landing/process-3.png')}}" alt="" class="w-100">
                <div class="position-absolute">
                    <h6 class="h3 mb-0 fw-bold text-center bg-secondary py-4 rounded">
                        {{ __('landing.s10_title1') }}<br />{{ __('landing.s10_title2') }}
                    </h6>
                </div>
            </div>
        </section>

        <section class="row section-wrapper align-items-center py-5 my-5" id="testimonials">
            <div class="col-12">
                <div class="testi-wrap">

                    <img src="{{asset('public/images/landing/quotes.png')}}" alt="">

                    <div class="client-single active position-1 d-flex flex-column flex-xl-row {{ Session::get('direction') === 'rtl' ? 'flex-xl-row-reverse' : 'flex-xl-row' }}"
                        data-position="position-1">
                        <div class="flex-column text">
                            <div class="client-comment">
                                <p class="mt-4 fs-5 text-start">
                                    {{ __('landing.testimonial2') }}
                                </p>
                            </div>
                            <div class="client-info text-start">
                                <strong> - </strong><strong class="text-primary test-name">{{ __('landing.name1') }}</strong>,
                                <span> {{ __('landing.hrfseller') }}</span>
                            </div>
                        </div>
                        <div class="client-img">
                            <img src="{{asset('public/images/landing/testimonials/1.png')}}" alt="" class="rounded-circle">
                        </div>
                    </div>
                    <div class="client-single position-2 inactive d-flex flex-column flex-xl-row {{ Session::get('direction') === 'rtl' ? 'flex-xl-row-reverse' : 'flex-xl-row' }}"
                        data-position="position-2">
                        <div class="flex-column text ">
                            <div class="client-comment">
                                <p class="mt-4 fs-5 text-start">
                                    {{ __('landing.testimonial1') }}
                                </p>
                            </div>
                            <div class="client-info text-start">
                                <strong> - </strong><strong class="text-primary test-name">{{ __('landing.name2') }}</strong>,
                                <span> {{ __('landing.hrfseller') }}</span>
                            </div>
                        </div>
                        <div class="client-img">
                            <img src="{{asset('public/images/landing/testimonials/2.png')}}" alt="" class="rounded-circle">
                        </div>
                    </div>
                    <div class="client-single position-3 inactive d-flex flex-column flex-xl-row {{ Session::get('direction') === 'rtl' ? 'flex-xl-row-reverse' : 'flex-xl-row' }}"
                        data-position="position-3">
                        <div class="flex-column text ">
                            <div class="client-comment">
                                <p class="mt-4 fs-5 text-start">
                                    {{ __('landing.testimonial3') }}
                                </p>
                            </div>
                            <div class="client-info text-start">
                                <strong> - </strong><strong class="text-primary test-name">{{ __('landing.name3') }}</strong>,
                                <span> {{ __('landing.hrfseller') }}</span>
                            </div>
                        </div>
                        <div class="client-img">
                            <img src="{{asset('public/images/landing/testimonials/3.png')}}" alt="" class="rounded-circle">
                        </div>
                    </div>
                    <div class="client-single position-4 inactive d-flex flex-column flex-xl-row {{ Session::get('direction') === 'rtl' ? 'flex-xl-row-reverse' : 'flex-xl-row' }}"
                        data-position="position-4">
                        <div class="flex-column text ">
                            <div class="client-comment">
                                <p class="mt-4 fs-5 text-start">
                                    {{ __('landing.testimonial4') }}
                                </p>
                            </div>
                            <div class="client-info text-start">
                                <strong> - </strong><strong class="text-primary test-name">{{ __('landing.name4') }}</strong>,
                                <span> {{ __('landing.hrfseller') }}</span>
                            </div>
                        </div>
                        <div class="client-img">
                            <img src="{{asset('public/images/landing/testimonials/4.png')}}" alt="" class="rounded-circle">
                        </div>
                    </div>
                    <div class="client-single position-5 inactive d-flex flex-column flex-xl-row {{ Session::get('direction') === 'rtl' ? 'flex-xl-row-reverse' : 'flex-xl-row' }}"
                        data-position="position-5">
                        <div class="flex-column text ">
                            <div class="client-comment">
                                <p class="mt-4 fs-5 text-start">
                                    {{ __('landing.testimonial6') }}
                                </p>
                            </div>
                            <div class="client-info text-start">
                                <strong> - </strong><strong class="text-primary test-name">{{ __('landing.name5') }}</strong>,
                                <span> {{ __('landing.hrfseller') }}</span>
                            </div>
                        </div>
                        <div class="client-img">
                            <img src="{{asset('public/images/landing/testimonials/5.png')}}" alt="" class="rounded-circle">
                        </div>
                    </div>
                    <div class="client-single position-6 inactive d-flex flex-column flex-xl-row {{ Session::get('direction') === 'rtl' ? 'flex-xl-row-reverse' : 'flex-xl-row' }}"
                        data-position="position-6">
                        <div class="flex-column text ">
                            <div class="client-comment">
                                <p class="mt-4 fs-5 text-start">
                                    {{ __('landing.testimonial5') }}
                                </p>
                            </div>
                            <div class="client-info text-start">
                                <strong> - </strong><strong class="text-primary test-name">{{ __('landing.name6') }}</strong>,
                                <span> {{ __('landing.hrfseller') }}</span>
                            </div>
                        </div>
                        <div class="client-img">
                            <img src="{{asset('public/images/landing/testimonials/6.png')}}" alt="" class="rounded-circle">
                        </div>
                    </div>
                    <div class="client-single position-7 inactive d-flex flex-column flex-xl-row {{ Session::get('direction') === 'rtl' ? 'flex-xl-row-reverse' : 'flex-xl-row' }}"
                        data-position="position-7">
                        <div class="flex-column text ">
                            <div class="client-comment">
                                <p class="mt-4 fs-5 text-start">
                                    {{ __('landing.testimonial7') }}
                                </p>
                            </div>
                            <div class="client-info text-start">
                                <strong> - </strong><strong class="text-primary test-name">{{ __('landing.name7') }}</strong>,
                                <span> {{ __('landing.hrfseller') }}</span>
                            </div>
                        </div>
                        <div class="client-img">
                            <img src="{{asset('public/images/landing/testimonials/7.png')}}" alt="" class="rounded-circle">
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>


    <section class="container-fluid p-0">
        <section class="row align-items-center pt-2 mt-2 mt-lg-5 pt-lg-5 cta w-100 mx-0">
            <div class="col-12 bg-secondary">

                <section class="d-flex flex-column flex-lg-row section-wrapper py-5">

                    <div class="d-flex flex-column col-12 col-lg-7">
                    <p class="fs-1 text-primary fw-bold mb-0">{{ __('landing.ready_text') }}</p>
                    <small class="fw-bold fs-5 text-start text-primary">{{ __('landing.create_your_account_text') }}</small>
                </div>

                <div class="d-flex flex-column col-12 col-lg-5">
                    <p class="fw-bold mb-3 text-primary"><bdi>{{ __('landing.s1_downloadtext') }}</bdi></p>
                    <div>
                        <a href="https://play.google.com/store/apps/details?id=com.hrf.seller" target="_blank" class="{{Session::get('direction') === "rtl" ? 'ms-2 me-0' : 'ms-0 me-2'}} px-3 py-4 btn-download rounded-custom">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                x="0px" y="0px" width="145px" height="50px" viewBox="0 0 145 50"
                                enable-background="new 0 0 145 50" xml:space="preserve">
                                <g>
                                    <path fill="#fff" d="M50.002,14.036c0,0.937-0.277,1.683-0.833,2.239c-0.631,0.662-1.454,0.993-2.464,0.993
            c-0.968,0-1.792-0.335-2.469-1.007c-0.678-0.671-1.017-1.504-1.017-2.497c0-0.994,0.339-1.826,1.017-2.497
            c0.677-0.671,1.5-1.007,2.469-1.007c0.48,0,0.94,0.094,1.377,0.281c0.437,0.188,0.787,0.438,1.049,0.75l-0.589,0.59
            c-0.444-0.531-1.056-0.796-1.836-0.796c-0.707,0-1.317,0.248-1.832,0.745c-0.516,0.497-0.773,1.142-0.773,1.935
            c0,0.793,0.257,1.438,0.773,1.935c0.515,0.497,1.125,0.745,1.832,0.745c0.749,0,1.374-0.25,1.874-0.749
            c0.324-0.325,0.512-0.778,0.563-1.358h-2.436V13.53h3.25C49.986,13.705,50.002,13.874,50.002,14.036z" />
                                    <path fill="#fff"
                                        d="M55.155,11.234H52.1v2.127h2.755v0.806H52.1v2.127h3.055v0.824h-3.917V10.41h3.917V11.234z" />
                                    <path fill="#fff"
                                        d="M58.79,17.118h-0.863v-5.884h-1.874V10.41h4.61v0.824H58.79V17.118z" />
                                    <path fill="#fff" d="M63.999,17.118V10.41h0.861v6.708H63.999z" />
                                    <path fill="#fff"
                                        d="M68.684,17.118h-0.863v-5.884h-1.874V10.41h4.61v0.824h-1.874V17.118z" />
                                    <path fill="#fff" d="M79.284,16.251c-0.66,0.678-1.479,1.017-2.46,1.017s-1.801-0.339-2.459-1.017
            c-0.659-0.678-0.988-1.507-0.988-2.487s0.329-1.81,0.988-2.487c0.658-0.678,1.479-1.017,2.459-1.017
            c0.975,0,1.793,0.341,2.455,1.021s0.993,1.508,0.993,2.483C80.272,14.745,79.942,15.574,79.284,16.251z M75.002,15.689
            c0.497,0.503,1.104,0.754,1.822,0.754c0.718,0,1.326-0.251,1.822-0.754c0.496-0.502,0.745-1.145,0.745-1.925
            s-0.249-1.423-0.745-1.925c-0.496-0.503-1.104-0.754-1.822-0.754c-0.719,0-1.325,0.251-1.822,0.754
            c-0.496,0.502-0.745,1.145-0.745,1.925S74.506,15.187,75.002,15.689z" />
                                    <path fill="#fff" d="M81.481,17.118V10.41h1.05l3.26,5.218h0.037l-0.037-1.292V10.41h0.862v6.708h-0.899l-3.411-5.471h-0.037
            l0.037,1.293v4.178H81.481z" />
                                    <path fill="#fff" d="M73.164,26.903c-2.629,0-4.772,1.999-4.772,4.755c0,2.737,2.143,4.755,4.772,4.755
            c2.631,0,4.773-2.018,4.773-4.755C77.938,28.902,75.795,26.903,73.164,26.903z M73.164,34.539c-1.44,0-2.684-1.188-2.684-2.881
            c0-1.711,1.243-2.882,2.684-2.882c1.441,0,2.684,1.171,2.684,2.882C75.848,33.352,74.605,34.539,73.164,34.539z M62.751,26.903
            c-2.629,0-4.773,1.999-4.773,4.755c0,2.737,2.144,4.755,4.773,4.755c2.63,0,4.773-2.018,4.773-4.755
            C67.525,28.902,65.382,26.903,62.751,26.903z M62.751,34.539c-1.44,0-2.684-1.188-2.684-2.881c0-1.711,1.243-2.882,2.684-2.882
            c1.441,0,2.684,1.171,2.684,2.882C65.435,33.352,64.193,34.539,62.751,34.539z M50.365,28.361v2.019h4.828
            c-0.144,1.134-0.522,1.963-1.099,2.539c-0.702,0.702-1.801,1.477-3.729,1.477c-2.972,0-5.295-2.396-5.295-5.368
            c0-2.971,2.323-5.367,5.295-5.367c1.604,0,2.774,0.63,3.639,1.441l1.423-1.423c-1.207-1.152-2.81-2.035-5.062-2.035
            c-4.071,0-7.493,3.314-7.493,7.384c0,4.07,3.422,7.386,7.493,7.386c2.197,0,3.855-0.721,5.151-2.071
            c1.333-1.333,1.748-3.207,1.748-4.72c0-0.468-0.036-0.9-0.108-1.261H50.365z M101.021,29.929c-0.396-1.063-1.603-3.025-4.07-3.025
            c-2.449,0-4.484,1.927-4.484,4.755c0,2.665,2.018,4.755,4.719,4.755c2.179,0,3.44-1.332,3.963-2.107l-1.621-1.081
            c-0.541,0.793-1.278,1.314-2.342,1.314c-1.063,0-1.819-0.485-2.305-1.441l6.357-2.629L101.021,29.929z M94.537,31.514
            c-0.054-1.837,1.423-2.774,2.485-2.774c0.829,0,1.531,0.415,1.766,1.009L94.537,31.514z M89.368,36.125h2.089V22.148h-2.089
            V36.125z M85.945,27.966h-0.072c-0.469-0.559-1.369-1.063-2.504-1.063c-2.378,0-4.557,2.09-4.557,4.773
            c0,2.665,2.179,4.736,4.557,4.736c1.135,0,2.035-0.505,2.504-1.081h0.072v0.685c0,1.82-0.973,2.792-2.54,2.792
            c-1.278,0-2.071-0.919-2.396-1.692l-1.818,0.755c0.521,1.262,1.908,2.811,4.214,2.811c2.45,0,4.521-1.441,4.521-4.953v-8.537
            h-1.981V27.966z M83.55,34.539c-1.441,0-2.647-1.206-2.647-2.862c0-1.676,1.206-2.9,2.647-2.9c1.423,0,2.539,1.225,2.539,2.9
            C86.089,33.333,84.973,34.539,83.55,34.539z M110.808,22.148h-4.998v13.977h2.086v-5.296h2.912c2.313,0,4.586-1.674,4.586-4.341
            C115.394,23.822,113.12,22.148,110.808,22.148z M110.862,28.884h-2.967v-4.791h2.967c1.56,0,2.445,1.291,2.445,2.395
            C113.308,27.571,112.422,28.884,110.862,28.884z M123.755,26.877c-1.51,0-3.074,0.666-3.722,2.14l1.852,0.773
            c0.395-0.773,1.133-1.024,1.906-1.024c1.078,0,2.176,0.646,2.193,1.797v0.145c-0.378-0.216-1.187-0.539-2.176-0.539
            c-1.996,0-4.028,1.096-4.028,3.146c0,1.87,1.637,3.074,3.472,3.074c1.401,0,2.176-0.629,2.66-1.367h0.072v1.08h2.015v-5.358
            C127.999,28.262,126.146,26.877,123.755,26.877z M123.503,34.537c-0.683,0-1.636-0.342-1.636-1.187
            c0-1.079,1.187-1.493,2.212-1.493c0.916,0,1.349,0.198,1.905,0.468C125.822,33.62,124.708,34.537,123.503,34.537z M135.335,27.183
            l-2.392,6.06h-0.072l-2.481-6.06h-2.247l3.723,8.47l-2.123,4.711h2.176l5.736-13.181H135.335z M116.545,36.125h2.085V22.148
            h-2.085V36.125z" />
                                    <path fill="#fff"
                                        d="M8.749,10.947c-0.033,0.011-0.056,0.033-0.089,0.067l0.078-0.078L8.749,10.947z" />
                                    <path fill="#fff" d="M22.03,24.911L8.424,38.572c-0.19-0.323-0.291-0.749-0.291-1.262V12.579c0-0.503,0.101-0.906,0.279-1.23
            L22.03,24.911z" />
                                    <path fill="#fff"
                                        d="M26.995,29.854l-16.021,9.099c-0.771,0.438-1.487,0.471-1.99,0.169l13.606-13.663L26.995,29.854z" />
                                    <path fill="#fff"
                                        d="M22.589,24.352L8.961,10.779c0.514-0.324,1.23-0.28,2.012,0.167l15.932,9.056L22.589,24.352z" />
                                    <path fill="#fff" d="M32.774,26.565l-5.064,2.884l-4.562-4.55l4.472-4.494l5.154,2.929
            C34.34,24.218,34.34,25.671,32.774,26.565z" />
                                </g>
                            </svg>

                        </a>
                        <a href="https://apps.apple.com/us/app/hrf-vendors/id1602468442" target="_blank" class="{{Session::get('direction') === "rtl" ? 'ms-2 me-0' : 'ms-0 me-2'}} px-3 py-4 btn-download rounded-custom">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                x="0px" y="0px" width="145px" height="50px" viewBox="0 0 145 50"
                                enable-background="new 0 0 145 50" xml:space="preserve">
                                <g>
                                    <path id="_Path_" fill="#fff" d="M27.622,24.608c0.028-2.209,1.186-4.248,3.067-5.404c-1.192-1.703-3.117-2.744-5.194-2.809
                  c-2.186-0.23-4.304,1.309-5.418,1.309c-1.135,0-2.85-1.285-4.696-1.248c-2.429,0.08-4.639,1.428-5.821,3.551
                  c-2.517,4.357-0.64,10.764,1.771,14.285c1.207,1.725,2.616,3.65,4.461,3.584c1.806-0.076,2.48-1.152,4.659-1.152
                  c2.159,0,2.791,1.152,4.673,1.107c1.937-0.031,3.158-1.73,4.322-3.473c0.867-1.23,1.534-2.588,1.976-4.025
                  C29.12,29.36,27.625,27.106,27.622,24.608z" />
                                    <path id="_Path_2" fill="#fff" d="M24.066,14.079c1.057-1.268,1.577-2.898,1.451-4.543c-1.614,0.17-3.104,0.941-4.175,2.16
                  c-1.057,1.203-1.592,2.777-1.489,4.375C21.489,16.089,23.042,15.354,24.066,14.079z" />
                                    <path fill="#fff" d="M50.442,33.509H44.28l-1.479,4.369h-2.608l5.834-16.162h2.713l5.833,16.162h-2.653L50.442,33.509z
                 M44.918,31.493h4.884l-2.408-7.09h-0.066L44.918,31.493z" />
                                    <path fill="#fff" d="M67.175,31.985c0,3.662-1.958,6.016-4.918,6.016c-1.527,0.08-2.968-0.721-3.706-2.063h-0.056v5.836
                h-2.42V26.093h2.341v1.961h0.046c0.771-1.334,2.213-2.133,3.752-2.084C65.203,25.97,67.175,28.335,67.175,31.985z
                 M64.689,31.985c0-2.385-1.232-3.953-3.113-3.953c-1.849,0-3.092,1.602-3.092,3.953c0,2.375,1.243,3.965,3.092,3.965
                C63.457,35.95,64.689,34.394,64.689,31.985z" />
                                    <path fill="#fff" d="M80.146,31.985c0,3.662-1.961,6.016-4.92,6.016c-1.527,0.08-2.967-0.721-3.706-2.063h-0.057v5.836h-2.42
                V26.093h2.342v1.961h0.045c0.77-1.334,2.211-2.133,3.752-2.084C78.174,25.97,80.146,28.335,80.146,31.985z M77.66,31.985
                c0-2.385-1.234-3.953-3.115-3.953c-1.848,0-3.09,1.602-3.09,3.953c0,2.375,1.242,3.965,3.09,3.965
                C76.426,35.95,77.66,34.394,77.66,31.985L77.66,31.985z" />
                                    <path fill="#fff" d="M88.717,33.374c0.178,1.604,1.736,2.654,3.865,2.654c2.037,0,3.504-1.051,3.504-2.496
                c0-1.256-0.885-2.006-2.979-2.521l-2.096-0.504c-2.969-0.717-4.346-2.105-4.346-4.357c0-2.789,2.43-4.703,5.883-4.703
                c3.414,0,5.754,1.914,5.834,4.703h-2.441c-0.146-1.613-1.479-2.586-3.43-2.586c-1.947,0-3.281,0.984-3.281,2.418
                c0,1.143,0.852,1.814,2.936,2.33l1.779,0.438c3.318,0.783,4.695,2.115,4.695,4.48c0,3.023-2.41,4.916-6.24,4.916
                c-3.584,0-6.004-1.848-6.158-4.771H88.717z" />
                                    <path fill="#fff" d="M103.859,23.306v2.787h2.242v1.916h-2.242v6.496c0,1.01,0.451,1.48,1.434,1.48
                c0.268-0.004,0.533-0.025,0.797-0.057v1.904c-0.443,0.082-0.893,0.121-1.342,0.111c-2.389,0-3.318-0.896-3.318-3.182v-6.754
                h-1.713v-1.916h1.713v-2.787H103.859z" />
                                    <path fill="#fff" d="M107.398,31.985c0-3.707,2.184-6.037,5.59-6.037c3.416,0,5.59,2.33,5.59,6.037
                c0,3.719-2.164,6.037-5.59,6.037S107.398,35.704,107.398,31.985z M116.113,31.985c0-2.543-1.166-4.043-3.125-4.043
                s-3.125,1.512-3.125,4.043c0,2.555,1.166,4.043,3.125,4.043S116.113,34.54,116.113,31.985L116.113,31.985z" />
                                    <path fill="#fff" d="M120.57,26.093h2.309v2.006h0.057c0.32-1.291,1.504-2.18,2.834-2.129c0.277,0,0.557,0.029,0.828,0.09
                v2.264c-0.354-0.107-0.719-0.156-1.088-0.146c-1.344-0.055-2.479,0.992-2.533,2.336c-0.004,0.125,0,0.25,0.014,0.375v6.99h-2.42
                V26.093z" />
                                    <path fill="#fff" d="M137.75,34.417c-0.326,2.139-2.41,3.605-5.074,3.605c-3.43,0-5.557-2.297-5.557-5.98
                c0-3.695,2.141-6.094,5.455-6.094c3.26,0,5.311,2.24,5.311,5.813v0.828h-8.322v0.146c-0.15,1.689,1.098,3.18,2.785,3.328
                c0.127,0.012,0.256,0.014,0.385,0.01c1.172,0.111,2.279-0.564,2.719-1.656H137.75z M129.572,30.899h5.893
                c0.086-1.564-1.109-2.9-2.672-2.986c-0.074-0.004-0.146-0.006-0.219-0.004c-1.646-0.012-2.992,1.318-3.002,2.965
                C129.572,30.882,129.572,30.892,129.572,30.899z" />
                                    <path fill="#fff"
                                        d="M44.616,9.55c1.893-0.135,3.536,1.287,3.673,3.18c0.015,0.227,0.01,0.455-0.02,0.68
              c0,2.48-1.341,3.906-3.654,3.906h-2.805V9.55H44.616z M43.017,16.218h1.464c1.346,0.08,2.502-0.945,2.583-2.291
              c0.01-0.168,0.002-0.336-0.021-0.502c0.184-1.34-0.754-2.574-2.093-2.758c-0.155-0.021-0.312-0.029-0.468-0.02h-1.464V16.218z" />
                                    <path fill="#fff" d="M49.632,14.382c-0.146-1.525,0.973-2.881,2.501-3.027c1.524-0.146,2.881,0.973,3.027,2.5
              c0.017,0.176,0.017,0.354,0,0.527c0.148,1.527-0.969,2.887-2.494,3.033c-1.527,0.148-2.885-0.967-3.034-2.494
              C49.616,14.743,49.616,14.562,49.632,14.382z M53.97,14.382c0-1.27-0.57-2.012-1.571-2.012c-1.006,0-1.571,0.742-1.571,2.012
              c0,1.281,0.565,2.02,1.571,2.02C53.399,16.401,53.97,15.659,53.97,14.382L53.97,14.382z" />
                                    <path fill="#fff" d="M62.508,17.315h-1.2l-1.211-4.316h-0.092l-1.206,4.316H57.61l-1.615-5.859h1.173l1.05,4.471h0.087
              l1.204-4.471h1.11l1.204,4.471h0.092l1.045-4.471h1.157L62.508,17.315z" />
                                    <path fill="#fff" d="M65.476,11.456h1.113v0.93h0.086c0.299-0.686,1.002-1.104,1.748-1.043
              c1.051-0.08,1.965,0.707,2.045,1.758c0.01,0.141,0.004,0.281-0.016,0.422v3.793h-1.156v-3.504c0-0.941-0.411-1.408-1.266-1.408
              c-0.74-0.035-1.371,0.537-1.404,1.279c-0.004,0.068-0.002,0.137,0.006,0.205v3.428h-1.156V11.456z" />
                                    <path fill="#fff" d="M72.296,9.167h1.157v8.148h-1.157V9.167z" />
                                    <path fill="#fff" d="M75.061,14.382c-0.146-1.525,0.973-2.883,2.5-3.027c1.525-0.146,2.883,0.973,3.027,2.5
              c0.018,0.176,0.018,0.354,0,0.527c0.15,1.527-0.969,2.887-2.494,3.033c-1.527,0.148-2.885-0.969-3.033-2.494
              C75.043,14.743,75.043,14.562,75.061,14.382z M79.398,14.382c0-1.27-0.57-2.012-1.572-2.012c-1.006,0-1.57,0.742-1.57,2.012
              c0,1.281,0.564,2.02,1.57,2.02C78.828,16.401,79.398,15.659,79.398,14.382z" />
                                    <path fill="#fff" d="M81.805,15.659c0-1.055,0.787-1.664,2.182-1.75l1.586-0.092v-0.506c0-0.619-0.408-0.969-1.199-0.969
              c-0.646,0-1.094,0.238-1.221,0.652h-1.121c0.119-1.008,1.066-1.652,2.395-1.652c1.471,0,2.299,0.73,2.299,1.969v4.004h-1.113
              v-0.822H85.52c-0.377,0.6-1.051,0.953-1.76,0.92c-0.973,0.1-1.842-0.605-1.943-1.578C81.809,15.776,81.805,15.718,81.805,15.659z
               M85.572,15.157v-0.49l-1.43,0.092c-0.807,0.055-1.172,0.33-1.172,0.846c0,0.527,0.457,0.834,1.084,0.834
              c0.76,0.076,1.438-0.477,1.516-1.234C85.57,15.188,85.572,15.173,85.572,15.157z" />
                                    <path fill="#fff" d="M88.244,14.382c0-1.852,0.953-3.023,2.434-3.023c0.748-0.035,1.449,0.365,1.797,1.027h0.086V9.167h1.156
              v8.148h-1.107V16.39h-0.092c-0.375,0.656-1.084,1.051-1.84,1.023C89.188,17.413,88.244,16.239,88.244,14.382z M89.439,14.382
              c0,1.244,0.588,1.992,1.566,1.992c0.975,0,1.578-0.758,1.578-1.986c0-1.221-0.611-1.99-1.578-1.99
              C90.031,12.397,89.439,13.149,89.439,14.382L89.439,14.382z" />
                                    <path fill="#fff" d="M98.504,14.382c-0.146-1.525,0.973-2.881,2.498-3.027c1.527-0.146,2.883,0.973,3.027,2.5
              c0.02,0.176,0.02,0.354,0,0.527c0.15,1.527-0.967,2.887-2.492,3.033c-1.527,0.148-2.885-0.967-3.033-2.494
              C98.486,14.743,98.486,14.562,98.504,14.382z M102.84,14.382c0-1.27-0.568-2.012-1.57-2.012c-1.006,0-1.57,0.742-1.57,2.012
              c0,1.281,0.564,2.02,1.57,2.02C102.271,16.401,102.84,15.659,102.84,14.382z" />
                                    <path fill="#fff" d="M105.584,11.456h1.113v0.93h0.086c0.301-0.686,1.002-1.104,1.748-1.043
              c1.051-0.08,1.967,0.707,2.045,1.758c0.01,0.141,0.004,0.281-0.016,0.422v3.793h-1.156v-3.504c0-0.941-0.41-1.408-1.266-1.408
              c-0.742-0.035-1.371,0.537-1.406,1.279c-0.002,0.068,0,0.137,0.008,0.205v3.428h-1.156V11.456z" />
                                    <path fill="#fff" d="M117.096,9.997v1.484h1.27v0.975h-1.27v3.014c0,0.613,0.252,0.883,0.83,0.883
              c0.146-0.002,0.293-0.01,0.439-0.027v0.965c-0.207,0.037-0.418,0.057-0.629,0.059c-1.285,0-1.799-0.453-1.799-1.584v-3.309
              h-0.932v-0.975h0.932V9.997H117.096z" />
                                    <path fill="#fff" d="M119.945,9.167h1.146v3.23h0.092c0.314-0.691,1.029-1.111,1.787-1.051
              c1.064-0.059,1.975,0.758,2.033,1.824c0.006,0.119,0,0.24-0.016,0.361v3.783h-1.158v-3.498c0-0.936-0.436-1.41-1.254-1.41
              c-0.752-0.063-1.412,0.498-1.475,1.252c-0.008,0.078-0.008,0.156,0,0.234v3.422h-1.156V9.167z" />
                                    <path fill="#fff" d="M131.732,15.733c-0.324,1.105-1.395,1.818-2.539,1.695c-1.471,0.039-2.693-1.121-2.732-2.592
              c-0.002-0.145,0.006-0.289,0.025-0.434c-0.199-1.479,0.84-2.84,2.32-3.037c0.125-0.018,0.254-0.025,0.381-0.023
              c1.631,0,2.613,1.113,2.613,2.953V14.7h-4.137v0.064c-0.072,0.852,0.561,1.602,1.412,1.674c0.051,0.004,0.1,0.006,0.148,0.006
              c0.566,0.066,1.117-0.213,1.395-0.711H131.732z M127.664,13.845h2.961c0.057-0.779-0.527-1.457-1.307-1.516
              c-0.047-0.004-0.092-0.004-0.137-0.004c-0.828-0.01-1.508,0.652-1.518,1.482C127.664,13.819,127.664,13.833,127.664,13.845
              L127.664,13.845z" />
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>

            </section>

            </div>
        </section>
    </section>
</main>

<div class="modal fade" id="modal-otp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              {{ __('landing.enter_code') }}
            </div>
            <div class="modal-body">
                <div class="alert alert-success" id="successRegsiter" style="display: none;"></div>
                <div class="alert alert-danger" id="error" style="display: none;"></div>
                <input type="text" id="verificationCode" class="form-control" placeholder="{{ __('landing.enter_code') }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('landing.close') }}</button>
                <button type="button" class="btn btn-success" onclick="codeVerify();">{{ __('landing.confirm_code') }}</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{ asset('public/js/IntlTelInput/intlTelInput.min.js') }}"></script>
<script>
    $('#seller-form').find('input,select,textarea').on('focusout', function () {
        if(this.name != ""){
            $(this).removeClass('is-valid is-invalid')
                .addClass(this.checkValidity() ? 'is-valid' : 'is-invalid');
        }
    });

    var input = document.querySelector("#exampleInputPhone");
    var iti = window.intlTelInput(input, {
        utilsScript: "{{ asset('public/js/IntlTelInput/utils.js') }}",
        initialCountry: "auto",
        allowDropdown: true,
        separateDialCode: false,
        onlyCountries: [
            "ae"
        ],
        // preferredCountries: [
        //   "ae", "sa"
        // ],
        geoIpLookup: function(success, failure) {
            $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "ae";
                success(countryCode);
            });
        }
    });

    function sellerSubmit(form){
        var flag = true;
        $(form).find('input,select,textarea').each(function (key, value) {
            $(value).removeClass('is-valid is-invalid')
                .addClass(value.checkValidity() ? 'is-valid' : 'is-invalid');
            if(!value.checkValidity()){
                flag = false;
            }
        });
        if(!flag){
            return false;
        }

        if($('#is_verified').val() != "1"){
            $.ajax({
                url: '{{route('shop.otp')}}',
                dataType: "json",
                type: "POST",
                data: {
                    email: $("#exampleInputEmail").val(),
                    phone: iti.getNumber(intlTelInputUtils.numberFormat.E164),
                    _token: $('input[name="_token"]').val()
                },
                success: function (response, status) {
                    if(status == "success"){
                        // response = JSON.parse(response);
                        toastr.success(response.message, {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        $('#modal-otp').modal('show');
                        setTimeout(() => {
                            $('#verificationCode').focus();
                        }, 500);
                    }else{
                        toastr.error("Something Went Wrong!", Error, {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }
                },
                error: function(xhr, status, error){
                    toastr.error(xhr.responseJSON.message, Error, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });

            return false;
        }else{
            return true;
        }
    }

    $('#verificationCode').on('keyup', function(e){
        if(e.keyCode == 13){
            codeVerify();
        }
    })

    function codeVerify(){
        $.ajax({
            url: '{{route('shop.check-otp')}}',
            dataType: "json",
            type: "POST",
            data: {
                phone: iti.getNumber(intlTelInputUtils.numberFormat.E164),
                code: $('#verificationCode').val(),
                _token: $('input[name="_token"]').val()
            },
            success: function (response, status) {
                if(status == "success"){
                    // response = JSON.parse(response);
                    toastr.success(response.message, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    $('#is_verified').val(1);
                    $('#seller-form').submit();
                }else{
                    toastr.error("Something Went Wrong!", Error, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            },
            error: function(xhr, status, error){
                toastr.error(xhr.responseJSON.message, Error, {
                    CloseButton: true,
                    ProgressBar: true
                });
            }
        });
    }

    $('#exampleInputPhone').on('keyup', function(){
        $('#s_phone').val(iti.getNumber(intlTelInputUtils.numberFormat.E164))
    });

    @if ($errors->any())
        @foreach($errors->all() as $error)
            toastr.error('{{$error}}', Error, {
                CloseButton: true,
                ProgressBar: true
            });
        @endforeach
    @endif
</script>
@endpush
