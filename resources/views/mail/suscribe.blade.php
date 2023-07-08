@component('mail::message')
<h1>Hola!</h1>
<strong>Tienes un Nuevo solicitud de Instalacion de Servicio de {{$mail->name}}</strong>
<br>
Email: {{$mail->email}}
<br>
Telefono: {{$mail->telefono}}
<br>
Direccion: {{$mail->direccion}}

{{ config('app.name') }}
@endcomponent
