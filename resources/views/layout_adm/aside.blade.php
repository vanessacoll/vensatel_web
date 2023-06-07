 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

     <a href="/home" class="brand-link" >
       <img src="" alt="Logo" class="brand-image" >
       <span class="brand-text font-weight-light">Vensatel</b></span>
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
           <a href="{{ route('home') }}" class="nav-link  {{ request()->is('*home*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

@can('solicitudes')

          <li class="nav-item">
            <a href="" class="nav-link {{ request()->is('*solicitudes*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-store"></i>
              <p>
               Solicitudes de Servicio
              </p>
            </a>
          </li>

@endcan

@can('pagos')

          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fas fa-cash-register"></i>
              <p>
              Pagos
               <i class="fas fa-angle-left right"></i>
              </p>
            </a>

<ul class="nav nav-treeview">

    <li class="nav-item">
    <a href="{{ route('pago.movil') }}" class="nav-link {{ request()->is('*pago_movil*') ? 'active' : '' }}">
    <i class="far fa-circle nav-icon"></i>
    <p>Pago Movil</p>
    </a>
    </li> 

    <li class="nav-item">
    <a href="{{ route('pagos.transferencias')}}" class="nav-link {{ request()->is('*trasnferencias*') ? 'active' : '' }}">
    <i class="far fa-circle nav-icon"></i>
    <p>Transferencias</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="{{ route('pagos.pago_en_oficina') }}" class="nav-link {{ request()->is('*pagooficina*') ? 'active' : '' }}" onclick="openModal()">
    <i class="far fa-circle nav-icon"></i>
    <p>Pago en Oficina</p>
    </a>
    </li>

</ul>
          </li>

@endcan

@can('consultas')

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-paste"></i>
              <p>
               Consultas
               <i class="fas fa-angle-left right"></i>
              </p>
            </a>

<ul class="nav nav-treeview">

<li class="nav-item">
<a href="" class="nav-link {{ request()->is('*listado_transacciones*') ? 'active' : '' }}">
<i class="far fa-circle nav-icon"></i>
<p>Saldo</p>
</a>
</li>


<li class="nav-item">
<a href="" class="nav-link {{ request()->is('*listado_cierre*') ? 'active' : '' }}">
<i class="far fa-circle nav-icon"></i>
<p>Consumo</p>
</a>
</li>

<li class="nav-item">
<a href="" class="nav-link {{ request()->is('*listado_cierre*') ? 'active' : '' }}">
<i class="far fa-circle nav-icon"></i>
<p>Contratos</p>
</a>
</li>

</ul>
          </li>

@endcan

@can('reclamos')

          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('*vender*') ? 'active' : '' }}" onclick="showModal()" >
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
               Reclamos
              </p>
            </a>
          </li>

@endcan

          <li class="nav-header">OTROS</li>
            <li class="nav-item" >
           <a href="" class="nav-link {{ request()->is('*contacto*') ? 'active' : '' }}">
              <i class="nav-icon far fa-circle"></i>
              <p>
                Contacto
              </p>
            </a>
          </li>

          <li class="nav-item">
           <a href="" class="nav-link {{ request()->is('*fqa*') ? 'active' : '' }}">
              <i class="nav-icon far fa-circle"></i>
              <p>
                Ayuda
              </p>
            </a>
          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->

  </aside>

