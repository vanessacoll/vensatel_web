@extends('layout_adm.admin_template')

 @section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registar Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">Admin Dashboard</a></li>
              <li class="breadcrumb-item active">Registar Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

 @endsection

@section('contenido')


<div class="container-fluid">

    <div class="row">
           <div class="col-md-12">
             <div class="card card-primary">
               <div class="card-header">
                 <h3 class="card-title">Registrar Usuario</h3>
               </div>

                <form method="POST" action="{{ route('register') }}">
                        @csrf
                   <div class="card-body">


   <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="cedula">Cedula</label>
                <input type="text" class="form-control" id="cedula" name="cedula"  placeholder="Ingrese cedula">
            </div>
        </div>

        <div class="col-md-9">
            <div class="form-group">
                <label for="telefono">Nombres</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese nombres">
            </div>
        </div>
     </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="telefono">telefono</label>
                <input type="text" name="telefono" data-inputmask='"mask": "+58(999) 999-9999"' data-mask class="form-control" id="telefono" placeholder="Ingrese numero de Telefono" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Ingrese Email" required>
            </div>
        </div>
    </div>


     <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" class="form-control" placeholder="Ingrese Contraseña" name="password" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar Contraseña" name="password_confirmation" required>
            </div>
        </div>
    </div>



    </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Registrar Usuario</button>
            <a class="btn btn-default float-right" href="{{route("register.search")}}">Cerrar</a>
        </div>
                   </form>
             <!-- /.box -->

         </div>


   </div>
    </div>
</div>
@endsection
