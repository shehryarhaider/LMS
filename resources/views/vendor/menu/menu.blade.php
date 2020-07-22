@extends('vendor.layouts.masterpage')

@section('title', 'Menu')

@section('top-styles')
<!-- Plugins css-->
<link href="{{url('')}}/plugins/switchery/css/switchery.min.css" rel="stylesheet" />

<!-- Treeview css -->
<link href="{{url('')}}/plugins/jstree/style.css" rel="stylesheet" type="text/css" />

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

    <!-- Page-Title -->
    <div class="row">
      <div class="col-sm-12">
        <!-- <h4 class="page-title">Portlets</h4> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="#">Menu</a>
          </li>
          <li class="breadcrumb-item active">Menu</li>
        </ol>
      </div>
    </div>

    <div class="portlet">
      <div class="portlet-heading bg-light-theme">
        <h3 class="portlet-title">
          <i class="ti-sharethis mr-2"></i> Menu</h3>
        <div class="portlet-widgets">

        </div>
        <div class="clearfix"></div>
      </div>
      <div id="bg-primary1" class="panel-collapse collapse show">
        <div class="portlet-body">
          <div class="alert alert-danger text-center">
              <strong>Warning !</strong>
              Incorrect Deleting/Editing of menu's will result in a broken application, proceed with caution !
          </div>
          <div class="card-box">
            <div class="portlet">
              <div class="portlet-heading bg-dark-theme">
                <h3 class="portlet-title">CMS Menus</h3>
                <div class="portlet-widgets">
                  <a href="{{route('vendor.menu.create')}}">
                    <button class="btn btn-white btn-custom-white btn-custom btn-rounded waves-effect" type="button">
                      <i class="fa fa-plus"></i> Add Menu</button>
                  </a>
                  <span class="divider"></span>
                  <a class="text-white" data-toggle="collapse" data-parent="#accordion1" href="#CMSMenus">
                    <i class="ion-minus-round"></i>
                  </a>
                </div>
                <div class="clearfix"></div>
              </div>

              <div id="CMSMenus" class="panel-collapse collapse show">
                <div class="portlet-body">
                    {{-- <div id="basicTree"> --}}
                    <div>
                      <ul>
                        @foreach ($menu as $item)
                        <li data-jstree='{"opened":true,"icon":"{{$item->icon}}"}'>{{$item->name}}
                          <span>
                            <a href="{{route('vendor.menu.edit',[$item->id])}}" class="link"><i class="fa fa-pencil"></i></a>
                            <a href="{{route('vendor.menu.destroy',[$item->id])}}" data-id="{{$item->id}}" class="delete text-danger"><i
                            class="fa fa-trash"></i></a>
                            <input class="status" type="checkbox" data-plugin="switchery" data-color="#005CA3" data-size="small" {{$item->status == 1 ? 'checked':null}} value="{{$item->id}}">
                          </span>
                          <ul>
                              @foreach ($item->children as $sub)
                              <li data-jstree='{"opened":true,"icon":"{{$sub->icon}}"}'>{{$sub->name}}
                                <span>
                                  <a href="{{route('vendor.menu.edit',[$sub->id])}}" class="link"><i class="fa fa-pencil"></i></a>
                                  <a href="{{route('vendor.menu.destroy',[$sub->id])}}" data-id="{{$sub->id}}" class="delete text-danger"><i
                                      class="fa fa-trash"></i></a>
                                  <input class="status" type="checkbox" data-plugin="switchery" data-color="#005CA3" data-size="small" {{$sub->status == 1 ? 'checked':null}} value="{{$sub->id}}">
                                </span>
                              <ul>
                                  @foreach ($sub->children as $lower_sub)
                                  <li data-jstree='{"icon":"{{$lower_sub->icon}}"}'>{{$lower_sub->name}}
                                    <span>
                                      <a href="{{route('vendor.menu.edit',[$lower_sub->id])}}" class="link"><i class="fa fa-pencil"></i></a>
                                      <a href="{{route('vendor.menu.destroy',[$lower_sub->id])}}" data-id="{{$lower_sub->id}}" class="delete text-danger"><i
                                          class="fa fa-trash"></i></a>
                                      <input class="status" type="checkbox" data-plugin="switchery" data-color="#005CA3" data-size="small" {{$lower_sub->status == 1 ? 'checked':null}} value="{{$lower_sub->id}}">
                                    </span>
                                  </li>
                                  @endforeach
                              </ul>
                              </li>
                              @endforeach
                          </ul>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                </div>
              </div>
            </div>
            <div class="portlet">
              <div class="portlet-heading bg-dark-theme">
                <h3 class="portlet-title">Website Menus</h3>
                <div class="portlet-widgets">
                  <a href="{{route('vendor.menu.website.create')}}">
                    <button class="btn btn-white btn-custom-white btn-custom btn-rounded waves-effect" type="button">
                      <i class="fa fa-plus"></i> Add Menu</button>
                  </a>
                  <span class="divider"></span>
                  <a class="text-white" data-toggle="collapse" data-parent="#accordion1" href="#CMSMenus">
                    <i class="ion-minus-round"></i>
                  </a>
                </div>
                <div class="clearfix"></div>
              </div>

              <div id="CMSMenus" class="panel-collapse collapse show">
                <div class="portlet-body">
                    {{-- <div id="basicTreeWebsite"> --}}
                    <div>
                      <ul>
                        @foreach ($site_menu as $item)
                          @if ($item->parent_id == 0)
                          <li data-jstree='{"opened":true}'>{{$item->name}}
                            <span>
                              <a href="{{route('vendor.menu.website.edit',[$item->id])}}" class="link"><i class="fa fa-pencil"></i></a>
                              <a href="{{route('vendor.menu.website.destroy',[$item->id])}}" data-id="{{$item->id}}" class="my_delete text-danger"><i
                              class="fa fa-trash"></i></a>
                              <input class="Webstatus" type="checkbox" data-plugin="switchery" data-color="#005CA3" data-size="small" {{$item->status == 1 ? 'checked':null}} value="{{$item->id}}">
                            </span>
                            <ul>
                                @foreach ($site_menu as $sub)
                                @if ($sub->parent_id == $item->id)
                                <li data-jstree='{"opened":true,"icon":"{{$sub->icon}}"}'>{{$sub->name}}
                                  <span>
                                    <a href="{{route('vendor.menu.website.edit',[$sub->id])}}" class="link"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('vendor.menu.website.destroy',[$sub->id])}}" data-id="{{$sub->id}}" class="my_delete text-danger"><i
                                    class="fa fa-trash"></i></a>
                                    <input class="Webstatus" type="checkbox" data-plugin="switchery" data-color="#005CA3" data-size="small" {{$sub->status == 1 ? 'checked':null}} value="{{$sub->id}}">
                                  </span>
                                <ul>
                                    @foreach ($site_menu as $lower_sub)
                                    @if ($lower_sub->parent_id == $sub->id)
                                    <li data-jstree='{"icon":"{{$lower_sub->icon}}"}'>{{$lower_sub->name}}
                                      <span>
                                        <a href="{{route('vendor.menu.website.edit',[$lower_sub->id])}}" class="link"><i class="fa fa-pencil"></i></a>
                                        <a href="{{route('vendor.menu.website.destroy',[$lower_sub->id])}}" data-id="{{$lower_sub->id}}" class="my_delete text-danger"><i
                                        class="fa fa-trash"></i></a>
                                        <input class="Webstatus" type="checkbox" data-plugin="switchery" data-color="#005CA3" data-size="small" {{$lower_sub->status == 1 ? 'checked':null}} value="{{$lower_sub->id}}">
                                      </span>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                          </li>
                          @endif
                        @endforeach
                      </ul>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->
  </div>
</div>
<!-- container -->
</div>
<!-- content -->
@endsection

@section('rightsidebar')
  @parent
@endsection

@section('bottom-mid-scripts')
<script src="{{url('')}}/plugins/switchery/js/switchery.min.js"></script>

<!-- Tree view js -->
<script src="{{url('')}}/plugins/jstree/jstree.min.js"></script>
<script src="{{url('')}}/assets/pages/jquery.tree.js"></script>
@endsection

@section('bottom-bot-scripts')
<script type="text/javascript">
  $(document).ready(function () {

    $('#basicTree').jstree({
      'core': {
        'themes': {
            'responsive': false
          }
        },
      'types': {
        'default': {
          'icon': 'md md-folder'
            },
        'file': {
          'icon': 'md md-insert-drive-file'
            }
        },
      'plugins': ['types']
    });

    $('#basicTreeWebsite').jstree({
      'core': {
        'themes': {
            'responsive': false
          }
        },
      'types': {
        'default': {
          'icon': 'md md-folder'
            },
        'file': {
          'icon': 'md md-insert-drive-file'
            }
        },
      'plugins': ['types']
    });

    $('.link').click(function (e) {
      e.preventDefault();
      window.location = this.href;
    });

    $('.delete').click(function (e) {
      e.preventDefault();
      var deleteId = $(this).data('id');
      var $this = $(this);

      swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4fa7f3',
        cancelButtonColor: '#d57171',
        confirmButtonText: 'Yes, delete it!'
      }).then(function (result) {
        if (result.value) {
        axios
          .post('{{route("vendor.menu.destroy")}}', {
            _method: 'delete',
            _token: '{{csrf_token()}}',
            id: deleteId,
          })
          .then(function (response) {
            console.log(response);

            swal(
              'Deleted!',
              'Your Menu has been deleted.',
              'success'
            )

            //removes current element
            $this.parent().parent().remove();
          })
          .catch(function (error) {
            console.log(error);
            swal(
              'Failed!',
              error.message,
              'error'
            )
          });
        }
      })
    });



    $('.my_delete').click(function (e) {
      e.preventDefault();
      var deleteId = $(this).data('id');
      var $this = $(this);

      swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4fa7f3',
        cancelButtonColor: '#d57171',
        confirmButtonText: 'Yes, delete it!'
      }).then(function (result) {
        if (result.value) {
        axios
          .post('{{route("vendor.menu.website.destroy")}}', {
            _method: 'delete',
            _token: '{{csrf_token()}}',
            id: deleteId,
          })
          .then(function (response) {
            console.log(response);

            swal(
              'Deleted!',
              'Your Menu has been deleted.',
              'success'
            )

            //removes current element
            $this.parent().parent().remove();
          })
          .catch(function (error) {
            console.log(error);
            swal(
              'Failed!',
              error.message,
              'error'
            )
          });
        }
      })
    });



    $('.status').change(function () {
      var $this = $(this);
      var id = $this.val();
      var status = this.checked;

      if (status) {
        status = 1;
      } else {
        status = 0;
      }

      axios
        .post('{{route("vendor.menu.status")}}', {
          _token: '{{csrf_token()}}',
          _method: 'patch',
          id: id,
          status: status,
        })
        .then(function (responsive) {
          console.log(responsive);
        })
        .catch(function (error) {
          console.log(error);
        });
    });

  $('.Webstatus').change(function () {
      var $this = $(this);
      var id = $this.val();
      var status = this.checked;

      if (status) {
        status = 1;
      } else {
        status = 0;
      }

      axios
        .post('{{route("vendor.menu.website.status")}}', {
          _token: '{{csrf_token()}}',
          _method: 'patch',
          id: id,
          status: status,
        })
        .then(function (responsive) {
          console.log(responsive);
        })
        .catch(function (error) {
          console.log(error);
        });
    });

  });

</script>
@endsection
