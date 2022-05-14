    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Panel<!-- <sup>2</sup> --></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('adminDashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Users</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <a class="collapse-item" href="{{route('blog.create')}}">Add</a> -->
            <a class="collapse-item" href="{{route('blog.index')}}">List</a>
       </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDoctor" aria-expanded="true" aria-controls="collapseDoctor">
          <i class="fas fa-fw fa-folder"></i>
          <span>Drivers</span>
        </a>
        <div id="collapseDoctor" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <a class="collapse-item" href="{{route('service.create')}}">Add</a> -->
            <a class="collapse-item" href="{{route('service.index')}}">List</a>
              </div>
        </div>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCourse" aria-expanded="true" aria-controls="collapseCourse">
          <i class="fas fa-fw fa-folder"></i>
          <span>Course Management</span>
        </a>
        <div id="collapseCourse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="">Add</a>
            <a class="collapse-item" href="">List</a>
         </div>
        </div>
      </li> -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRegistraion" aria-expanded="true" aria-controls="collapseRegistraion">
          <i class="fas fa-fw fa-folder"></i>
          <span>Registration</span>
        </a>
        <div id="collapseRegistraion" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           
            <a class="collapse-item" href="">List</a>
         </div>
        </div>
      </li> -->






      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('contact.index')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Contacts</span></a>
      </li>

      <!-- Nav Item - Tables -->
<!--       <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    
    <!-- End of Sidebar -->
