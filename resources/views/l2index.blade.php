@extends('layouts.l2templatefolder.l2template')

@section("title" , "Главная")
@section('content')
<div class="wrapper">
	<main class="content">
			<div class="flex-s block">
				<div class="newsBlock">
					<h2 class="content-title white-title">{{ __('messages.news_index') }}</h2>
					<div class="newsFeed flex-s">
						<a href="https://forum.draconic-legacy.com/threads/%D0%9E%D1%82%D0%BA%D1%80%D1%8B%D1%82%D0%B8%D0%B5-%D0%91%D0%B5%D1%82%D0%B0-%D0%A2%D0%B5%D1%81%D1%82%D0%B0-%D1%851.3/" class="news" style="background-image: url(images/news1.jpg)">
							<div class="news-info">
								<h3><span>{{ __('messages.news_top_text1') }}</span>{{ __('messages.news_text1') }}</h3>
								<div class="date">12.10.2024</div>
							</div>
						</a>
						<a href="https://forum.draconic-legacy.com/threads/%D0%9D%D0%B5-%D0%B7%D0%B0%D1%85%D0%BE%D0%B4%D0%B8%D1%82-%D0%B2-%D0%B8%D0%B3%D1%80%D1%83.5/" class="news" style="background-image: url(images/news2.jpg)">
							<div class="news-info">
								<h3><span>{{ __('messages.news_top_text2') }}</span>{{ __('messages.news_text2') }}</h3>
								<div class="date">12.10.2024</div>
							</div>
						</a>
						<a href="https://forum.draconic-legacy.com/threads/%D0%98%D0%B2%D0%B5%D0%BD%D1%82-%D0%9A%D0%BE%D0%BD%D0%BA%D1%83%D1%80%D1%81-%D1%81%D0%BA%D1%80%D0%B8%D0%BD%D1%88%D0%BE%D1%82%D0%BE%D0%B2.11/" class="news" style="background-image: url(images/news3.jpg)">
							<div class="news-info">
								<h3><span>{{ __('messages.news_top_text3') }}</span>{{ __('messages.news_text3') }}</h3>
								<div class="date">12.10.2024</div>
							</div>
						</a>
					</div>
				</div>

				<div class="eventsBlock">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<a href="https://forum.draconic-legacy.com/forums/%D0%98%D0%B2%D0%B5%D0%BD%D1%82%D1%8B.19/" class="swiper-link">
									<img src="images/chest1.jpg" alt="">
									<p>{{ __('messages.swipe_text1') }}</p>
								</a>
							</div>
							<div class="swiper-slide">
								<a href="https://forum.draconic-legacy.com/forums/%D0%98%D0%B2%D0%B5%D0%BD%D1%82%D1%8B.19/" class="swiper-link">
									<img src="images/chest2.jpg" alt="">
									<p>{{ __('messages.swipe_text2') }}</p>
								</a>
							</div>
							<div class="swiper-slide">
								<a href="https://forum.draconic-legacy.com/forums/%D0%98%D0%B2%D0%B5%D0%BD%D1%82%D1%8B.19/" class="swiper-link">
									<img src="images/chest3.jpg" alt="">
									<p>{{ __('messages.swipe_text3') }}</p>
								</a>
							</div>
							<div class="swiper-slide">
								<a href="https://forum.draconic-legacy.com/forums/%D0%98%D0%B2%D0%B5%D0%BD%D1%82%D1%8B.19/" class="swiper-link">
									<img src="images/chest4.jpg" alt="">
									<p>{{ __('messages.swipe_text4') }}</p>
								</a>
							</div>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
			<div class="block">
				<h2 class="content-title white-title">{{ __('messages.search_streamer') }}</h2>
				<div class="flex-s streamBlock">
					<a href="https://twitch.tv/" class="twitchBlock">
						<img src="images/twitch-icon.png" alt="Twitch">
					</a>
					<a href="https://youtube.com/" class="youtubeBlock">
						<img src="images/youtube-icon.png" alt="Youtube">
					</a>
				</div>
			</div>
			<div class="contentHome">
				<h1>{{ __('messages.useful') }}</h1>
				<h3>{{ __('messages.useful_text') }}</h3>
				<a href="https://forum.draconic-legacy.com/forums/%D0%9E%D0%BF%D0%B8%D1%81%D0%B0%D0%BD%D0%B8%D0%B5-%D1%81%D0%B5%D1%80%D0%B2%D0%B5%D1%80%D0%B0-%D1%851.9/" class="block-a blockPvp">
					<div class="buttonPlay"><span></span></div>
					{{ __('messages.useful_text_block1') }}
				</a>
				<div class="flex">
					<div class="blockExp">
						<a href="https://forum.draconic-legacy.com/forums/%D0%9E%D0%BF%D0%B8%D1%81%D0%B0%D0%BD%D0%B8%D0%B5-%D1%81%D0%B5%D1%80%D0%B2%D0%B5%D1%80%D0%B0-%D1%851.9/" class="block-a blockSolo">
							<div class="buttonPlay buttonPlay-small"><span></span></div>
							{{ __('messages.useful_text_block2') }}
						</a>
						<a href="https://forum.draconic-legacy.com/forums/%D0%9E%D0%BF%D0%B8%D1%81%D0%B0%D0%BD%D0%B8%D0%B5-%D1%81%D0%B5%D1%80%D0%B2%D0%B5%D1%80%D0%B0-%D1%851.9/" class="block-a blockRaids">
							<div class="buttonPlay buttonPlay-small"><span></span></div>
							{{ __('messages.useful_text_block3') }}
						</a>
					</div>
					<a href="https://forum.draconic-legacy.com/forums/%D0%9E%D0%BF%D0%B8%D1%81%D0%B0%D0%BD%D0%B8%D0%B5-%D1%81%D0%B5%D1%80%D0%B2%D0%B5%D1%80%D0%B0-%D1%851.9/" class="block-a blockUpdate">
						<div class="buttonPlay"><span></span></div>
						{{ __('messages.useful_text_block4') }}
					</a>
				</div>
				<div class="container1">
					<a href="/registration" class="bigfit"><span></span>{{ __('messages.register_button') }}</a>
				</div>
				<!-- Тестовая територия -->

				<!--<footer class="footer">
                    <div class="footerTopBlock">
                        <div class="container2">
						<div class="footerLogo">
					<a href="{{ route('home') }}"><img src="images/logo-white.png" alt="Logo"></a>
				</div>
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

					<!-- Тестовая територия -->
			</div>
	</main>

</div>

		<!--<main class="content">
			<div class="main-content">
			<h1 style="margin: auto; padding-left:0px" class="page-title"><p style="color:black;">{{ __('messages.home_title') }}</p></h1>
			<div style="margin: auto;"class="contentHomeReg">
				<div>
					<p style="color:black; float:left;">{{ __('messages.home_description') }}</p>
					<p style="color:black; float:left;">{{ __('messages.home_description3') }}</p>
					<p style="color:black; float:left;">{{ __('messages.home_description1') }}</p>

					<button class="btn" onclick="location.href='https://github.com/gawric/Lineage2-Kraken-Web'" style="width:100%"><i class="fa fa-download"></i>  {{ __('messages.home_button') }}</button>
				</div>
			</div>
		</main>-->

@endsection
