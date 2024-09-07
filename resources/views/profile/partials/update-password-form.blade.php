<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('messages.update_password_title') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('messages.update_password_title2') }}
        </p>
    </header>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div>
            <x-input-label for="current_password" :value="__('messages.current_password_title')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="password" :value="__('messages.new_password_title')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="password_confirmation" :value="__('messages.confirm_password_title')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('messages.save_button_title') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-green-600">
                    {{ __('messages.password_updated_successfully') }}
                </p>
             @endif
        </div>
    </form>
</section>
<!--<pre>{{ print_r(session()->all()) }}</pre>--?
