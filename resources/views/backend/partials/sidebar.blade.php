<!-- Left Sidebar -->
<div class="left main-sidebar">
  <div class="sidebar-inner leftscroll">
    <div id="sidebar-menu">
      <ul>
           
        <li class="submenu">
          <a class="{{ (Route::is('admin.dashboard') ? 'active' : '') }}" href="{{ route('admin.dashboard') }}" title="Dashboard"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
        </li>
        <li class="submenu">
          <a class="{{ (Route::is('admin.tender.manage') ? 'active' : '') }}" href="{{ route('admin.tender.manage') }}" title="Category"><i class="fa fa-fw fa-bars"></i><span> All Bids </span> </a>
        </li>
        <li class="submenu">
          <a class="" title="Manage Appointment"><i class="fa fa-fw fa-table"></i> <span> Contract </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled">
          
            <li><a href="{{route('admin.tender.create')}}">Create</a></li>
            <li><a href="{{route('admin.tender.manage')}}">Manage</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a class="" title="Manage Appointment"><i class="fa fa-fw fa-table"></i> <span> Bid Committee Members </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled">
          
            <li><a href="{{route('admin.committee.manage')}}">All</a></li>
            <!-- <li><a href="">Manage</a></li> -->
          </ul>
        </li>
  
        <li class="submenu">
          <a class="" title="Manage Appointment"><i class="fa fa-fw fa-table"></i> <span> Contractor </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled">
            <li><a href="">Create</a></li>
            <li><a href="">Manage</a></li>
          </ul>
        </li>
  
        <li class="submenu">
          <a class="{{ (Route::is('admin.category.index') ? 'active' : '') }}" href="{{ route('admin.category.index') }}" title="Category"><i class="fa fa-fw fa-bars"></i><span> Department </span> </a>
        </li>

        <li class="submenu">
          <a class="" title="Manage Appointment"><i class="fa fa-fw fa-table"></i> <span> Appointment </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled">
            <li><a href="">Uncompleted</a></li>
            <li><a href="">Completed</a></li>
          </ul>
        </li>
      </ul>

      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- End Sidebar -->
