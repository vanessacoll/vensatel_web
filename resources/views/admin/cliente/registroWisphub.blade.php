@extends('layout_adm.admin_template')

@section('content-header')

<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      {{-- <h1>Registro Wisphub</h1> --}}
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/admin/home">Admin Dashboard</a></li>
        <li class="breadcrumb-item active">Registro Wisphub</li>
      </ol>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

@endsection

@section('contenido')



<div class="container-fluid">

  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Registro Wisphub</h3>
        </div>

        <!-- /.box-header -->
        <div class="card-body">

          <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <div id="">
                  <label for="solicitud">Usuario RB</label>
                  <input type="text" name="" class="form-control" placeholder="">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div id="">
                  <label for="solicitud">IP Cliente</label>
                  <input type="text" name="ubicacion" class="form-control" placeholder="">
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <div id="">
                  <label for="solicitud">MAC CPE</label>
                  <input type="text" name="descripcion" class="form-control" placeholder="">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div id="">
                  <label for="solicitud">Nombres</label>
                  <input type="text" name="ubicacion" class="form-control" placeholder="">
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <div id="">
                  <label for="solicitud">Apellidos</label>
                  <input type="text" name="descripcion" class="form-control" placeholder="">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div id="">
                  <label for="solicitud">Direccion</label>
                  <input type="text" name="ubicacion" class="form-control" placeholder="">
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <div id="">
                  <label for="solicitud">Localidad</label>
                  <input type="text" name="descripcion" class="form-control" placeholder="">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div id="">
                  <label for="solicitud">Ciudad</label>
                  <input type="text" name="ubicacion" class="form-control" placeholder="">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div id="">
                  <label for="solicitud">IP Router Wifi</label>
                  <input type="text" name="descripcion" class="form-control" placeholder="">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div id="">
                  <label for="solicitud">Nombre CPE</label>
                  <input type="text" name="ubicacion" class="form-control" placeholder="">
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <div id="">
                  <label for="solicitud">ID servicio</label>
                  <input type="text" name="descripcion" class="form-control" placeholder="">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div id="">
                  <label for="solicitud">Registro Wisphub</label>
                  <input type="text" name="ubicacion" class="form-control" placeholder="">
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="concepto">Planes</label>
                <select required name="concepto" class="form-control" id="concepto">
                  <option value="">Seleccione</option>
                  @foreach($plan as $a)
                    <option value="{{$a->id_plan_wisphub}}">{{$a->id_plan_wisphub}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="concepto">Sectoriales</label>
                <select required name="concepto" class="form-control" id="concepto">
                  <option value="">Seleccione</option>
                  @foreach($sectorial as $b)
                    <option value="{{$b->id_sectorial_wisphub}}">{{$b->id_sectorial_wisphub}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="concepto">Zona</label>
                <select required name="concepto" class="form-control" id="concepto">
                  <option value="">Seleccione</option>
                  @foreach($zone as $c)
                    <option value="{{$c->id_zona_wisphub}}">{{$c->id_zona_wisphub}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>


        </div>
        <div class="card-footer">


        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a class="btn btn-default float-right" href="{{route("admin.home")}}">Cerrar</a>
        </div>


        <!-- /.box -->
      </div>

    </div>


  </div>





  @endsection