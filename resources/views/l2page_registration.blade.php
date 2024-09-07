@extends('layouts.l2templatefolder.l2templatepages')
@section("title" , "Регистрация пользователя")
@section("page-title" , "Регистрация")
@section('inside_info')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="{{ asset('js/registration.js') }}"></script>
    <script src="{{ asset('js/alertsMessages.js') }}"></script>
    <script>
        function getInfo() {
            var login = $('#login').val();
            var email = $('#email').val();
            var pass = $('#pass').val();
            var pass_confirmed = $('#pass_confirmed').val();
            var select = document.querySelector('#selectServer');
            var server_id = select.value;

            // Проверяем, пройдена ли reCAPTCHA
            var response = grecaptcha.getResponse();
            if (response.length === 0) {
                alert("Please verify you're not a robot!");
                return;
            }

            // Если пройдена, отправляем данные на сервер
            reg(login, email, pass, pass_confirmed, server_id);
        }

    </script>
    <style>
        a {
            color: dodgerblue;
        }
    </style>
    <h1 style="margin: auto;padding-left:0px;" class="page-title"><p>{{ __('messages.reg') }}</p></h1>
    <div style="margin: auto;"class="contentHomeReg">
        <div class="message"></div>
        <div id="show_alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';"></span>
            <strong id="text_alert"></strong>
        </div>
        <div style="float: left;" id="loading_reg"></div>
        <div class="formGroup">
            <p style="float: left;">{{ __('messages.login') }}</p>
            <input type="text" id="login" placeholder="{{ __('messages.login') }}" required>
            <p style="float: left;    margin-top: 2%;">{{ __('messages.email') }}</p>
            <input type="text" id="email" placeholder="{{ __('messages.email') }}" required>
            <p style="float: left;    margin-top: 2%;">{{ __('messages.pass') }}</p>
            <input type="password" id="pass" placeholder="{{ __('messages.pass') }}" required>
            <p style="float: left;    margin-top: 2%;">{{ __('messages.pass_confirm') }}</p>
            <input type="password" id="pass_confirmed" placeholder="{{ __('messages.pass_confirm') }}" required>
            <p style="float: left;    margin-top: 2%;">{{ __('messages.listserver') }}</p>
            <select id="selectServer">
                @foreach ($listServerName as $user)
                    <option value={{ $user['1'] }}>{{ $user['0'] }}</option>
                @endforeach
            </select>
           <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
        @if ($errors->has('g-recaptcha'))
                <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('g-recaptcha') }}</strong>
    </span>
            @endif
            <div class="allContent">
                <p style="float:left; font-size:12px;">{{ __('validation.text_policy_agree') }} <a href="{{ route('privacypolicy') }}">{{ __('messages.privacy_policy_reg_title') }}</a>.&  <a href="{{ route('useragreement') }}">{{ __('messages.useragreement_reg_title') }}</a>.</p>
                <button onclick="getInfo()">{{ __('messages.reg') }}</button>
            </div>
           <!-- <footer class="footer">
                <div class="footerTopBlock">
                    <div class="container2">
                        <p><a href="{{ route('privacypolicy') }}" class="link-white">{{ __('messages.privacy_policy_title') }}</a></p>
                        <p><a href="{{ route('useragreement') }}" class="link-white">{{ __('messages.useragreement_title') }}</a></p>
                    </div>
                </div>
            </footer>--><!-- .footer -->
            <div class="main-article__content">
                <h2 class="main-article__header"></h2>
                <p class="main-article__paragraph"></p>
            </div>

            <div class="copy">
                <footer class="footer">
                    <div class="footerTopBlock">
                        <div class="container2">
                            <p><a href="{{ route('privacypolicy') }}" class="link-white">{{ __('messages.privacy_policy_title') }}</a></p>
                            <p><a href="{{ route('useragreement') }}" class="link-white">{{ __('messages.useragreement_title') }}</a></p>
                        </div>
                    </div>
                </footer>
                <p>© Draconic-Legacy.com</p>
                <p>All rights reserved</p>
            </div>
        </div>
@endsection
