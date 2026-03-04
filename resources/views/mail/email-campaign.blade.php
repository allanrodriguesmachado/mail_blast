<x-mail::message>
# {{ $campaign->subject }}

{{ $campaign->body }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
