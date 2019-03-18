<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home Supermarket</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- js-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <script src="{{ asset('js/voucher_codes.js') }}"></script>
</head>
<body>
    <div style="font-size:16px;">
        <nav class="navbar navbar-expand-lg navbar-light" style="background: #008000;">
           <a href="/"><img width="50px"  src="./images/logo_.png" alt=""></a> 
            <a style="font-size:18px; color: #FFFFFF;"  class="navbar-brand" href="/">Home Megamart</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
       
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a style="color: #FFFFFF;" class="nav-link" href="/">Home
              </a>
            </li>

        
         
        @if (Auth::guest())
                        <li class="nav-item">
              <a class="nav-link" style="color: #FFFFFF;" href="{{url('/start-shopping')}}">Start Shopping</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: #FFFFFF;" href="{{url('/show-order')}}">Busket<i class="glyphicon glyphicon-shopping-cart"></i> <div>0 items</div></a>
            </li>
                            <li  class="nav-item"><a class="nav-link" style="color: #FFFFFF;" href="{{ route('login') }}">Login</a></li>
                            <li  class="nav-item"><a class="nav-link" style="color: #FFFFFF;" href="{{ route('register') }}">Register</a></li>
                                                @else
                        <li class="nav-item">
              <a class="nav-link" style="color: #FFFFFF;" href="{{url('/start-shopping')}}">Start Shopping</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: #FFFFFF;" href="{{url('/show-order')}}">Busket<i class="glyphicon glyphicon-shopping-cart"></i> <div>{{$Orders}} items</div></a>
            </li>
           
                            <li class=" nav-item dropdown">
                                <a style="color: #FFFFFF;" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                <li>
                                        <a style="color: #008000; font-size:18px;" href="{{url('/my-account')}}">
                                            My Account
                                        </a>
                                    </li>
                                    <li>
                                        <a style="color: #008000; font-size:18px;" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                       
                        </ul>
                    </div>
        </nav>
        <!--nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav-->
        </div>
<div style="margin-bottom: 120px; margin-top: 10px;" >
@yield('content')
</div>

    <!-- Scripts -->
    
    <!-- Footer -->
    <!--footer  class=" py-5 " style="background: #008000;"-->
    <footer class="section footer-classic context-dark bg-image" style="font-size:16px; color: #FFFFFF; background: #008000;">
        <div class="container">
          <div class="row row-30">
            <div class="col-sm-6 col-md-4 col-xl-5">
              <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="./images/logo_.png" alt="" width="40" height="37" srcset="./images/logo_.png 2x" ></a>
                <p>Home Megamart we are selling all different kinds of product for human consuption and use. This is the newest online mart. Any product's you buy from us we will deliver it to you Home. Enjoy! </p>
                <!-- Rights-->
                <p class="rights"><span>©  </span><span class="copyright-year">2019</span><span> </span><span>HomeMegamart</span><span>. </span><span>All Rights Reserved.</span></p>
              </div>
            </div>
            <div class="col-md-4">
              <h5>Contacts</h5>
              <dl class="contact-list">
                <dt>Address:</dt>
                <dd>Njiro, Arusha, Tanzania</dd>
              </dl>
              <dl class="contact-list">
                <dt>email:</dt>
                <dd><a href="mailto:feusebius1710@gmail.com">feusebius1710@gmail.com</a></dd>
              </dl>
              <dl class="contact-list">
                <dt>phones:</dt>
                <dd><a href="tel:+255 765438924">+255 765438924</a> <span>or</span> <a href="tel:#">+255 765438924</a>
                </dd>
              </dl>
            </div>
            <div class="col-md-4 col-xl-3">
              <h5>Links</h5>
              <ul class="nav-list">
                <li><a href="about-us">About</a></li>
                <li><a href="projects">Projects</a></li>
                <li><a href="contact-us">Contacts</a></li>
                <li><a href="terms-condition">Terms and Condition</a></li>                
              </ul>
            </div>
          </div>
        </div>
        <div class="row no-gutters social-container">
          <div class="col"><a class="social-inner" href="https://web.facebook.com/filbert.eusebius.7"><span class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
          <div class="col"><a class="social-inner" href="https://www.instagram.com/musicophile__/?hl=en"><span class="icon mdi mdi-instagram"></span><span>instagram</span></a></div>
          <div class="col"><a class="social-inner" href="https://twitter.com/FEusabius"><span class="icon mdi mdi-twitter"></span><span>twitter</span></a></div>
          <div class="col"><a class="social-inner" href="https://plus.google.com/u/0/100476806516290295706"><span class="icon mdi mdi-youtube-play"></span><span>google</span></a></div>
        </div>
      </footer>
      <style>
      
      .context-dark, .bg-gray-dark, .bg-primary {
    color: rgba(255, 255, 255, 0.8);
}

.footer-classic a, .footer-classic a:focus, .footer-classic a:active {
    color: #ffffff;
}
.nav-list li {
    padding-top: 5px;
    padding-bottom: 5px;
}

.nav-list li a:hover:before {
    margin-left: 0;
    opacity: 1;
    visibility: visible;
}

ul, ol {
    list-style: none;
    padding: 0;
    margin: 0;
}

.social-inner {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 23px;
    font: 900 13px/1 "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.5);
}
.social-container .col {
    border: 1px solid rgba(255, 255, 255, 0.1);
}
.nav-list li a:before {
    content: "\f14f";
    font: 400 21px/1 "Material Design Icons";
    color: #4d6de6;
    display: inline-block;
    vertical-align: baseline;
    margin-left: -28px;
    margin-right: 7px;
    opacity: 0;
    visibility: hidden;
    transition: .22s ease;
}</style>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}">
    </script>
</body>
</html>
