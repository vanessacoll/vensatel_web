@component('mail::message')
<h1>Hola!</h1>
<h2><strong>Bienvenido a Vensatel {{$mail->name}}</strong></h2>
<br>
Hemos recibido tu Solicitud de Servicio de Internet Inalambrico exitosamente.
<br>
<br>
Para hacer seguimiento a esta solicitud por favor ingresa a nuestro portal web <a href="https://vensatel.com/">Vensate en Linea</a>, con tus credenciales:
<br>
<br>
Usuario: {{$mail->email}}
<br>
Contraseña: {{$mail->password}}
<br>
<br>
Te contactaremos en los siguientes dias para notificarte el estado de tu solicitud.
<br>
<br>
<h1>Feliz dia!</h1>

{{ config('app.name') }}
@endcomponent
