@component('mail::message')
<h1>Hola!</h1>
<strong>Tienes un Nuevo mensaje de {{$mail->name}}</strong>
<br>
Email: {{$mail->email}}
<br>
<br>
Motivo: {{$mail->subject}}

Mensaje: {{$mail->message}}

{{ config('app.name') }}
@endcomponent
