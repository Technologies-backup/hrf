@extends('layouts.back-end.app')
@section('title', \App\CPU\translate('About Us'))
@section('content')
<div class="content container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{\App\CPU\translate('Dashboard')}}</a></li>
            <li class="breadcrumb-item" aria-current="page">{{\App\CPU\translate('about_us')}}</li>
        </ol>
    </nav>

    <div class="row" style="margin-top: 20px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between pl-4 pr-4">
                        <div>
                            <h5><b>{{\App\CPU\translate('about_us')}}</b></h5>
                        </div>
                    </div>
                </div>

                <form action="{{route('admin.business-settings.about-update')}}" method="post">
                    @csrf
                    @php($language=\App\Model\BusinessSetting::where('type','pnc_language')->first())
                    @php($language = $language->value ?? null)
                    @php($default_lang = 'en')

                    @php($default_lang = json_decode($language)[0])
                    <ul class="nav nav-tabs mb-4">
                        @foreach(json_decode($language) as $lang)
                            <li class="nav-item">
                                <a class="nav-link lang_link {{$lang == $default_lang? 'active':''}}"
                                           href="#"
                                           id="{{$lang}}-link">{{\App\CPU\Helpers::get_language_name($lang).'('.strtoupper($lang).')'}}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                @foreach(json_decode($language) as $lang)
                                    <?php
                                    if (count($small_about_us->translations)) {
                                        $translate = [];
                                        foreach ($about_us->translations as $t) {
                                            if ($t->locale == $lang && $t->key == "value") {
                                                $translate[$lang]['value'] = $t->value;
                                            }
                                        }
                                    }
                                    ?>
                                    <div class="form-group {{$lang != $default_lang ? 'd-none':''}} lang_form {{$lang}}-form">
                                        <label class="input-label">
                                            {{\App\CPU\translate('small_about_us')}}
                                        </label>
                                        <textarea name="small_about_us[]" cols="30" rows="20" class="form-control form-ckeditor">{{$lang==$default_lang?$small_about_us->value:($translate[$lang]['value']??'')}}</textarea>
                                    </div>
                                    <?php
                                    if (count($about_us->translations)) {
                                        $translate = [];
                                        foreach ($about_us->translations as $t) {
                                            if ($t->locale == $lang && $t->key == "value") {
                                                $translate[$lang]['value'] = $t->value;
                                            }
                                        }
                                    }
                                    ?>
                                    <div class="form-group {{$lang != $default_lang ? 'd-none':''}} lang_form {{$lang}}-form">
                                        <label class="input-label">
                                            {{\App\CPU\translate('about_us')}}
                                        </label>
                                        <textarea name="about_us[]" cols="30" rows="20" class="form-control form-ckeditor">{{$lang==$default_lang?$about_us->value:($translate[$lang]['value']??'')}}</textarea>
                                    </div>
                                    <input type="hidden" name="lang[]" value="{{$lang}}">
                                @endforeach

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input class="btn btn-primary btn-block" type="submit" name="btn" value="submit">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    {{--ck editor--}}
    <script src="{{asset('/')}}vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="{{asset('/')}}vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('.form-ckeditor').ckeditor({
            contentsLangDirection : '{{Session::get('direction')}}',
        });

        $(".lang_link").click(function (e) {
            e.preventDefault();
            $(".lang_link").removeClass('active');
            $(".lang_form").addClass('d-none');
            $(this).addClass('active');

            let form_id = this.id;
            let lang = form_id.split("-")[0];
            console.log(lang);
            $("." + lang + "-form").removeClass('d-none');
            if (lang == '{{$default_lang}}') {
                $(".from_part_2").removeClass('d-none');
            } else {
                $(".from_part_2").addClass('d-none');
            }
        });
    </script>
    {{--ck editor--}}
@endpush
