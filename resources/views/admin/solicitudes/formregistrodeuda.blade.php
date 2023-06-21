
           <div class="col-md-12">
             <div class="card card-primary">
               <div class="card-header">
                 <h3 class="card-title">Registrar Plan</h3>
               </div>

                <form method="GET" action="{{route("solicitudes.deuda.admin",['solicitudes' => $solicitudes->id_contact])}}">
                 @method("PUT")
                         @csrf
                   <div class="card-body">


   <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="cedula">Plan</label>
                <select required name="id_plan" id="planSelect" class="form-control" style="width: 100%;">
            <option value="">Seleccione</option>
            @foreach($planes as $plan)
               
                    <option value="{{$plan->id_plan}}" data-monto="{{$plan->precio}}">{{$plan->descripcion}}</option>
            @endforeach
        </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="monto">Monto</label>
                <input type="text" class="form-control" id="monto" name="monto" value="0.00" readonly>
            </div>
        </div>
     </div>

<div class="row">
    <div class="col-md-12">
     <p> <input type="checkbox" id="habilitarCargosExtras">
     <strong>Añadir Cargos Extras</strong></p>
    </div>
</div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="monto_e">Monto</label>
                <input type="text" name="monto_e" id="monto_e" class="form-control" value="0.00" disabled>
            </div>
        </div>

        <div class="col-md-9">
            <div class="form-group">
                <label for="email">Conceto de Cargos extras</label>
                <input type="text" name="concepto" class="form-control" id="concepto" placeholder="Ingrese Concepto" disabled>
            </div>
        </div>
    </div>


     <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="total">Total</label>
                <input id="total" type="text" class="form-control" name="total" value="0.00" disabled>
            </div>
        </div>

    </div>



    </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Generar Deuda</button>
        </div>
                   </form>
             <!-- /.box -->

         </div>


   </div>



