<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>Sazao || e-Commerce HTML Template</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.nice-number.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.calendar.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/add_row_custon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/mobile_menu.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.exzoom.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/multiple-image-video.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/ranger_style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.classycountdown.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/venobox.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
</head>

<body>
  <!--=============================
    DASHBOARD MENU START
  ==============================-->
  <div class="wsus__dashboard_menu">
    <div class="wsusd__dashboard_user">
      <img src="{{asset('frontend/images/dashboard_user.jpg')}}" alt="img" class="img-fluid">
      <p>anik roy</p>
    </div>
  </div>
  <!--=============================
    DASHBOARD MENU END
  ==============================-->


  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
      <div class="dashboard_sidebar">
        <span class="close_icon">
          <i class="far fa-bars dash_bar"></i>
          <i class="far fa-times dash_close"></i>
        </span>
        <a href="dsahboard.html" class="dash_logo"><img src="{{asset('frontend/images/logo.png')}}" alt="logo" class="img-fluid"></a>
        <ul class="dashboard_link">
          <li><a class="active" href="{{route('user.dashboard')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>
          <li><a href="dsahboard_order.html"><i class="fas fa-list-ul"></i> Orders</a></li>
          <li><a href="dsahboard_download.html"><i class="far fa-cloud-download-alt"></i> Downloads</a></li>
          <li><a href="dsahboard_review.html"><i class="far fa-star"></i> Reviews</a></li>
          <li><a href="dsahboard_wishlist.html"><i class="far fa-heart"></i> Wishlist</a></li>
          <li><a href="{{route('user.profile')}}"><i class="far fa-user"></i> My Profile</a></li>
          <li><a href="dsahboard_address.html"><i class="fal fa-gift-card"></i> Addresses</a></li>
          <li>
            <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            
                            <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="far fa-sign-out-alt"></i> Log out</a>
                        </form>
           
        </li>
        </ul>
      </div>
@yield('content')

  <!--jquery library js-->
  <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
    <!--bootstrap js-->
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <!--font-awesome js-->
    <script src="{{asset('frontend/js/Font-Awesome.js')}}"></script>
    <!--select2 js-->
    <script src="{{asset('frontend/js/select2.min.js')}}"></script>
    <!--slick slider js-->
    <script src="{{asset('frontend/js/slick.min.js')}}"></script>
    <!--simplyCountdown js-->
    <script src="{{asset('frontend/js/simplyCountdown.js')}}"></script>
    <!--product zoomer js-->
    <script src="{{asset('frontend/js/jquery.exzoom.js')}}"></script>
    <!--nice-number js-->
    <script src="{{asset('frontend/js/jquery.nice-number.min.js')}}"></script>
    <!--counter js-->
    <script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.countup.min.js')}}"></script>
    <!--add row js-->
    <script src="{{asset('frontend/js/add_row_custon.js')}}"></script>
    <!--multiple-image-video js-->
    <script src="{{asset('frontend/js/multiple-image-video.js')}}"></script>
    <!--sticky sidebar js-->
    <script src="{{asset('frontend/js/sticky_sidebar.js')}}"></script>
    <!--price ranger js-->
    <script src="{{asset('frontend/js/ranger_jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend/js/ranger_slider.js')}}"></script>
    <!--isotope js-->
    <script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
    <!--venobox js-->
    <script src="{{asset('frontend/js/venobox.min.js')}}"></script>
    <!--classycountdown js-->
    <script src="{{asset('frontend/js/jquery.classycountdown.js')}}"></script>

    <!--main/custom js-->
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script type="text/javascript">
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        @php
          toastr()->error($error)
        @endphp
      @endforeach
    @endif
  </script>
</body>

</html>
