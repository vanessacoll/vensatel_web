<!----- Modal de notificar pagos ----->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Notificar Pagos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
    <div class="col-md-4 text-center">
    <a href="{{ route('pago.movil') }}"  class=" {{ request()->is('*pago_movil*') ? 'active' : '' }}">
    <img  class="imgpagos" src=" {{asset("page_template/img/compras.gif")}}"  style="width: 80px; height: 80px;" alt="">
    <p>Pago Movil</p>
    </a>
   </div>

   <div class="col-md-4 text-center">
    <a href="{{ route('pagos.transferencias')}}"  class=" {{ request()->is('*trasnferencias*') ? 'active' : '' }}">
      <img class="imgpagos" src=" {{asset("page_template/img/ordenador-portatil.gif")}}" style="width: 80px; height: 80px;" alt="">
    <p>Transferencias</p>
    </a>
   </div> 
    
   <div class="col-md-4 text-center">
    <a href="{{ route('pagos.pago_en_oficina') }}"  class=" {{ request()->is('*pagooficina*') ? 'active' : '' }}" onclick="openModal()">
      <img class="imgpagos" src=" {{asset("page_template/img/apoyo-tecnico.gif")}}" style="width: 80px; height: 80px;" alt="">
    <p>Pago en Oficina</p>
    </a>
   </div> 
    
     </div>

      </div>
    </div>
  </div>
</div>  

   <!----- Modal de tasa cambiaria ----->
   <div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <img class="img-profile"src="{{asset("page_template/img/bolsa-de-dinero.gif")}}"style="width: 35px; height: 35px;">
              <h5 class="modal-title" id="exampleModalLabel">Precio dolar</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"></span>
              </button>
          </div>

          <form action="{{ route('home.dolar') }}" method="GET" >
              @csrf
              <div class="modal-body">
                 

                  <div class="row g-3">
                    <div class="col">
                        <label>Fecha</label>
                        <input type="date" name="fecha" id="" class="form-control" placeholder="fecha" aria-label="First name">
                    </div>
                    <div class="col">
                        <label>Dolar</label>
                        <input type="text" name="precio" id="" class="form-control" aria-label="Last name" oninput="validarMonto(this)" value="0.00" placeholder="Ingrese monto">
                    </div>
                </div>
                
              </div>
              
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">
                   
                      Cancel
                  </button>
                  <button type="submit" class="btn btn-primary">
                    
                      Cambiar
                  </button>
              </div>
          </form>

      </div>
  </div>
</div>



<style>

  
</style>