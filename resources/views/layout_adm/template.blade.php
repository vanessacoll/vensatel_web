<!DOCTYPE html>
<html lang="en">

<!-- head-->
@include('layout_adm.head')


<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Navbar -->
  @include('layout_adm.navbar')

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('layout_adm.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
   @yield('content-header')
    </section>

    <!-- Main content -->
    <section class="content">


    @yield('contenido')

    </section>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->


  <!-- footer -->

 @include('layout_adm.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('layout_adm.jquery')

</body>
</html>
