<!doctype html>
<html dir="rtl" lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=Lateef&family=Mada:wght@300&family=Mali:wght@300&display=swap" rel="stylesheet">





    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type='text/javascript'></script>
    <script src='https://unpkg.com/spritespin@x.x.x/release/spritespin.js' type='text/javascript'></script>





    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/src/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    @livewireStyles

    <style>
        .navbar{
            font-family: cairo,sans-serif;
            font-weight: bold;
        }
        #fNavbar a, #fNavbar2 a{
            color: white;
        }



        @media only screen and (max-width:767px) {
        #fNavbar{
            border-top:  none;
            background-color: rgb(230, 230, 230);
            border-bottom-left-radius:  0px;
            border-bottom-right-radius:  0px;
            display: none;

            }
        }




        @media only screen and (min-width:767px) {
        #fNavbar2{
            /* visibility: none; */
            display: none;

            }
        }

        li input[type=text] {
            border: solid 0px black;
            background-color:#EEEEEE;
            margin-top: 8px;
            font-size: 20px;
            padding-right: 3%;
            width: 80vh;
            padding-bottom: 10px;
            border-radius: 50px;

        }


        @media only screen and (max-width:1074px) {
            li input[type=text]{
                width: 60vh;
            }
        }
        @media only screen and (max-width:910px) {
            li input[type=text]{
                width: 42vh;

            }
        }

        .btnSearch{
            border: solid 0px black;
            background-color:#1d1d1d;
            color: white;
            margin-top: 8px;
            margin-right: 8px;
            border-radius: 50px;

            font-size: 20px;
            width: 80px;
        }


        @media only screen and (max-width:767px) {
        #sNavbar{
            /* visibility: none; */
            display: none;
            }
        }

        @media only screen and (max-width:1024px) {
        #sInput{
            width: 42vh;
            }
        }

        @media only screen and (min-width:767px) {
        #sNavbar2{
            /* visibility: none; */
            display: none;
            }
        }

        #sNavbarContent{
            padding-inline-start: 0px;

        }
        #sNavbarContent li {
            font-size: 1.7rem;
            padding-top:0px;
            margin-top:0px;
            margin-left:10px;
            margin-right:10px;
        }

        #sNavbarContent2{
            padding-inline-start: 0px;
            display: block;
            float: left;
        }
        #sNavbarContent2 li {
            font-size: 1.7rem;
            padding-top:0px;
            float: left;
            margin-top:0px;
            margin-left:10px;
            margin-right:10px;
        }

        #navIcons{
            background-color:#EEEEEE;
            color:black;
            padding-top: 0px;
            padding-bottom: 0px;
            margin-top:6px;
        }


        #tNavbar{
            background-color:#E4E4E4;
            padding-top:0px;
            padding-bottom:0px;

        }
        #tNavbar ul li a{
            text-decoration: none;
            color:black;
            font-family: cairo,sans-serif;
            padding: 15px 25px 15px 25px;
        }
        #tNavbar ul li a:hover{
            background-color: black;
            color:rgb(255, 255, 255);

        }


        @media only screen and (max-width:767px) {
        #tNavbar{
            display: none;

            }
        }

        #instagram:hover{
            color:rgb(163, 33, 131);
        }

    </style>
</head>
<body class="d-flex flex-column h-100">

    <header>
    <!-- First navbar -->
        <nav id ='fNavbar' class="navbar navbar-expand-md  bg-dark p-0" aria-label="Ninth navbar example">
            <div class="container-xl">
                <div class="" id="test">
                    <ul class="navbar-nav me-right mb-2 mb-lg-0">
                        <!--<li class="nav-item dropdown">-->
                        <!--    <a class="nav-link dropdown-toggle " href="#" id="dropdown07XL" data-bs-toggle="dropdown" aria-expanded="false">العربية</a>-->
                        <!--    <ul class="dropdown-menu bg-dark" aria-labelledby="dropdown07XL">-->
                        <!--    <li><a class="dropdown-item" href="#">العربية</a></li>-->
                        <!--    <li><a class="dropdown-item" href="#">EN</a></li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('about_us.home') }}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('contact_us.home') }}">اتصل بنا</a>
                    </li>
                    <li class="nav-item">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('تسجيل') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a> --}}

                                {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
                                    <a class="nav-link text-white" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل الخروج') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                {{-- </div> --}}
                            </li>
                        @endguest
                    </li>
                    </ul>
                </div>
                <h5 class="text-white mb-0 mt-0">07735637071 / 07834473154 <i class="bi bi-telephone-plus"></i></h5>
            </div>
        </nav>
        <nav id ='fNavbar2' class="navbar bg-dark p-0" aria-label="Ninth navbar example">
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-justify text-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample07XL">
                <ul class="navbar-nav me-right mb-2 mb-lg-0">
                    <!--<li class="nav-item dropdown">-->
                    <!--    <a class="nav-link dropdown-toggle " href="#" id="dropdown07XL" data-bs-toggle="dropdown" aria-expanded="false">العربية</a>-->
                    <!--    <ul class="dropdown-menu bg-dark" aria-labelledby="dropdown07XL">-->
                    <!--    <li><a class="dropdown-item" href="#">العربية</a></li>-->
                    <!--    <li><a class="dropdown-item" href="#">EN</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('about_us.home') }}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('contact_us.home') }}">اتصل بنا</a>
                    </li>
                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('تسجيل') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a> --}}

                                {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
                                    <a class="nav-link text-white" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل الخروج') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                {{-- </div> --}}
                            </li>
                        @endguest
                </ul>
                <div class="divider bg-white"><hr></div>

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">الرئيسية</a>
                    </li>
                    @foreach ($products as $product)
                    <li class="nav-item" >
                        <a class="nav-link active" aria-current="page" href="{{ route('products_types.mainPart', $product->id) }}"  wire:click="render({{ $product->id }})" >{{ $product->name }}</a>
                    </li>
                    @endforeach
                </ul>
                <div class="divider bg-white"><hr></div>

                <form action="{{ route('products_types.siteSearch') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <button type="submite" class="btnSearch" ><i class="bi bi-search"></i>
                        </button>

                        <input type="text" name="q" class="search w-75 rounded" placeholder="بحث" aria-label="Search"  />
                    </div>
                </form>
            </div>
            {{-- <h6 class="text-white mb-0 mt-0 small p-2">07735637071 / 07834473154 <i class="bi bi-telephone-plus"></i></h6> --}}
        </nav>

    <!-- Second navbar -->

        <nav id='sNavbar' class="navbar navbar-expand-md bg-light justify-content-center" aria-label="Tenth navbar example">
            <div class="container-xl ">
                <div class="collapse navbar-collapse justify-content-md-center"  id="navbarsExample09">
                    <ul id='sNavbarContent' class="navbar-nav">
                        <li class="nav-item">
                            <a class="" href="{{ url('/') }}" ><img src="{{ asset('/src/photos/pageImage/logo.png') }}" alt="" width="40" height= 'auto'></a>
                        </li>
                        <li>
                        <form dir='ltr' action="{{ route('products_types.siteSearch') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input dir='rtl' id='sInput' type="text" name="q" class="search " placeholder="" aria-label="Search"  />
                                <button type="submite" class="btnSearch" ><i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                        </li>
                        <li  class="nav-item">
                            <a id='navIcons' class="nav-link position-relative" href="{{ route('cart.list') }}"><i class="bi bi-cart4"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark" style="font-size:10px;">
                                    {{ \Cart::getContent()->count()}}
                                  </span>

                            </a>
                        </li>
                        <li class="nav-item">
                             @if (Auth::check())
                                <a id='navIcons' class="nav-link " href="{!!route ('favorites.index')!!}"><i class="bi bi-heart"></i></a>
                            @else
                                <a id='navIcons'  onclick="myFunction()" class="nav-link " href="#"><i class="bi bi-heart"></i></a>

                                <script>
                                function myFunction() {
                                alert("قم بتسجيل الدخول لرؤية صفحة المنتجات المفضلة الخاصة بك");
                                }
                                </script>
                            @endif

                        </li>
                        <li class="nav-item">
                            @if (Auth::check())
                                <a href="{{ route('users.profile') }}" id='navIcons' class="nav-link "><i class="bi bi-person-circle"></i></a>
                            @else
                                <a id='navIcons'  onclick="myFunction()" class="nav-link " href="#"><i class="bi bi-person-circle"></i></a>

                                <script>
                                function myFunction() {
                                alert("قم بتسجيل الدخول لرؤية الصفحة الخاصة بك");
                                }
                                </script>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav id='sNavbar2' class="navbar navbar-expand-md bg-light justify-content-md-center" aria-label="Tenth navbar example">
            <div class="container-xl ">
                <a class="" href="#" ><img src="{{ asset('/src/photos/pageImage/logo.png') }}" alt="" width="40" height= 'auto'></a>
                    <ul id='sNavbarContent2' class="navbar-nav" style="">
                        <li class="nav-item">
                            <a id='navIcons' class="nav-link position-relative" href="{{ route('cart.list') }}"><i class="bi bi-cart4"><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark small">
                                {{ \Cart::getContent()->count()}}
                            </span></i>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a id='navIcons' class="nav-link "><i class="bi bi-heart"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id='navIcons' class="nav-link " href="#" ><i class="bi bi-person-circle"></i>
                            </a>
                        </li>
                    </ul>
            </div>
        </nav>

        <!-- Theard navbar -->

        <div id="tNavbar" class="navbar navbar-expand-md text-white">
            <div class="container-xl "style="">

                <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample07XL">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">الرئيسية</a>
                    </li>
                    @foreach ($products as $product)
                    <li class="nav-item" >
                        <a class="nav-link active" aria-current="page" href="{{ route('products_types.mainPart', $product->id) }}"  wire:click="render({{ $product->id }})" >{{ $product->name }}</a>
                    </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>


    </header>

<!-- Begin page content -->












@yield('content')




















<footer class=" text-lg-start bg-light text-muted">


    <!-- Section: Links  -->
    <section class="">
      <div class="container  text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 text-center">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
             سياسة
            </h6>
            <p>
              <a href="{{ route('shipping_and_return.home') }}" class="text-reset">الشحن و الاسترجاع</a>
            </p>
            <p>
              <a href="{{ route('payment_Methods.home') }}" class="text-reset">طرق الدفع</a>
            </p>
            <p>
              <a href="#!" class="text-reset">التعليمات</a>
            </p>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 text-center">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              دعم العملاء
            </h6>
            <p>
              <a href="{{ route('about_us.home') }}" class="text-reset">من نحن</a>
            </p>
            <p>
              <a href="{{ route('contact_us.home') }}" class="text-reset">اتصل بنا</a>
            </p>
            <p>
                @if (Auth::check())
                    <a href="{{ route('users.profile') }}" class="text-reset">حسابي</a>
                @else
                    <a href="#!" onclick="myFunction()" class="text-reset">حسابي</a>

                    <script>
                    function myFunction() {
                    alert("قم بتسجيل الدخول لرؤية الصفحة الخاصة بك");
                    }
                    </script>
                @endif
            </p>
            <p>
              <a href="{{ route('help_Center.home') }}" class="text-reset">مساعدة</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-center">
            <!-- Links -->
            <h6 class=" fw-bold mb-4">
              المنتجات
            </h6>
            @foreach ($products as $product)
                <p class=''>
                   <a class="nav-link text-secondary text-decoration-none " aria-current="page" href="{{ route('products_types.mainPart', $product->id) }}"  wire:click="render({{ $product->id }})" >{{ $product->name }}</a>
                </p>
            @endforeach
          </div>
          <!-- Grid column -->
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 text-center text-dark">
            <!-- Content -->
            <h6 class="fw-bold mb-4">
              <i class="fas fa-phone me-3"></i> للتواصل</h6>
            <p>
             07735637071 / 07834473154 <i class="bi bi-telephone-plus"></i>
            </p>
            <p >
                <a id='instagram' href="https://www.instagram.com/" style="" class='text-danger'><i class="bi bi-instagram p-3"></i></a>
                <a href="https://www.facebook.com/" class="text-primary"><i class="bi bi-facebook p-3"></i></a>
                <a href="https://www.twitter.com" class="text-primary"><i class="bi bi-twitter p-3"></i></a>
                <a href="https://www.youtube.com" class="text-danger"><i class="bi bi-youtube p-3"></i></a>

            </p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-1 " style="background-color: rgb(19, 19, 19); color:white;">
      <p>جميع الحقوق محفوظة لموقع عباية ستايل @ 2021</p>
    </div>
    <!-- Copyright -->
  </footer>

  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/src/bootstrap/bootstrap.bundle.min.js') }}" defer></script>
@livewireScripts

</body>
</html>
