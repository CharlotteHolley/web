@component('mail::message')
# New deadline created: {{ $deadline->subject }}

{{ $deadline->description }}

@component('mail::button', ['url' => url('/deadlines/' . $deadline->id )])

View Deadline
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
