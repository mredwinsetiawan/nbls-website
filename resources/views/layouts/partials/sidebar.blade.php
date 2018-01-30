<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> -->
    <ul class="sidebar-menu">
      <li class="header"> User Management</li>
      <li>
        <a href="{{ url('dashboard') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li class="header"> User Management</li>
      <li>
        <a href="{{ url('roles') }}">
          <i class="fa fa-key"></i> <span>Roles</span>
        </a>
      </li>
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('users') }}"><i class="fa fa-circle-o"></i> SuperAdmin</a></li>
          <li><a href="{{ url('users') }}"><i class="fa fa-circle-o"></i> Management</a></li>
          <li><a href="{{ url('users') }}"><i class="fa fa-circle-o"></i> Expert</a></li>
          <li><a href="{{ url('users') }}"><i class="fa fa-circle-o"></i> Instructor</a></li>
          <li><a href="{{ url('users') }}"><i class="fa fa-circle-o"></i> Student</a></li>
        </ul>
      </li>

      <li class="header"> Kursus</li>
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-book"></i>
          <span> Kursus</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('categories') }}"><i class="fa fa-circle-o"></i> Kategori</a></li>
          <li><a href="{{ url('users') }}"><i class="fa fa-circle-o"></i> Management</a></li>
        </ul>
      </li>

      <li class="header"> Tenants</li>
      <li>
        <a href="{{ url('tenants') }}">
          <i class="fa fa-building"></i> <span> Tenants</span>
        </a>
      </li>

      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Charts</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
          <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
          <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
          <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
        </ul>
      </li> -->



      <!-- <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
      <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
    </ul>
  </section>
</aside>
