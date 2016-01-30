<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="/admin/usuario/" class="logo"><b>Pumpkin</b> Scissors </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <!-- /.messages-menu -->

        <!-- Notifications Menu -->
        <!-- Tasks Menu -->
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            @if(Session::get('logado.0.image_perfil'))
            <img src="{{ asset(Session::get('logado.0.image_perfil')) }}" class="user-image" alt="User Image"/>
            @else
            <img src="{{ asset("/bower_components/admin-lte/dist/img/avatar04.png") }}" class="user-image" alt="User Image" />
            @endif
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"> {{ strtoupper(Session::get('logado.0.login'))}} </span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              @if(Session::get('logado.0.image_perfil'))
              <img src="{{ asset(Session::get('logado.0.image_perfil')) }}" class="img-circle" alt="User Image"/>
              @else
              <img src="{{ asset("/bower_components/admin-lte/dist/img/avatar04.png") }}" class="img-circle" alt="User Image" />
              @endif
              <p>
              {{ strtoupper(Session::get('logado.0.login'))}}
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="/admin/usuario/profile" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="/admin/auth/logout" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
