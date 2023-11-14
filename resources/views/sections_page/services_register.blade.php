<!DOCTYPE html>
<html lang="en-US" dir="ltr" class="dark">

    @include('template.head')

  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

      @include('template.header')

      <!-- ============================================-->
      <!-- <section> begin ============================-->

      @include('sections_page.home')

      <!-- <section> close ============================-->
      <!-- ============================================-->



      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-3 bg-light shadow-sm">
        <div class="container">
          <div class="row flex-center">
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-x1"><img class="landing-cta-img" height="30" /></div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->



      <!-- ============================================-->
      <!-- section form ==============================-->

      @include('sections_page.register')

      <!-- end section form ==========================-->
      <!-- ============================================-->






      <!-- ============================================-->
      <!-- Footer =====================================-->

      @include('sections_page.footer')

      <!-- End Footer =================================-->
      <!-- ============================================-->


    </main>

    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

   {{-- @include('sections_page.settings_menu') --}}

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->

    @include('template.jquery')

<script>
    // Espera a que el documento esté completamente cargado
    $(document).ready(function () {
        // Obtén la posición de la sección de solicitud de servicio
        var solicitudServicioSection = $('#solicitud-servicio');

        // Comprueba si la sección de solicitud de servicio existe
        if (solicitudServicioSection.length > 0) {
            // Desplázate suavemente a la sección de solicitud de servicio al cargar la página
            $('html, body').animate({
                scrollTop: solicitudServicioSection.offset().top
            }, 1000); // Puedes ajustar la duración del desplazamiento según tus preferencias
        }
    });
</script>

  </body>

</html>
