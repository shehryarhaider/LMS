<!-- Left Sidebar Start -->
@php
  $menus = Auth::user()->user_type == 0 || Auth::user()->user_type == 2 ? getMenus() : getUserRoleMenus(Auth::user()->role_id);
@endphp
<div class="left side-menu">
  <div class="sidebar-inner slimscrollleft">
    <!--- Divider -->
    <div id="sidebar-menu">
      <ul>
        @foreach ($menus as $menu)
          @if ($menu->parent_id == 0)
          <li class="has_sub">
            <a href="{{$menu->route == null ? 'javascript:void(0);' : route($menu->route)}}" class="waves-effect">
              <i class="{{$menu->icon}}"></i>
              <span> {{$menu->name}}</span>
              @if ($menu->route == null)
              <span class='menu-arrow'></span>
              @endif
            </a>
            @if ($menu->route == null)
            <ul class="list-unstyled">
              @foreach ($menus as $item)
                @if ($menu->id == $item->parent_id)
                <li>
                  <a href="{{$item->route == null ? 'javascript:void(0);' : route($item->route)}}">{{$item->name}}
                    @if ($item->route == null)
                    <span class='menu-arrow'></span>
                    @endif
                  </a>
                  @if ($item->route == null )
                    <ul class="list-unstyled">
                      @foreach ($menus as $sub)
                      @if ($item->id == $sub->parent_id)
                      <li>
                        <a href="{{route($sub->route)}}">{{$sub->name}}</a>
                      </li>
                      @endif
                      @endforeach
                    </ul>
                  @endif
                </li>
                @endif
              @endforeach
            </ul>
            @endif
          </li>
          @endif
        @endforeach
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- Left Sidebar End -->
