@component('mail::message')

Hello, {{ $contact['name'] }}

{{ $contact['message'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
