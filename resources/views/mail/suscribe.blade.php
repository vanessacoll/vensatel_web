@component('mail::message')
<h1>Hola!</h1>
<strong>Tienes un Nuevo mensaje de Suscripcion de {{$mail->name}}</strong>
<br>
Email: {{$mail->email}}
<br>
<br>
Telefono: {{$mail->telefono}}

Mensaje: {{$mail->direccion}}

{{ config('app.name') }}
@endcomponent
