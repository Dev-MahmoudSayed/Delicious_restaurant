<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Order-page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('front/img/favicon.png') }}') }}" rel="icon">
  <link href="{{ asset('front/img/apple-touch-icon.png') }}') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('front/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('front/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Delicious - v4.7.1
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center fixed-top ">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
      <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 55</span></i>
      <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sat: 11:00 AM - 23:00 PM</span></i>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="index.html">Delicious</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
              <li><a class="nav-link scrollto " href="/">Home</a></li>
              <li><a class="nav-link scrollto" href="/">About</a></li>
              <li><a class="nav-link scrollto" href="/">Menu</a></li>
              
              <li><a class="nav-link scrollto" href="/">Events</a></li>
              <li><a class="nav-link scrollto" href="/">Chefs</a></li>
              <li><a class="nav-link scrollto" href="/">Gallery</a></li>
          @if (Auth::check())
          <li><a href="{{ route('cart') }}"><button type="button" class="btn btn-warning rounded-pill position-relative ">
            cart <i class="bi bi-cart"></i>
           
            </span>
          </button></a></li>
          @endif
         
                @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#book-a-table" class="book-a-table-btn scrollto">Book a table</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Order Now </h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Inner Page</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center border-warning  bg-warning">
                    <h1>order now</h1>
                </div>
                <div class="card-body">
                    @if (session('errormessage'))
                <div class="alert alert-danger">
                    <h2>{{session('errormessage')}}</h2>
                </div>
            @endif
            @if (session('message'))
                    <div class="alert alert-success">
                        <h2>{{session('message')}}</h2>
                    </div>
                @endif
                    @if (Auth::check())
                    <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <p>Name : {{Auth()->user()->name}}</p>
                    <p>Email : {{Auth()->user()->email}}</p>
                    <p>Phone : <input class="form-control" type="number" name="phone"></p>
                    <p>Small Meal Order : <input class="form-control" type="number" name="small_meal" value="0"></p>
                    <p>Medium Meal Order : <input class="form-control" type="number" name="medium_meal" value="0"></p>
                    <p>Large Meal Order : <input class="form-control" type="number" name="large_meal" value="0"></p>

                    <p> <input type="hidden" name="meal_id" value="{{$meal->id}}"></p>
                    <p>Date : <input class="form-control" type="date" name="date"></p>
                    <p>Time : <input class="form-control" type="time" name="time"></p>
                    <p>Message : <textarea class="form-control"  name="body" rows="3"></textarea></p>
                    <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning d-grid">Make Order</button>
                    </div>
                    
                
                    </form>
                    @else
                    <p class="text-center"><a href="/login" class="btn btn-danger">login to make order</a></p>
                    @endif
                </div>

            </div><!--card-->
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center border-warning  bg-warning">
                   <h1>Meal</h1>
                </div>
                <div class="card-body text-center">
                   
                        <img src="{{ Storage::url($meal->image) }}"  alt=""  class="img-thumbnail ">
                      
                      <h1>{{$meal->name}}</h1>
                      <h3>{{$meal->description}}</h3>
                      <p class="badge rounded-pill bg-warning text-dark ">{{$meal->category}}</p>
                      <p class="lead">Small  meal price : <span class="badge rounded-pill bg-warning text-dark">{{$meal->small_meal_price}}$</span></p>
                      <p class="lead">Medium meal price : <span class="badge rounded-pill bg-warning text-dark">{{$meal->medium_meal_price}}$</p>
                      <p class="lead">Large  meal price : <span class="badge rounded-pill bg-warning text-dark">{{$meal->large_meal_price}}$</p>
                      
                      

                </div>

            </div><!--card-->
        </div>
      </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Delicious</h3>
      <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('front/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('front/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('front/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('front/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('front/js/main.js') }}"></script>

</body>

</html>