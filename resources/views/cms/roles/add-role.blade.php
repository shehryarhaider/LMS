@extends('cms.layouts.masterpage')

@section('title', 'Add Role')

@section('top-styles')

@endsection

@section('header')
  @parent
@endsection

@section('leftsidebar')
  @parent
@endsection

@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-sm-12">

        <div class="btn-group pull-right">
          <button class="btn btn-dark-theme waves-effect waves-light" type="button" onclick="window.history.back(1)"><span class="btn-label"><i class="fa fa-arrow-left"></i></span>Go back</button>
        </div>

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="#">Roles</a>
          </li>
          <li class="breadcrumb-item active">Add Role</li>
        </ol>
      </div>
    </div>

    <form action="{{$isEdit ? route('roles.update',[$setRole->id]) : route('roles.store')}}" method="post">
      @csrf
      @if ($isEdit)
        <input type="hidden" name="_method" value="put">
      @endif
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-user mr-2"></span>Add Role</h3>
          <div class="portlet-widgets">
            <span class="divider"></span>
            <button type="submit" class="btn btn-white waves-effect btn-rounded">
              <span class="btn-label">
                <i class="fa fa-save"></i>
              </span> Save
            </button>
          </div>
          <div class="clearfix"></div>
        </div>

        <div id="bg-inverse" class="panel-collapse collapse show" style="">
          <div class="portlet-body">

            <div class="card-box m-b-0">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">Type Role Name
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" required="" placeholder="Type Role Name..." class="form-control" name="name" id="rolename" value="{{ $setRole->name ?? old('name') ?? null }}"
                    data-parsley-remote="{{route('roles.validater',[$setRole->id ?? 0])}}" data-parsley-remote-message="This name has already been taken.">
                    @if ($errors->has('name'))
                      <span class="text-danger"> {{$errors->first('name')}} </span>
                    @endif
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">Type Description
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" placeholder="Type Description..." class="form-control" name="description" id="description" required value="{{ $setRole->description ?? old('description') ?? null }}" >
                  </div>
                </div>

              </div>

              <div class="portlet mb-0">
                <div class="portlet-heading bg-darker-theme">
                  <h3 class="portlet-title">Permissions</h3>
                  <div class="portlet-widgets">
                    <br />
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="panel-collapse collapse show">
                  @if ($errors->has('menu'))
                    <h5 class="text-danger">{{$errors->first('menu')}}</h5>
                  @endif
                  <div class="portlet-body">

                    <div class="checkbox-s custom_userrole">
                      <div class="row">
                        @php
                          $menus = getMenus();
                          $permissions = getAllPermissions();
                        @endphp
                        @foreach ($menus as $menu)
                        @if ($menu->parent_id == 0)
                        <!-- Users Management -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                          <div class="portlet mb-0">
                            <div class="portlet-heading bg-dark-theme">
                              <h3 class="portlet-title">
                                <div class="checkbox">
                                  <input id="{{$menu->name}}" name="menu[{{$menu->id}}]" type="checkbox" class="parent parentmenu-{{$menu->id}}" data-parent="{{$menu->id}}"
                                    {{ $isEdit && in_array( $menu->id ,$setMenus) ? 'checked' : "" }} >
                                  <label for="{{$menu->name}}">
                                    <span>{{$menu->name}}</span>
                                  </label>
                                </div>
                              </h3>
                              <div class="portlet-widgets">
                                <a class="text-white" data-toggle="collapse" data-parent="#accordion1" href="#{{$menu->id}}">
                                  <i class="ion-minus-round"></i>
                                </a>
                              </div>
                              <div class="clearfix"></div>
                            </div>
                            <div id="{{$menu->id}}" class="panel-collapse collapse show">
                              <div class="portlet-body">

                                @foreach ($menus as $sub_menu)
                                  @if ($sub_menu->parent_id == $menu->id)
                                  <!-- user Roles -->
                                  <div class="portlet mb-0">
                                    <div class="portlet-heading bg-light-theme">
                                      <h3 class="portlet-title">
                                        <div class="checkbox">
                                          <input id="{{$sub_menu->name}}" name="menu[{{$sub_menu->id}}]" type="checkbox" class="parent intermediate parent-{{$menu->id}} parentmenu-{{$sub_menu->id}}"
                                            data-id="{{$menu->id}}" data-sub="{{$sub_menu->id}}" {{ $isEdit &&  in_array(
                                            $sub_menu->id ,$setMenus) ? 'checked' : ""}} >
                                          <label for="{{$sub_menu->name}}">
                                            <span>{{$sub_menu->name}}</span>
                                          </label>
                                        </div>
                                      </h3>
                                      <div class="portlet-widgets">
                                        <a class="text-white" data-toggle="collapse" data-parent="#accordion1" href="#UsersRoles">
                                          <i class="ion-minus-round"></i>
                                        </a>
                                      </div>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div id="UsersRoles" class="panel-collapse collapse show">
                                      <div class="portlet-body">
                                        @foreach ($permissions as $permission)
                                          @if ($permission->menu_id == $sub_menu->id)
                                          <div class="checkbox">
                                            <input id="checkbox{{$permission->id}}"name="permission[{{$permission->id}}]" type="checkbox" class="child parent-{{$menu->id}} parent-{{$sub_menu->id}} super-parent-{{$menu->id}}" data-parent-id="{{$sub_menu->id}}" data-super-parent-id="{{$menu->id}}"  {{ $isEdit && in_array( $permission->id ,$setPermissions) ? 'checked' : ""}} >
                                            <label for="checkbox{{$permission->id}}">
                                              <span>{{$permission->name}}</span>
                                            </label>
                                          </div>
                                          @endif
                                        @endforeach
                                      </div>
                                    </div>
                                  </div>
                                  <!--  endUser Roles -->
                                  @endif
                                @endforeach

                                @foreach ($permissions as $permission)
                                  @if ($permission->menu_id == $menu->id)
                                  <div class="checkbox">
                                    <input id="checkbox{{$permission->id}}" name="permission[{{$permission->id}}]" type="checkbox" class="child parent-{{$menu->id}}"
                                      data-parent-id="{{$menu->id}}" {{ $isEdit && in_array( $permission->id ,$setPermissions) ? 'checked' : "" }} >
                                    <label for="checkbox{{$permission->id}}">
                                      {{$permission->name}}
                                    </label>
                                  </div>
                                  @endif
                                @endforeach

                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- users Management End -->
                        @endif
                        @endforeach
                      </div>

                    </div>

                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>

    </form>


  </div>
  <!-- container -->
</div>
<!-- content -->
@endsection

@section('rightsidebar')
  @parent
@endsection

@section('bottom-mid-scripts')

@endsection

@section('bottom-bot-scripts')
<script type="text/javascript" src="{{url('')}}/plugins/parsleyjs/parsley.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('form').parsley();
  });

</script>
<script>
  $(document).ready(function () {

    //when a parent gets unchecked it toggles all the childs as well
    $('.parent').click(function () {
      var parent = $(this).data('parent');

      if (!this.checked) {
        $('.parent-' + parent).prop('checked', false);
      }

      if (this.checked) {
        $('.parent-' + parent).prop('checked', true);
      }

    });

    $('.intermediate').click(function () {
      var parent_id = $(this).data('id');
      var count = 0;
      $(".parent-" + parent_id).each(function () {
        if ($(this).prop('checked') == true) {
          count++;
        }
      });

      if (count > 0) {
        $('.parentmenu-' + parent_id).prop('checked', true);
      } else {
        $('.parentmenu-' + parent_id).prop('checked', false);
      }

      var sub_menuId = $(this).data('sub');

      if (!this.checked) {
        $('.parent-' + sub_menuId).prop('checked', false);
      }

      if (this.checked) {
        $('.parent-' + sub_menuId).prop('checked', true);
      }
    });

    //when a child is toggled, it also toggles the parent check if not checked
    $('.child').click(function (e) {
      var parent_id = $(this).data('parent-id');
      var super_parent_id = $(this).data('super-parent-id');

      var count = 0;
      $(".parent-" + parent_id).each(function () {
        if ($(this).prop('checked') == true) {
          count++;
        }
      });

      var count2 = 0;
      $(".super-parent-" + super_parent_id).each(function () {
        if ($(this).prop('checked') == true) {
          count2++;
          console.log('Hello');
        }
      });

      if (count > 0) {
        $('.parentmenu-' + parent_id).prop('checked', true);
      }

      if (count2 > 0) {
        $('.parentmenu-' + super_parent_id).prop('checked', true);
      }
    });
  });
</script>
@endsection
