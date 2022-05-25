@component('mail::message')
# Students have been assigned in LI FSKTM

Hi, Students have been assigned to you, please log in and check the student list.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
