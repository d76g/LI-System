@component('mail::message')
# {{$newMeeting->title}} <br>

Salam {{$newMeeting->CompanySupervisor->name}},<br>
Meeting has been scheduled for {{$newMeeting->Student->name}} from UTHM <br>.
We would like to conduct a meeting with you for a progress meeting regarding our student on the following date and place, <br>
<br>
Time:{{$newMeeting->time}} <br>
Place: {{$newMeeting->type}}

@if ($newMeeting->link != NULL)
Link: <a href="{{$newMeeting->link}}">{{$newMeeting->link}}</a> <br>
@endif


Thanks,{{$newMeeting->Supervisor->name}}<br>
{{ config('app.name') }}
@endcomponent
