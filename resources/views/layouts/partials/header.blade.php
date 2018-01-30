<header class="main-header">
  <!-- Logo -->
  <a href="#!" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>BS</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Baba Studio</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->

        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="hidden-xs"><strong></strong></span>
          </a>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="hidden-xs"><i class="fa fa-gears"></i></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <p>
                {{ Auth::user()->fullname }} - {{ Auth::user()->role->name }}
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ url('me') }}" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <form class="" action="{{ route('logout') }}" method="post">
                  {{ csrf_field() }}
                  <button class="btn btn-default btn-flat" type="submit">Logout</button>
                </form>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
