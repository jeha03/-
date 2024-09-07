@component('mail::message')

<h1>{{ __('messages.email_activate_header') }}</h1>

@component('mail::button', ['url' => $url])
{{ __('messages.email_activate_text_button') }}
@endcomponent


Administration,<br>
{{ config('app.name') }}

@endcomponent
