<x-guest-layout>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
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

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('messages.remember_pass') }}</span>
            </label>
        </div>
        <div class="mt-4">
            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
            <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <!-- Переключатель языка -->
            <select id="changeLang" style="margin-right: 5rem;height: 2.5rem;" class="loginButton bright">
			  	<option value="ru" {{ session()->get('locale') == 'ru' ? 'selected' : '' }}>Russia</option>
			  	<option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
            </select>
            <!-- Переключатель языка -->
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('messages.forgot_pass') }}
                </a>
            @endif
            <x-primary-button class="ml-3">
                {{ __('messages.log_in') }}
            </x-primary-button>
        </div>
    </form>
    
    <!-- Переключатель языка -->
    <script>
        document.getElementById('changeLang').addEventListener('change', function() {
            const selectedLang = this.value;
            window.location.href = '{{ route("changeLang") }}' + '?lang=' + selectedLang;
        });
    </script>
    <!-- Переключатель языка -->
        
</x-guest-layout>
