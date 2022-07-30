<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cart-page</title>
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

      <a href="/" class="book-a-table-btn scrollto">Book a table</a>

    </div>
  </header><!-- End Header -->
  <body>
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
          <div class="container mb-5">
    
            <div class="d-flex justify-content-between align-items-center">
              <h1><span class="badge rounded-pill bg-warning text-dark">All Orders </span></h1>
              <ol>
                
              </ol>
            </div>
    
          </div>
<div class="container mb-5 text-center align-items-center">
    <div class="row ">
    <div class="col-md-12">
  <table class="table">
    <thead class="table-danger">
      @if(count($orders) > 0)
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Phone/Email</th>
        <th scope="col">Date/Time</th>
        <th scope="col">Meal</th>
        <th scope="col">S.Meal</th>
        <th scope="col">M.Meal</th>
        <th scope="col">L.Meal</th>
        <th scope="col">Total($)</th>
        <th scope="col">Message</th>
        <th scope="col">Status</th>
        
      </tr>
    </thead>
    <tbody>
       
      
            
        @foreach ($orders as $order)
        
        <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td scope="col">{{$order->user->name}}</td>
        <td scope="col">{{$order->user->email}}<br><i class="fa fa-phone"></i>{{$order->phone}}</td>
        <td scope="col">{{$order->date}}/<br>{{$order->time}}</td>
        <td scope="col">{{$order->Meal->name}}</td>
        <td scope="col">{{$order->small_meal}}</td>
        <td scope="col">{{$order->medium_meal}}</td>
        <td scope="col">{{$order->large_meal}}</td>
        <td scope="col">
            ${{
                $order->Meal->small_meal_price * $order->small_meal
                +
                $order->Meal->medium_meal_price * $order->medium_meal
                +
                $order->Meal->large_meal_price * $order->large_meal
            }}

</td>
        <td scope="col">{{$order->body}}</td>
        <td scope="col"><span class="badge rounded-pill bg-info text-dark">{{$order->status}}</span></td>
       
            
           

        </form>
        


        
    </tr>
    
    @endforeach
  
    
   
    </tbody>
    @else
    <div class="alert alert-danger text-center">
        <h2>No orders To Show</h2>
    </div>
    @endif
  </table>
</div>
</div>
</div>
<div class="container">
  
  <div class="d-flex justify-content-between align-items-center">
  <h1><span class="badge rounded-pill bg-warning text-dark">All Tables Are Booking</span></h1>
  </div>
  <div class="row">
      <div class="col-12">
        @if(count($booking) > 0)
      <table class="table">
          <thead class="thead-warning">
              <tr>
              <th scope="col">#</th>
              <th scope="col"> Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">No.people</th>
              <th scope="col">Message</th>
              <th scope="col">Status</th>
             
             
              
              </tr>
          </thead>
          <tbody>
             @foreach ($booking as $row)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$row->name}}</td>
                  <td>{{$row->email}} </td>
                  <td>{{$row->phone}} </td>
                  <td>{{$row->date}} </td>
                  <td>{{$row->time}} </td>
                  <td>{{$row->people}} </td>
                  <td>{{$row->message}} </td>
                 <td> <span class="badge rounded-pill bg-info text-dark">{{$row->status}}</span></td>
                 
              </tr>

              @endforeach
              @else
              <div class="alert alert-danger text-center">
                  <h2>No booking-table To Show</h2>
              </div>
              @endif

         
      </div>
  </div>
</div>




    
  </body>
</main><!-- End #main -->
    <!-- ======= Breadcrumbs Section ======= -->
    <!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- End Footer -->

  

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