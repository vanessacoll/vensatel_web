<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

     <a href="/home" class="brand-link" >
       <img src="{{ asset('template/images/logovensatelblanco.png') }}" alt="Logo" class="brand-image"  style="width: 90%">
       <span class="brand-text font-weight-light"></b>.</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">




      <!-- SidebarSearch Form

        PODEMOS USARLO DESPUES
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

           <!-- Sidebar user (optional) -->



          <li class="nav-header">MENU</li>
            <li class="nav-item" >
           <a href="{{ route('admin.home') }}" class="nav-link  {{ request()->is('*home*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="{{ route('solicitudes.index.admin') }}" class="nav-link {{ request()->is('*solicitudes*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-store"></i>
              <p>
               Solicitudes de Servicio
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('pagos.index.admin') }}" class="nav-link  {{ request()->is('*pagos*') ? 'active' : '' }}">
              <i class="nav-icon fas fas fa-cash-register"></i>
              <p>
              Pagos
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="{{ route('reclamos.index.admin') }}" class="nav-link  {{ request()->is('*reclamos*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
               Reclamos
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('reclamos.index.admin') }}" class="nav-link  {{ request()->is('*reclamos*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
               Oficinas
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('register.search') }}" class="nav-link  {{ request()->is('*usuarios*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
               Usuarios
              </p>
            </a>
          </li>






        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->

  </aside>

