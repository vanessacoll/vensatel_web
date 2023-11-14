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
      <!-- section about ==============================-->

      @include('sections_page.about')

      <!-- end section about ==========================-->
      <!-- ============================================-->



      <!-- ============================================-->
      <!-- section services ===========================-->

      @include('sections_page.services')

      <!-- end section services =======================-->
      <!-- ============================================-->



      <!-- ============================================-->
      <!-- section cobertura ============================-->

      @include('sections_page.cobertura')

      <!-- end section cobertura ======================-->
      <!-- ============================================-->



      <!-- ============================================-->
      <!-- section contac =============================-->

      @include('sections_page.contac')

      <!-- End section contac =========================-->
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

    <a href="{{ route('index') }}" class="btn btn-warning rounded-capsule mr-1 mb-1 floating-button">
     <span class="fas fa-arrow-right mr-1" data-fa-transform="shrink-3"></span> Solicitar Servicio</a>

  </body>

</html>
