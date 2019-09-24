@component('mail::message')
# Welcome to WordCamp Dhaka 2019

Here is your verification code {{ $attendee->verification_code }}

Thanks,<br>
WordCamp Dhaka Organizer Team
@endcomponent
