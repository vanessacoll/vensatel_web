@component('mail::message')
<h1>Hola {{$mail->name}}!</h1>
<br>
Te notificamos que tu solicitud se encuentra en estatus de <strong>{{$mail->status}}</strong>.
<br>
<br>
Para hacer seguimiento a esta solicitud por favor ingresa a nuestro portal web <a href="https://vensatel.com//">Vensate en Linea</a>, con tus credenciales.
<br>
<br>
<h1>Feliz dia!</h1>

{{ config('app.name') }}
@endcomponent
