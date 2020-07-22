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
  <div class="clearfix"></div>

  <div class="login_page_custom">
    <div class="wrapper-page login_custom_con">
      <div class="animated fadeInDown">
        <div class="card-box bg-black-transparent4">
          <div class="panel-heading text-center">

            <h1 class="fs50 text-light-theme mb-0">
              <strong> Forgot Password </strong>
            </h1>
            <h4 class="text-white mb-0"> {{getConfig('site_name')}} </h4>
            <small class="text-light1 fs16">Horizon Technologies</small>

          </div>


          <div class="p-20">
            <form class="text-center" action="{{route('password.email')}}" method="post" autocomplete="off">
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
              @elseif(session('status'))
              <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                  ×
                </button>
                {{ session('status') }}
              </div>
              @else
              <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                  ×
                </button>
                Enter your
                <b>Email</b> and the instructions will be sent to you!
              </div>
              @endif
              <div class="form-group m-b-0">
                <div class="input-group">
                  <input type="email" name="email" class="form-control" placeholder="Enter Email" required="">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-light-theme w-sm waves-effect waves-light">
                      Send
                    </button>
                  </span>
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

    });
  </script>

</body>

</html>
