<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A Content Management System designed by horizontech.biz">
  <meta name="author" content="horizontech.biz">

  <link rel="shortcut icon" href="{{url('')}}/assets/images/favicon3.ico">

  <title>Login - {{getConfig('site_name')}}</title>

  <link href="{{url('')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="{{url('')}}/assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="{{url('')}}/assets/css/style.css" rel="stylesheet" type="text/css" />

  <link href="{{url('')}}/assets/css/animate.min.css" rel="stylesheet" type="text/css" />
  <link href="{{url('')}}/assets/css/custom.css" rel="stylesheet" type="text/css" />

  <script src="{{url('')}}/assets/js/modernizr.min.js"></script>

</head>

<body>

  <div class="account-pages bg-dark-theme">
    <div id="canvas-wrapper">
      <canvas id="demo-canvas"></canvas>
    </div>
  </div>

  <div class="login_page_custom">
    <div class="wrapper-page login_custom_con">
      <div class="animated fadeInDown">
        <div class="text-center bg-white b_r_5 bb_l_r_0 p10">
          <img src="{{url('/uploads/images').'/'.getConfig('site_logo_desktop')}}" alt="Site logo" width="50%" />
        </div>
        <div class="card-box bg-black-transparent4 bt_l_r_0">
          <div class="panel-heading text-center">

            <h1 class="text-white m0">
              <strong> Login </strong>
            </h1>
          </div>

          <div class="p-20">
            <form class="form-horizontal" action="{{route('login')}}" method="POST" id="loginForm">
              <div>
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×
                  </button>
                  @foreach ($errors->all() as $item)
                  {{ $item }}
                  <br>
                  @endforeach
                </div>
                @endif
                <div class="form-group ">
                  <div class="col-12">
                    <input class="form-control" type="email" name="email" required='' placeholder="Email">

                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-12">
                  <input class="form-control" type="password" required='' name="password" placeholder="Password">
                </div>
              </div>

              <div class="form-group ">
                <div class="col-12">
                  <div class="checkbox checkbox-theme-light">
                    <input id="checkbox-signup" type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}>
                    <label for="checkbox-signup">
                      Remember me
                    </label>
                  </div>

                </div>
              </div>

              <div class="form-group text-center m-t-40">
                <div class="col-12">
                  <button class="btn btn-light-theme btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                </div>
              </div>


              <div class="form-group m-t-30 m-b-0">
                <div class="col-12">
                  <a href="{{ route('password.request')}}" class="text-light-theme-link">
                    <i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                </div>
              </div>
            </form>
          </div>


        </div>
        <div class="row">
          <div class="col-sm-12 text-center copyright text-white">
            <p>2018 &copy; Powered by
              <a target="_blank" class="text-light-theme-link" href="http://www.horizontech.biz">Horizon Technologies</a> Version (3.0)</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    var resizefunc = [];
  </script>

  <!-- jQuery  -->
  <script src="{{url('')}}/assets/js/jquery.min.js"></script>
  <script src="{{url('')}}/assets/js/popper.min.js"></script>
  <!-- Popper for Bootstrap -->
  <script src="{{url('')}}/assets/js/bootstrap.min.js"></script>
  <script src="{{url('')}}/assets/js/detect.js"></script>
  <script src="{{url('')}}/assets/js/fastclick.js"></script>
  <script src="{{url('')}}/assets/js/jquery.slimscroll.js"></script>
  <script src="{{url('')}}/assets/js/jquery.blockUI.js"></script>
  <script src="{{url('')}}/assets/js/waves.js"></script>
  <script src="{{url('')}}/assets/js/wow.min.js"></script>
  <script src="{{url('')}}/assets/js/jquery.nicescroll.js"></script>
  <script src="{{url('')}}/assets/js/jquery.scrollTo.min.js"></script>

  <!-- lOGIN Page Plugins -->
  <script src="{{url('')}}/assets/pages/login/EasePack.min.js"></script>
  <script src="{{url('')}}/assets/pages/login/rAF.js"></script>
  <script src="{{url('')}}/assets/pages/login/TweenLite.min.js"></script>
  <script src="{{url('')}}/assets/pages/login/login.js"></script>

  <script src="{{url('')}}/assets/js/jquery.core.js"></script>
  <script src="{{url('')}}/assets/js/jquery.app.js"></script>

  <script type="text/javascript">
    jQuery(document).ready(function () {

      // Init CanvasBG and pass target starting location
      CanvasBG.init({
        Loc: {
          x: window.innerWidth / 2,
          y: window.innerHeight / 3.3
        },
      });

      fetch('https://ipapi.co/json/')
      .then(response => response.json())
      .then((response) => {
        $('#loginForm').append(`<input type="hidden" name="last_login_details" value='`+JSON.stringify(response)+`'>`);
      })
    });
  </script>

</body>

</html>
