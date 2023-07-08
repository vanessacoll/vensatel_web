<section class="bg-200">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-8 col-xl-7 col-xxl-6">
          <h1 class="fs-2 fs-sm-4 fs-md-5">SOLICITUD DE SERVICIO</h1>
        </div>
      </div>

      <div class="row flex-center mt-3">
        <div class="col-md col-lg-5 col-xl-4 pe-lg-6 order-md-2"><img class="img-fluid px-6 px-md-0" src="page_template/img/49.png" alt="" /></div>
        <div class="col-md col-lg-9 col-xl-8 mt-4 mt-md-0">

          <div class="card mb-3">
            <div class="card-header">
              <div class="row text-center">

                  <h5 class="mb-0" data-anchor="data-anchor">Solicitud de Servicio</h5>
                  <p class="mb-0 pt-1 mt-2 mb-0">Ingresa los datos que se muestran en siguiente formulario</p>

              </div>
            </div>
             <hr class="border-bottom-0 m-0" />
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-38a32f7e-f5bc-4ab8-b418-b5669185d206" id="dom-38a32f7e-f5bc-4ab8-b418-b5669185d206">


          <form class="row g-3">

            <div class="col-md-4">
                <label class="form-label" for="cedula">Cedula</label>
                <input class="form-control" id="cedula" name="cedula" type="text" placeholder="Ingrese Cedula" required="" />
            </div>

            <div class="col-md-8">
                <label class="form-label" for="nombres">Nombres</label>
                <input class="form-control" id="nombres" name="nombres" type="text" placeholder="Ingrese Nombres" required="" />
            </div>

            <div class="col-md-4">
                <label class="form-label" for="telefono">Telefono</label>
                <input class="form-control" id="telefono" name="telefono" type="text" placeholder="Ingrese Telefono" required="" />
            </div>

            <div class="col-md-8">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" id="email" name="email" type="text" placeholder="Ingrese Email" required="" />
            </div>

            <div class="col-md-12">
            <label class="form-label" for="direccion">Dirección:</label>
            <input class="form-control" name="direccion" type="text" id="direccion" placeholder="Seleccione su direccion en el mapa"  readonly>
            </div>

            <input type="text" id="latitud" name="latitud" hidden>
            <input type="text" id="longitud" name="longitud" hidden>


            <div class="col-md-12">

          <div id="map" style="height:300px; width: 685px"></div>


        </div>

        <div class="col-12">
            <div class="row flex-between-center">
              <div class="d-grid gap-2">

                <a class="btn btn-primary"  onclick="solicitudservicio()">Enviar Mensaje</a></div>

            </div>
          </div>




          </form>
        </div>
    </div>
  </div>
</div>



        </div>
      </div>

    </div>
  </section>
