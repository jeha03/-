@extends('layouts.l2templatefolder.l2templatepages')

@section("title" , "Скачать иру Lineage 2")
@section("page-title" , "Скачать игру")
@section('inside_info')

<!--<style>
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
  text-align: left;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}

</style>-->


	<h1 style="margin: auto; padding-left:0px; margin-top: 5%;" class="page-title"><p>{{ __('messages.download_title') }}</p></h1>
	<div style="margin: auto;"class="contentHomeReg">
	<div>
		<p>{{ __('messages.download_text_top') }}<br>{{ __('messages.download_text') }}</p>

            <a href="https://draconic-legacy.fun/downloads/Draconic-Legacy-Client.rar" class="button19" download>
            <i class="fa fa-download" style="color:white">{{ __('messages.download_torrent') }}</i>
            </a>

	</div>


<!--<div style="margin: auto; text-align: padding-left:0px">
<p style="color:black;">GOOGLE DISK</p>
</div>-->
		<div style="margin-top:3%;">
           <div style="display: inline;">

                    <a href="https://drive.google.com/file/d/1w9rTD-K0lUORPYPSf1FR8atGakSbjRL-/view?usp=sharing" class="button19" download>
                        <i class="fa fa-download" style="color:white"> {{ __('messages.download_path') }}</i>
                    </a>

            </div>
			<div style="display: inline;">

              <a href="https://mega.nz/file/lmtFHSxb#_OJq3qXl1m7pp99fPSEI8EKTLqIe9oJ9TXQIr7CSOHg" class="button19" download>
                 <i class="fa fa-download" style="color:white"> {{ __('messages.download_updater') }}</i>
                 </a>

			 </div>
		</div>
    <!--<footer class="footer">
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
