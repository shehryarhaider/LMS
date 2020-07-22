<!-- Top Bar Start -->
<div class="topbar">

  <!-- LOGO -->
  <div class="topbar-left bg-white">
    <div class="text-center">
      <a href="{{url('/dashboard')}}" class="logo">
        <i class="icon-c-logo"> <img src="{{url('/uploads/vendor').'/logo.png'}}" height="42"/> </i>
        <span class="text-light-theme fs40"><img src="{{url('/uploads/vendor').'/logo.png'}}" style="margin-right:10px" height="42"/>VENDOR</span>
      </a>
    </div>
  </div>

  <!-- Button mobile view to collapse sidebar menu -->
  <nav class="navbar-custom bg-dark-theme">

    <ul class="list-inline float-right mb-0">

      <li class="list-inline-item notification-list">
        <a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">
          <i class="dripicons-expand noti-icon"></i>
        </a>
      </li>

      {{--
      <li class="list-inline-item notification-list">
        <a class="nav-link right-bar-toggle waves-light waves-effect" href="#">
          <i class="dripicons-message noti-icon"></i>
        </a>
      </li> --}}

      <li class="list-inline-item dropdown notification-list">
        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
          aria-expanded="false">
          @if (Auth::user()->avatar)
          <img src="{{ url('/uploads/images') }}/{{Auth::user()->avatar}}" alt="user" class="rounded-circle">
          @else
              @php
                  $name = explode(" ",Auth::user()->name);
              @endphp
          <div style="background-color: black;
                      border-radius: 50px;
                      width: 50px;
                      height: 50px;
                      text-align: center;
                      padding-bottom: 0px !important;
                      line-height: 52px;
                      font-weight:900;
                      color:#e74c3c;">@foreach ($name as $item){{strtoupper($item[0])}}@endforeach</div>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
          <!-- item-->
          <div class="dropdown-item noti-title">
            <h5 class="text-overflow">
              <small>Welcome ! {{Auth::user()->name}}</small>
            </h5>
          </div>

          {{-- <!-- item-->
          <a href="javascript:void(0);" class="dropdown-item notify-item">
            <i class="md md-account-circle"></i>
            <span>Profile</span>
          </a>

          <!-- item-->
          <a href="javascript:void(0);" class="dropdown-item notify-item">
            <i class="md md-settings"></i>
            <span>Settings</span>
          </a>

          <!-- item-->
          <a href="javascript:void(0);" class="dropdown-item notify-item">
            <i class="md md-lock-open"></i>
            <span>Lock Screen</span>
          </a> --}}

          <!-- item-->
          <a href="{{route('logout')}}" class="dropdown-item notify-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            <i class="zmdi zmdi-power"></i>
            <span>Logout</span>
          </a>

          <form id="logout-form" action="{{ route('vendor.logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>

    </ul>

    <ul class="list-inline menu-left mb-0">
      <li class="float-left">
        <button class="button-menu-mobile open-left waves-light waves-effect bg-dark-theme">
          <i class="dripicons-menu"></i>
        </button>
      </li>

    </ul>

  </nav>

</div>
<!-- Top Bar End -->
