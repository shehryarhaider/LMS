<!-- Left Sidebar Start -->
<div class="left side-menu">
  <div class="sidebar-inner slimscrollleft">
    <!--- Divider -->
    <div id="sidebar-menu">
      <ul>
        <li class="has_sub">
          <a href="{{route('vendor.users')}}" class="waves-effect">
            <i class=" ti-user"></i>
            <span> Users </span>
          </a>
        </li>
        <li class="has_sub">
          <a href="javascript:void(0);" class="waves-effect">
            <i class="fa fa-credit-card"></i>
            <span> Module Manage </span>
            <span class='menu-arrow'></span>
          </a>
          <ul class="list-unstyled">
            <li>
              <a href="{{route('vendor.mvc.model')}}">Model</a>
            </li>
            <li>
              <a href="{{route('vendor.mvc.view')}}">View</a>
            </li>
            <li>
              <a href="{{route('vendor.mvc.controller')}}">Controller</a>
            </li>
          </ul>
        </li>
        <li class="has_sub">
          <a href="{{route('vendor.route')}}" class="waves-effect">
            <i class=" ti-world"></i>
            <span> Web Routing </span>
          </a>
        </li>
        <li class="has_sub">
          <a href="javascript:void(0);" class="waves-effect">
            <i class=" ti-layout-media-overlay"></i>
            <span> Menu Manage </span>
            <span class='menu-arrow'></span>
          </a>
          <ul class="list-unstyled">
            <li>
              <a href="{{route('vendor.menu')}}">Menu</a>
            </li>
            <li>
              <a href="{{route('vendor.permission')}}">Permission</a>
            </li>
          </ul>
        </li>
        <li class="has_sub">
          <a href="javascript:void(0);" class="waves-effect">
            <i class="fa fa-wrench"></i>
            <span> Settings</span>
            <span class="menu-arrow"></span>
          </a>
          <ul class="list-unstyled">
            <li>
              <a href="{{route('vendor.backup')}}">Backup</a>
            </li>
            <li>
              <a href="{{route('vendor.configuration')}}">Configuration</a>
            </li>
          </ul>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- Left Sidebar End -->
