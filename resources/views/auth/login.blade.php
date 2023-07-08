@extends('layout_login.template_login')

@section('login-content')

<form method="POST" action="{{ route('login') }}">
                        @csrf
<input type="hidden" id="token" value="634e7e1c2afb98c4050e9bc1c779b708">

<div class="form-group m-b-15">
<input type="text" id="login" name="email" class="form-control form-control-lg no" placeholder="Email" required="" autocomplete="off" autofocus="">
</div>
<div class="form-group m-b-15">
<input type="password" name="password" class="form-control form-control-lg no" id="password" placeholder="Contraseña" required="" autocomplete="off" value="">
</div>
<div class="checkbox checkbox-css m-b-30">
<input type="checkbox" id="remember_login"> 
<label for="remember_login">Recordar datos</label>
</div>
<div class="login-buttons">
<button type="submit" class="btn btn-success btn-block btn-lg">Ingresar</button>
</div>
</form>

@endsection
