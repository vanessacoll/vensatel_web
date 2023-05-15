<nav class="main-header navbar navbar-expand navbar-white navbar-light" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


       <li class=" nav-item dropdown user user-menu mr-3">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="" class="user-image" alt="User Image">
              <span class="hidden-xs"></span>
            </a>

            
        
            <ul class="dropdown-menu widget-user">
              <!-- User image -->
             

             <div class="widget-user-header text-white user_header">
          
          <h4 class="widget-user-username text-left">{{ Auth::user()->name }}</h4>
          
            </div>



    <div class="card-footer">
            <a aria-labelledby="navbarDropdown"
                 href="{{ route('logout') }}"   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            
              <p>
                Cerrar Session
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
           </form>
          



</div>



            </ul>

          </li>
    </ul>
  </nav>