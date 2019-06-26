<!DOCTYPE html>
<html>
<head>
  <title>{{env('APP_NAME')}}</title>
  <!--meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- <meta name="keywords" content="" />--}}
  
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!--booststrap-->
  <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all">
  <!--//booststrap end-->
  <!-- font-awesome icons -->
  <link href="{{asset('front/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- //font-awesome icons -->
  <!--stylesheets-->
  <link href="{{asset('front/css/style.css')}}" rel='stylesheet' type='text/css' media="all">
  <!--//stylesheets-->
  <link href="http://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Libre+Franklin:400,500" rel="stylesheet">
  @yield('header')
</head>

<body>
  <div class="main-top" id="home">
    <!-- header -->
    <div class="headder-top d-md-flex">
      <div id="logo">
        <h1>
          <a href="index.html">{{env('APP_NAME')}}</a>
        </h1>
      </div>
      <!-- nav -->
      <nav class="mx-md-auto">

        <label for="drop" class="toggle">Menu</label>
        <input type="checkbox" id="drop">
        <ul class="menu mt-2">
          <li class="active">
            <a href="{{route('home')}}">Home</a>
          </li>
          <li>
             <a href="{{route('pegawai.home')}}">Pegawai</a>
           </li>
          <li>
            <a href="{{route('dokter.home')}}">Dokter</a>
          </li>
          <li>
            <a href="{{route('pasien.home')}}">Pasien</a>
          </li>
        </ul>
      </nav>
      <div class="social-icons">
        <ul>
          <li>
            <a href="#" class="facebook">
              <span class="fa fa-facebook"></span>
            </a>
          </li>

          <li>
            <a href="#" class="rss">
              <span class="fa fa-rss"></span>
            </a>
          </li>
          <li>
            <a href="#" class="twitter">
              <span class="fa fa-twitter"></span>
            </a>
          </li>
          <li>
            <a href="#" class="gmail">
              <span class="fa fa-envelope"></span>
            </a>
          </li>
        </ul>
      </div>
      <!-- //nav -->
    </div>
    <!-- //header -->
    <!-- banner -->
    @yield('banner')
  </div>
  <!-- banner -->
  <!-- team -->
  @yield('content')

  <footer>
    <div class="bottom-footer text-center py-md-4 py-3">
      <p>
        © 2019 Dikembangkan oleh {{env('APP_DEV')}}
      </p>
    </div>
  </footer>
</body>


<script src="{{asset('js/sweetalert.min.js')}}"></script>
 @if(Session::has('alert'))
 <script>
     swal({
       {!!Session::get('alert')!!}
     });
 </script>
 @endif

 @yield('script')

</html>