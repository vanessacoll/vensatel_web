@yield('scripts')

<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="/adminlte/dist/js/demo.js"></script>


<!--desde aca nuevos-->


<script src="/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>

<script src="/adminlte/plugins/inputmask/jquery.inputmask.min.js"></script>


<script src="/adminlte/plugins/chart.js/Chart.min.js"></script>

<script src="/adminlte/plugins/sparklines/sparkline.js"></script>

<script src="/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="/adminlte/plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>

<script src="/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="/adminlte/plugins/bs-stepper/js/bs-stepper.min.js"></script>



<script src="/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="/adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<script src="/adminlte/plugins/filterizr/jquery.filterizr.min.js"></script>


<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date picker
      $('#reservationdate').datetimepicker({
         // format: 'L'
        format: 'YYYY-MM-DD'
      });

      //HORA

      $('#datetimepicker3').datetimepicker({
                      format: 'LT'
      });

   $('#reservationdate2').datetimepicker({
         // format: 'L'
        format: 'YYYY-MM-DD'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      })

      $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
      url: "/target-url", // Set the url
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
      document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
      myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
  </script>


<script src="/adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>

<script>
    // Obtener el select y el campo adicional
    const selectConcepto = document.getElementById('concepto');
    const campoAdicional = document.getElementById('campoAdicional');

    // Agregar un listener al evento change del select
    selectConcepto.addEventListener('change', function() {
        // Obtener el valor seleccionado
        const selectedValue = selectConcepto.value;

        // Mostrar u ocultar el campo adicional dependiendo del valor seleccionado
        if (selectedValue === '1') {
            campoAdicional.style.display = 'block';
        } else {
            campoAdicional.style.display = 'none';
        }
    });
</script>

<script>
  function habilitarInput() {
    var checkbox = document.getElementById("customCheckbox1");
    var input = document.getElementById("password");

    if (checkbox.checked) {
      input.disabled = false;
    } else {
      input.disabled = true;
    }
  }
</script>


<!--------------- Funciones del Formulario de Deuda ----------------->
<script>
    // Obtener elementos HTML relevantes
    var planSelect = document.getElementById('planSelect');
    var montoInput = document.getElementById('monto');
    var montoEInput = document.getElementById('monto_e');
    var totalInput = document.getElementById('total');
    var checkbox = document.getElementById('habilitarCargosExtras');
    var conceptoInput = document.getElementById('concepto');

    // Agregar evento de cambio al seleccionar un plan
    planSelect.addEventListener('change', function() {
        var selectedOption = planSelect.options[planSelect.selectedIndex];
        var monto = selectedOption.getAttribute('data-monto');

        // Actualizar los campos "monto" y "total"
        montoInput.value = monto;

        actualizarTotal();

    });

    // Función para calcular y actualizar el valor total
    function actualizarTotal() {
        var monto = parseFloat(montoInput.value);
        var montoE = parseFloat(montoEInput.value);

        // Calcular el nuevo valor total sumando el monto y montoE
        var nuevoTotal = monto + montoE;

        // Actualizar el campo "total" con el nuevo valor
        totalInput.value = nuevoTotal;
    }

    // Agregar eventos de cambio a los campos monto y monto_e
    montoEInput.addEventListener('change', actualizarTotal);

    checkbox.addEventListener('change', function() {
    if (checkbox.checked) {
      montoEInput.disabled = false;
      conceptoInput.disabled = false;
    } else {
      montoEInput.disabled = true;
      conceptoInput.disabled = true;
    }
  });
</script>

@if(session()->has('process_result'))
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 7000
    });
  
     Toast.fire({
        icon: '{{ session('process_result')['status']}}',
        title: '{{ session('process_result')['content']}}'
      })
    
  });
</script>
@endif

<script>
  // Obtener el elemento del chat
  var chatMessages = document.getElementById('chat-messages');

  // Desplazar el scroll hacia abajo
  chatMessages.scrollTop = chatMessages.scrollHeight;
</script>

<script>
function validarMonto(input) {
  // Eliminar cualquier carácter que no sea un número o un punto decimal
  input.value = input.value.replace(/[^0-9.]/g, '');

  // Asegurarse de que solo haya un punto decimal
  if (input.value.split('.').length > 2) {
    input.value = input.value.replace(/\.+$/g, '');
  }
}
</script>

<script>
  function toggleForm() {
    var form = document.getElementById('rebajarForm');
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
  }
</script>





