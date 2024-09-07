<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="enot" content="{{ config('enotio.enot_head_id') }}">
    <meta name="description" content="">
    <!-- Стили для страниц -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mobile_style.css') }}" rel="stylesheet">
    <!-- Библиотеки скриптов -->
    <script src="{{ asset('libs/gsap/gsap.min.js') }}"></script>
    <script src="{{ asset('libs/gsap/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('libs/gsap/ScrollSmoother.min.js') }}"></script>
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
</head>
<body>
    <div class="wrapper">
        @if(isset($showCookieConsent) && $showCookieConsent)
            <div class="cookie-consent-banner" style="position:fixed; bottom:0; width:100%; background-color:#000; color:#fff; text-align:center; padding:15px;">
                <p>На данном сайте используются файлы cookie, чтобы персонализировать контент и сохранить Ваш вход в систему, если Вы зарегистрируетесь.
                    Продолжая использовать этот сайт, Вы соглашаетесь на использование наших файлов cookie. <a href="{{ route('privacypolicy') }}" style="color:#0af;">Подробнее</a>.</p>
                <button id="accept-cookies" style="background-color:#0af; border:none; color:#fff; padding:10px 20px; cursor:pointer;">Принять</button>
            </div>

            <script>
                document.getElementById('accept-cookies').addEventListener('click', function() {
                    document.querySelector('.cookie-consent-banner').style.display = 'none';
                    fetch('/accept-cookies');
                });
            </script>
        @endif
        <div class="content">

            <header class="main-header">

                <div class="layers">

                    <div class="layer__header">
                        <div class="layers__caption">Welcome to</div>
                        <div class="layers__title">Lineage 2</div>
                    </div>

                    <div class="layer layers__base" style="background-image: url(img/layer-base.png);"></div>
                    <div class="layer layers__middle" style="background-image: url(img/layer-middle.png);"></div>
                    <div class="layer layers__front" style="background-image: url(img/layer-front.png);"></div>
                </div>
            </header>
            <div class="serverBlock flex">
				<div id="loadStatus" class="server">
					<div id="loading"></div>
					<div><h10 id="loadingText">Загрузка статуса!</h10></div>

				</div>
			</div>
			<div class="stars">
				<span class="star_1"></span>
				<span class="star_2"></span>
				<span class="star_3"></span>
				<span class="star_4"></span>
				<span class="star_5"></span>
				<span class="star_6"></span>
				<span class="star_7"></span>
				<span class="star_8"></span>
			</div>
            <article class="main-article" style="background-image: url(img/dungeon.jpg);">

			    @yield('content') <!-- Основной контент сайта -->



            </article>

        </div>
        <!--<footer class="footer">
                    <div class="footerTopBlock">
                        <div class="container2">
                        <p><a href="{{ route('privacypolicy') }}" class="link-white">{{ __('messages.privacy_policy_title') }}</a></p>
                    <p><a href="{{ route('useragreement') }}" class="link-white">{{ __('messages.useragreement_title') }}</a></p>
                        </div>
                    </div>
                </footer>-->
    </div>

    <!-- Блок для ПК -->
    <div class="socBlock">
        <a href="https://www.facebook.com/share/g/sL8fxzdTbLRNAseK/" class="fb"></a>
        <a href="" class="dc"></a>
    </div><!-- Блок для ПК -->
    <!-- Кнопка вверх -->
    <div id="section3">
        <div class="toTop" id="toTop">TOP</div>
    </div><!-- Кнопка вверх -->
    <!-- Навбар вверху страницы -->
    <div class="topPanel flex-c">
    <div class="topButton menuButton" data-class="nav">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- <a href="{{ route('home') }}" class="topPanel-logo"><img src="images/logo-white.png" alt="Logo"></a>-->
    <nav class="nav flex-c">
        <div class="topPanel-button flex-c">
            <!-- Меню смены языка -->
            <div class="topimg">
            @if(session()->get('locale') == 'ru')
				<img id="count" src="{{ asset('/images/rus.svg') }}" width="50" height="60">
			@else
				<img id="count" src="{{ asset('/images/eng.svg') }}" width="50" height="60">
			@endif
</div>
            <!--<div class="topimg">
            <img src="images/translate.png" alt="">
</div>-->
		  	<select class="button19 bright changeLang">
			  	<option value="ru" {{ session()->get('locale') == 'ru' ? 'selected' : '' }}>Russia</option>
			  	<option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
		  	</select> <!-- Меню смены языка -->
            <!-- Другие навбар кнопки -->
            <a href="{{ route('home') }}" class="button19">{{ __('messages.home') }}</a>
            <a href="https://forum.draconic-legacy.com" class="button19">{{ __('messages.forum') }}</a>
            <a href="/statistic" class="button19">{{ __('messages.static') }}</a>
            <a href="/registration" class="button19">{{ __('messages.reg') }}</a>
            <a href="/login" class="button19">{{ __('messages.enter_lk') }}</a>
            <!--<a href="/payments" class="button19">{{ __('messages.payments_header1') }}</a>-->
            <a href="{{ route('download') }}" class="button19">{{ __('messages.download_game') }}</a>
        </div>
    </nav>
    <!-- Блок для мобильных устройств -->
    <div class="topSocBlock socBlock">
        <a href="https://www.facebook.com/share/g/sL8fxzdTbLRNAseK/" class="fb"></a>
        <a href="" class="dc"></a>
    </div><!-- Блок для мобильных устройств -->
</div><!--topPanel--><!-- Навбар вверху страницы -->
    <div id="modal-login" class="modal_div t-center">
        <div class="modal_close">
            <span></span>
            <span></span>
        </div><!--modal_close-->
        <h1>Личный Кабинет</h1>
        <a href="#"><img src="images/facebook-button.png" alt=""></a>
        <div class="or">Или</div>
        <form method="POST" class="form-width" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" />{{ __('messages.pass') }}
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('messages.remember_pass') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('messages.log_in') }}
                </x-primary-button>
            </div>
        </form>
        <div class="formlinks">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('messages.forgot_pass') }}
            </a>
            @endif
        </div>
    </div>
    <div id="overlay"></div>
    <!-- СКРИПТЫ -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('js/swiper.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/html5shiv.min.js') }}"></script>
                <!-- Скрипт кнопки "ТОП" вверх -->
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var toTopButton = document.getElementById("toTop");
                        // Показать кнопку при прокрутке вниз на 100 пикселей
                        window.addEventListener("scroll", function() {
                            if (window.scrollY > 100) {
                                toTopButton.classList.add("show");
                            } else {
                                toTopButton.classList.remove("show");
                            }
                        });
                        // Прокрутка наверх при нажатии на кнопку
                        toTopButton.addEventListener("click", function() {
                            window.scrollTo({
                                top: 0,
                                behavior: "smooth"
                            });
                        });
                        // Скрыть кнопку после прокрутки наверх
                        window.addEventListener("scroll", function() {
                            if (window.scrollY === 0) {
                                toTopButton.classList.remove("show");
                            }
                        });
                    });
                </script><!-- Скрипт кнопки "ТОП" вверх -->
                <!-- Переключатель языка -->
                <script type="text/javascript">
    		        var url = "{{ route('changeLang') }}";
    		        $(".changeLang").change(function(){
				        change($(this).val())
        		        window.location.href = url + "?lang="+ $(this).val();
    		        });
			        function change(val){
				        //console.log(val);
				        if(val == "en"){
					        changeImg("{{asset('/images/eng.svg') }}");
				        }
				        else{
					        changeImg("{{asset('/images/rus.svg') }}")
				        }
			        }
			        function changeImg(imagePath){
				        document.getElementById("count").src=imagePath;
			        }
	            </script><!-- Переключатель языка -->
                <!-- Статус сервера -->
                <script>
                    $(document).ready(function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: "json",
                            error: function (request, status, statusError) {
                                textError(request.responseText , statusError);
                            }
                        });
                        $.get('status/server', function (data) {
                            var index2 = 0;
                            if(!isEmpty(data)){
                                $.each(data, function(index, value) {
                                    updateDiv(index, value , index2);
                                    index2++;
                                });
                            }
                            else{
                                console.log('нет данных status/server')
                            }
                            hideLoad(index2);
                        });
                    });

                    function isEmpty(data){
                        return jQuery.isEmptyObject(data);
                    }
                    function textError(textError , statusError){
                        $("#loadingText").text("Ошибка загрузки");
                    }
                    function hideLoad(index2){
                        if(index2 > 0){
                            $('#loadStatus').hide();
                        }
                    }
                    function updateDiv(index, value , index2){
                        if(index2 == 0){
                            addChild(value.id , "server" , "server_1" , value.name , value.count_online , value.status);
                        }
                        else if(index2 == 1){
                            addChild(value.id , "server" , "server_2" , value.name , value.count_online , value.status);
                        }
                        else if(index2 == 2){
                            addChild(value.id , "server" , "server_3" , value.name , value.count_online , value.status);
                        }
                    }
                    function addChild(server_id , server , serverindex , servername , countusers , status_server){
                        $('.serverBlock').append("<div id="+server_id+" class="+server+"><p>"+servername+"</p><span>"+countusers+"</span><br><br><p>"+status_server+"</p></div>");
                        $("#"+server_id).addClass(serverindex);
                    }
                </script><!-- Статус сервера -->
                <!-- Эфект паралакс сайта -->
                <script>
                    window.addEventListener('scroll', e => {
                        document.documentElement.style.setProperty('--scrollTop', `${window.scrollY}px`) // Update method
                    })
                    gsap.registerPlugin(ScrollTrigger, ScrollSmoother)
                    ScrollSmoother.create({
                        wrapper: '.wrapper',
                        content: '.content'
                    })
                </script><!-- Эфект паралакс сайта -->
</body>
</html>
