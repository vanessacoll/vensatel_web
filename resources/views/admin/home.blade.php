@extends('layout_adm.admin_template')

 @section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a class="btn btn-primary"  data-toggle="modal" data-target="#staticBackdrop" >
                <i class='fas fa-comment-dollar'></i>
            </a>
              <li class="breadcrumb-item active">Admin Dashboard</li>
            </ol>

            @include('user.pagos.pagos_modal')

          </div>
        </div>
      </div>
    <!-- /.container-fluid -->

 @endsection

@section('contenido')



<div class="container-fluid">

<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
    <span class="info-box-icon bg-morado-gradient elevation-1"><i class="fas fa-wifi"></i></span>
    <div class="info-box-content">
    <span class="info-box-text">Solicitudes Abiertas</span>
    <span class="info-box-number">
    {{$creadas->count()}}
    </span>
    </div>

    </div>

    </div>

    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
    <span class="info-box-icon bg-morado-gradient elevation-1"><i class="fas fa-wifi"></i></span>
    <div class="info-box-content">
    <span class="info-box-text">Solicitudes Aprobadas</span>
    <span class="info-box-number">{{$aprobadas->count()}}</span>
    </div>

    </div>

    </div>


    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
    <span class="info-box-icon bg-morado-gradient elevation-1"><i class="fas fa-wifi"></i></span>
    <div class="info-box-content">
    <span class="info-box-text">Solicitudes Rechazadas</span>
    <span class="info-box-number">{{$rechazadas->count()}}</span>
    </div>

    </div>

    </div>

    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
    <span class="info-box-icon bg-morado-gradient elevation-1"><i class="fas fa-wifi"></i></span>
    <div class="info-box-content">
    <span class="info-box-text">Solicitudes Cerradas</span>
    <span class="info-box-number">{{$cerradas->count()}}</span>
    </div>

    </div>

    </div>

    </div>


    <div class="row">
        <div class="col-md-9">
        <div class="card">


        <div class="card-body">
        <div class="row">
        <div class="col-md-8">
        <p class="text-center">
        <strong>Resumen de Ventas por Metodo de Pago</strong>
        </p>
        <div class="chart">

        <canvas id="barChart" height="145" style="height: 145px;"></canvas>

        </div>

        </div>

        <div class="col-md-4">
        <p class="text-center">
        <strong>Totales Pagos</strong>
        </p>

        <div class="progress-group">
        Pago Movil
         <span class="float-right"><b>{{ $ppagomovil->count() }}</b>/{{ $pagos->count() }}</span>
        <div class="progress">
        <div id="bar" class="progress-bar bg-primary active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
        </div>
        </div>

        <div class="progress-group">
        Transferencias
        <span class="float-right"><b>{{ $ptransferencias->count() }}</b>/{{ $pagos->count() }}</span>
        <div class="progress">
        <div id="bar1" class="progress-bar bg-primary active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
        </div>
        </div>


        <div class="progress-group">
        Divisas
        <span class="float-right"><b>{{ $pdivisas->count() }}</b>/{{ $pagos->count() }}</span>
        <div class="progress" >
        <div id="bar2" class="progress-bar bg-primary active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
        </div>
        </div>

        <div class="progress-group">
        Pago por Oficina
        <span class="float-right"><b>{{ $poficina->count() }}</b>/{{ $pagos->count() }}</span>
        <div class="progress" >
        <div id="bar3" class="progress-bar bg-primary active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
        </div>
        </div>

        </div>

        </div>

        </div>

        <div class="card-footer">
        <div class="row">
        <div class="col-sm-3 col-6">
        <div class="description-block border-right">
        <h5 class="description-header">{{$ppagomovil->count()}}</h5>
        <span class="description-text">Pago Movil</span>
        </div>

        </div>

        <div class="col-sm-3 col-6">
        <div class="description-block border-right">
        <h5 class="description-header">{{$ptransferencias->count()}}</h5>
        <span class="description-text">Transferencias</span>
        </div>

        </div>

        <div class="col-sm-3 col-6">
        <div class="description-block border-right">
        <h5 class="description-header">{{$pdivisas->count()}}</h5>
        <span class="description-text">Divisas</span>
        </div>

        </div>

         <div class="col-sm-3 col-6">
        <div class="description-block">
        <h5 class="description-header">{{$poficina->count()}}</h5>
        <span class="description-text">Pago en Oficina</span>
        </div>

        </div>
        </div>

        </div>

        </div>

        </div>

        <div class="col-md-3">

            <div class="info-box mb-3 bg-morado-gradient">
            <span class="info-box-icon"><i class="far fa-credit-card"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">Pagos Registrados</span>
            <span class="info-box-number">{{$pregistrados->count()}}</span>
            </div>

            </div>

            <div class="info-box mb-3 bg-morado-gradient">
            <span class="info-box-icon"><i class="far fa-credit-card"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">Pagos Confirmados</span>
            <span class="info-box-number">{{$pconfirmados->count()}}</span>
            </div>

            </div>

            <div class="info-box mb-3 bg-morado-gradient">
            <span class="info-box-icon"><i class="far fa-user-circle"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">Reclamos Nuevos</span>
            <span class="info-box-number">{{$rregistrados->count()}}</span>
            </div>

            </div>

            <div class="info-box mb-3 bg-morado-gradient">
            <span class="info-box-icon"><i class="far fa-user-circle"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">Reclamos Atendidos</span>
            <span class="info-box-number">{{$ratendidos->count()}}</span>
            </div>

            </div>

        </div>



</div>

<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="/adminlte/plugins/chart.js/Chart.min.js"></script>
<script>
  $(function() {
    // Obtenemos los valores desde PHP y los asignamos directamente
    var cData1 = <?php echo $ppagomovil->count(); ?>;
    var cData2 = <?php echo $ptransferencias->count(); ?>;
    var cData3 = <?php echo $pdivisas->count(); ?>;
    var cData4 = <?php echo $poficina->count(); ?>;

    var ctx2 = $("#barChart");

    // Datos del gráfico de barras
    var data2 = {
      datasets: [
        {
          label: 'Pago Movil',
          data: [cData1], // Utilizamos un array para los datos
          backgroundColor: 'rgba(153, 153, 255, 0.7)',
          borderColor: 'rgba(153, 153, 255, 0.8)',
        },
        {
          label: 'Transferencias',
          data: [cData2], // Utilizamos un array para los datos
          backgroundColor: 'rgba(102, 102, 255, 0.7)',
          borderColor: 'rgba(102, 102, 255, 0.8)'
        },
        {
          label: 'Divisas',
          data: [cData3], // Utilizamos un array para los datos
          backgroundColor: 'rgba(51, 51, 204, 0.7)',
          borderColor: 'rgba(51, 51, 204, 0.8)'
        },
        {
          label: 'Pago por Oficina',
          data: [cData4], // Utilizamos un array para los datos
          backgroundColor: 'rgba(0, 0, 153, 0.7)',
          borderColor: 'rgba(0, 0, 153, 0.8)'
        }
      ]
    };

    // Opciones del gráfico
    var options2 = {
      responsive: true,
      title: {
        display: false,
        position: "bottom",
        text: 'Metodos de pago'
      },
      legend: {
        display: true,
        position: "top",
        labels: {
          fontColor: "#333",
          fontSize: 10
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    };

    // Creamos el objeto de la clase Chart para el gráfico de barras
    var chart2 = new Chart(ctx2, {
      type: "bar",
      data: data2,
      options: options2
    });
  });
</script>


<script type="text/javascript">

$(function() {
  $(document).ready(function()
  {

 var total = <?php echo $pagos->count(); ?>;

 if(total == 0){

  total = 1;

 }


 var current = <?php echo $ppagomovil->count(); ?>;
 var percent = parseFloat(current / total) * 100;
 percent = percent.toFixed();
  $('#bar').css('width', percent + '%');
  $('#text').text(percent + '%');

 var current_1 = <?php echo $ptransferencias->count(); ?>;
 var percent_1 = parseFloat(current_1 / total) * 100;
 percent_1 = percent_1.toFixed();
  $('#bar1').css('width', percent_1 + '%');
  $('#text1').text(percent_1 + '%');


 var current_2 = <?php echo $pdivisas->count(); ?>;
 var percent_2 = parseFloat(current_2 / total) * 100;
 percent_2 = percent_2.toFixed();
  $('#bar2').css('width', percent_2 + '%');
  $('#text2').text(percent_2 + '%');


 var current_3 = <?php echo $poficina->count(); ?>;
 var percent_3 = parseFloat(current_3 / total) * 100;
 percent_3 = percent_3.toFixed();
  $('#bar3').css('width', percent_3 + '%');
  $('#text3').text(percent_3 + '%');

  }); 
});
</script>


@endsection


