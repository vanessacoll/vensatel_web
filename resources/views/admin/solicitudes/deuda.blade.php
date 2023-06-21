<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Registro de Deuda</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Plan</th>
                        <th>Monto</th>
                        <th>Estatus</th>
                        <th>Fecha</th>
                        @if(!empty($deu->monto_extra) && !empty($deu->concepto_extra))
                        <th>Monto Cargo Extra</th>
                        <th>Concepto Cargo Extra</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($deuda as $deu)
                        <tr>
                            <td>{{$deu->plan->descripcion}}</td>
                            <td>{{ number_format($deu->monto, 2) }}</td>
                            <td>{{$deu->status->descripcion}}</td>
                            <td>{{$deu->fecha}}</td>
                            @if(!empty($deu->monto_extra) && !empty($deu->concepto_extra))
                                <td>{{$deu->monto_extra}}</td>
                                <td>{{$deu->concepto_extra}}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
