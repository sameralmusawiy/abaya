<!DOCTYPE html>
<html dir="rtl" lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- ----------------Bootstrap CSS ------------------ --}}
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script> --}}
  <link href="{{ asset('/src/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
<style>

.navbar{
    /* background: linear-gradient(10deg,rgb(27, 27, 27), rgb(252, 252, 252)); */
    background-color: #141414;
    box-shadow: 0 4px 8px 0 rgba(3, 3, 3, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    /* z-index: 1; */
    /* position: fixed; */
}

main {
    display: flex;

    flex-wrap: nowrap;
    height: 100vh;
    height: -webkit-fill-available;
    max-height: 100vh;
    overflow-x: auto;
    overflow-y: hidden;
    /* display: inline-flex; */

}
#mainPage{
    background-color: rgb(255, 255, 255);

}

.b-example-divider {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
}

.bi {
    vertical-align: -.125em;
    pointer-events: none;
    fill: currentColor;
}

.dropdown-toggle { outline: 0; }

.nav-flush .nav-link {
    border-radius: 0;

}

.btn-toggle {
    display: inline-flex;
    align-items: center;
    padding: .25rem .5rem;
    font-weight: 600;
    /* color: rgb(0, 0, 0); */
    background-color: transparent;
    border: 0;
   color: #313131;


}
.btn-toggle:hover,
.btn-toggle:focus {
    /* color: rgb(0, 0, 0); */
    background-color: #505050;
    /* width: 100%; */
    /* border-top-left-radius: 50%; */
    color: #ffffff;
    padding-left: 20% ;
    /* padding-right: 20%; */


}

.btn-toggle::after {
    width: 1.25em;
    line-height: 0;
    /* content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e"); */
    transition: transform .35s ease;
    transform-origin: .5em 50%;
    transform: rotate(180deg);

}

.btn-toggle {
    color: #313131;
    font-size: 1.2rem;
}
.btn-toggle[aria-expanded="true"]::before {
    /* transform: rotate(180deg); */
}

.btn-toggle-nav a {
    display: inline-flex;
    padding: .1875rem .5rem;
    margin-top: .125rem;
    margin-left: .125rem;
    text-decoration: none;
    color: #313131;
}
.btn-toggle-nav a:hover,
.btn-toggle-nav a:focus {
    color: #313131;
}

.scrollarea {
    overflow-y: auto;
}

.fw-semibold { font-weight: 600; }
.lh-tight { line-height: 1.25; }

.navbar{
    display: flex;
    /* float: left; */
  }
ul{
    list-style: none;

  }
li a{
    font-size: 1.1rem;
  }
.footer{
    background: linear-gradient(10deg, rgb(252, 252, 252),rgb(45, 127, 235));
}
#icon{
    color :#000000;
}

#pageTitle{
    color:#6d6570;
}

@media only screen and (max-width:767px) {
        .navbarNav{
            /* visibility: none; */
            display: none;

            }
        }

@media only screen and (min-width:767px) {
#navbarLeftSidNav{
    /* visibility: none; */
    display: none;

    }
}
</style>


</head>

<body>
@if (Auth::check() )
    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager')

    <nav class="navbar navbar-expand-sm ">
        <div class="container-fluid">
            <div >
                <ul class="navbar-nav" >
                    <li class="nav-item p-0">
                        <a class="nav-link disabled p-0 text-white" href="{{ route('home.index') }}"><img src="{{ asset('/src/photos/pageImage/logo2.png') }}" alt="" width="40" height= 'auto'></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="{{ url('/') }}" style="font-family: 'Almarai', sans-serif;
                        font-family: 'Amiri', serif;"> <h4>عباية ستايل</h4></a>
                    </li>
                </ul>
            </div>
            <button  class="btn toggler navbarNav  p-2 bg-whait" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span><i style="color :white; font-size:1.5rem;" class="bi bi-list "></i></span>
            </button>
            <button id="navbarLeftSidNav" class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                <span><i style="color :white; font-size:1.5rem;" class="bi bi-text-indent-left"></i></span>
            </button>
        </div>
    </nav>
    <div class="container-fluid ">
        <div class="row flex-nowrap "  >
            <div class="navbarNav col-auto col-md-4 col-xl-2 px-sm-2 px-0  " id="navbarNavDropdown" style=" background-color:#dadae3; z-index:2;  box-shadow: 0 4px 8px 0 rgba(3, 3, 3, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class=" flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100" >
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        {{-- <span class="fs-5 d-none d-sm-inline">Menu</span> --}}
                    </a>
                    <ul class="p-0" class="list-unstyled ps-0 collapse collapse-horizontal" id="collapseWidthExample">
                        <li class="mb-1">

                            <a class="btn btn-toggle align-items-center rounded " href="{{ route('home.index') }}" >
                                <i id ='icon' class="bi bi-ui-radios-grid px-3"></i> لوحة التحكم
                            </a>
                        </li>
                        <li class="mb-1">

                            <a href="" class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#prodects-collapse" aria-expanded="true">
                                <i id ='icon' class="bi bi-bag-check-fill px-3"></i> المنتجات
                            </a>
                            <div class="collapse" id="prodects-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                                <li><a href="{{ route('products_types.home') }}" class=" rounded"> كل المنتجات</a></li>
                                <li><a href="{{ route('products.index') }}" class=" rounded">اضافة نوع</a></li>
                                <li><a href="{{ route('products_types.index') }}" class=" rounded">اضافة منتج</a></li>

                            </ul>
                            </div>
                        </li>
                        <li class="mb-1">

                            <a href="" class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#offers-collapse" aria-expanded="true">
                                <i id ='icon' class="bi bi-shop px-3"></i> العروض
                            </a>
                            <div class="collapse" id="offers-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                                <li><a href="{{ route('offers.index') }}" class=" rounded">اضافة عرض</a></li>
                                <li><a href="{{ route('offers.allOffers') }}" class=" rounded">العروض الحالية</a></li>
                            </ul>
                            </div>
                        </li>
                        <li class="mb-1">

                            <a href="" class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#ads-collapse" aria-expanded="true">
                                <i id ='icon' class="bi bi-badge-ad px-3"></i>  اعلانات
                            </a>
                            <div class="collapse" id="ads-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                                <li><a href="{{ route('ads.index') }}" class=" rounded">اعلاانات</a></li>
                                <li><a href="{{ route('firstSlider.index') }}" class=" rounded">عروض 1</a></li>
                                <li><a href="{{ route('secondSlider.index') }}" class=" rounded">عروض 2</a></li>
                                <li><a href="{{ route('todaySlide.index') }}" class=" rounded">عروض يومية</a></a></li>
                            </ul>
                            </div>
                        </li>
                        <li class="mb-1">

                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                            <i id ='icon' class="bi bi-gear-wide-connected px-3"></i> الخصائص
                        </button>
                        <div class="collapse" id="home-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{ route('colors.index') }}" class=" rounded"> الالوان</a></li>
                            <li><a href="{{ route('fabrics.index') }}" class=" rounded"> الاقمشة</a></li>
                            <li><a href="{{ route('sizes.index') }}" class=" rounded">الاحجام</a></li>
                            <li><a href="{{ route('deliveries.index') }}" class=" rounded">التوصيل</a></li>

                            </ul>
                        </div>
                        </li>

                        <li class="mb-1">

                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#pages-collapse" aria-expanded="true">
                                <i  id ='icon' class="bi bi-journals px-3"></i> الصفحات
                            </button>
                            <div class="collapse" id="pages-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                                <li><a href="{{ route('pages.index') }}" class=" rounded"> الصفحات</a></li>
                                <li><a href="{{ route('about_us.index') }}" class=" rounded">من نحن</a></li>
                                <li><a href="{{ route('contact_us.index') }}" class=" rounded">اتصل بنا</a></li>
                                <li><a href="{{ route('shipping_and_return.index') }}" class=" rounded">الشحن و الاسترجاع</a></li>
                                <li><a href="{{ route('help_Center.index') }}" class=" rounded">مركز المساعدة</a></li>
                                <li><a href="{{ route('payment_Methods.index') }}" class=" rounded">طرق الدفع</a></li>
                            </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="true">
                            <i id ='icon' class="bi bi-telephone px-3"></i> الطلبات
                        </button>
                        <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{ route('orders.index') }}" class=" rounded">كل الطلبات</a></li>
                            {{-- <li><a href="#" class=" rounded">Processed</a></li>
                            <li><a href="#" class=" rounded">Shipped</a></li>
                            <li><a href="#" class=" rounded">Returned</a></li> --}}
                            </ul>
                        </div>
                        </li>
                        <li class="border-top my-3"></li>
                        <li class="mb-1">
                            @if (Auth::check() && Auth::user()->role == 'manager')
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="true">
                                <i id ='icon' class="bi bi-people px-3"></i> المستخدمون
                            </button>
                            <div class="collapse" id="account-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('users.index') }}" class=" rounded">كل المستخدمون</a></li>
                                {{-- <li><a href="{{ route('users.profile') }}" class=" rounded">البروفايل</a></li> --}}

                            </ul>
                            </div>
                            @endif

                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4 ">
                        <a href="#" class="d-flex align-items-center  text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="true">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1 ">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-center">

                            <li><a class="dropdown-item" href="{{ route('users.profile') }}">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('تسجيل خروج') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3" id="mainPage">
                @yield('content')
            </div>
        </div>
    </div>


{{-- /////////////////////////////////////////////////////////////////////////////////////  Left Sid Bar //////////////////////// --}}

    <div style=" background-color:#dadae3;" class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-text-indent-right"></i></button>
        </div>
        <div class="offcanvas-body">
            <ul class="p-0" class="list-unstyled ps-0 collapse collapse-horizontal" id="collapseWidthExample">
                <li class="mb-1">

                    <a class="btn btn-toggle align-items-center rounded " href="{{ route('home.index') }}" >
                        <i id ='icon' class="bi bi-ui-radios-grid px-3"></i> لوحة التحكم
                    </a>
                </li>
                <li class="mb-1">
                    <a href="" class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#prodects-collapse" aria-expanded="true">
                        <i id ='icon' class="bi bi-bag-check-fill px-3"></i> المنتجات
                    </a>
                    <div class="collapse" id="prodects-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                        <li><a href="{{ route('products_types.home') }}" class=" rounded"> كل المنتجات</a></li>
                        <li><a href="{{ route('products.index') }}" class=" rounded">اضافة نوع</a></li>
                        <li><a href="{{ route('products_types.index') }}" class=" rounded">اضافة منتج</a></li>
                    </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <a href="" class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#offers-collapse" aria-expanded="true">
                        <i id ='icon' class="bi bi-shop px-3"></i> العروض
                    </a>
                    <div class="collapse" id="offers-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                        <li><a href="{{ route('offers.index') }}" class=" rounded">اضافة عرض</a></li>
                        <li><a href="{{ route('offers.allOffers') }}" class=" rounded">العروض الحالية</a></li>
                    </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <a href="" class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#ads-collapse" aria-expanded="true">
                        <i id ='icon' class="bi bi-badge-ad px-3"></i>  اعلانات
                    </a>
                    <div class="collapse" id="ads-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                        <li><a href="{{ route('ads.index') }}" class=" rounded">اعلاانات</a></li>
                        <li><a href="{{ route('firstSlider.index') }}" class=" rounded">عروض 1</a></li>
                        <li><a href="{{ route('secondSlider.index') }}" class=" rounded">عروض 2</a></li>
                        <li><a href="{{ route('todaySlide.index') }}" class=" rounded">عروض يومية</a></a></li>
                    </ul>
                    </div>
                </li>
                <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                    <i id ='icon' class="bi bi-gear-wide-connected px-3"></i> الخصائص
                </button>
                <div class="collapse" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ route('colors.index') }}" class=" rounded"> الالوان</a></li>
                    <li><a href="{{ route('fabrics.index') }}" class=" rounded"> الاقمشة</a></li>
                    <li><a href="{{ route('sizes.index') }}" class=" rounded">الاحجام</a></li>
                    <li><a href="{{ route('deliveries.index') }}" class=" rounded">التوصيل</a></li>

                    </ul>
                </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#pages-collapse" aria-expanded="true">
                        <i  id ='icon' class="bi bi-journals px-3"></i> الصفحات
                    </button>
                    <div class="collapse" id="pages-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                        <li><a href="{{ route('pages.index') }}" class=" rounded"> الصفحات</a></li>
                        <li><a href="{{ route('about_us.index') }}" class=" rounded">من نحن</a></li>
                        <li><a href="{{ route('contact_us.index') }}" class=" rounded">اتصل بنا</a></li>
                    </ul>
                    </div>
                </li>
                <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="true">
                    <i id ='icon' class="bi bi-telephone px-3"></i> الطلبات
                </button>
                <div class="collapse" id="orders-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="{{ route('orders.index') }}" class=" rounded">كل الطلبات</a></li>
                    </ul>
                </div>
                </li>
                <li class="border-top my-3"></li>
                <li class="mb-1">
                    @if (Auth::check() && Auth::user()->role == 'manager')
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="true">
                            <i id ='icon' class="bi bi-people px-3"></i> المستخدمون
                        </button>
                        <div class="collapse" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{ route('users.index') }}" class=" rounded">كل المستخدمون</a></li>
                        </ul>
                        </div>
                    @endif
                </li>
            </ul>
            <hr>
            <div class="dropdown pb-4 ">
                <a href="#" class="d-flex align-items-center  text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="true">
                    <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                    <span class="d-none d-sm-inline mx-1 ">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-center">
                    <li><a class="dropdown-item" href="{{ route('users.profile') }}">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('تسجيل خروج') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </div>

    {{-- ----------------Bootstrap JS ------------------ --}}
    <script src="{{ asset('/src/bootstrap/bootstrap.bundle.min.js') }}" defer></script>
    <script src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
    @endif
@else
<style>
    * {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  padding: 0;
  margin: 0;
}

#notfound {
  position: relative;
  height: 100vh;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 560px;
  width: 100%;
  padding-left: 160px;
  line-height: 1.1;
}

.notfound .notfound-404 {
  position: absolute;
  left: 0;
  top: 0;
  display: inline-block;
  width: 140px;
  height: 140px;
  background-image: url('/src/photos/pageImage/emoji.png');
  background-size: cover;
}

.notfound .notfound-404:before {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-transform: scale(2.4);
      -ms-transform: scale(2.4);
          transform: scale(2.4);
  border-radius: 50%;
  background-color: #f2f5f8;
  z-index: -1;
}

.notfound h1 {
  font-family: 'Nunito', sans-serif;
  font-size: 65px;
  font-weight: 700;
  margin-top: 0px;
  margin-bottom: 10px;
  color: #151723;
  text-transform: uppercase;
}

.notfound h2 {
  font-family: 'Nunito', sans-serif;
  font-size: 21px;
  font-weight: 400;
  margin: 0;
  text-transform: uppercase;
  color: #151723;
}

.notfound p {
  font-family: 'Nunito', sans-serif;
  color: #999fa5;
  font-weight: 400;
}

.notfound a {
  font-family: 'Nunito', sans-serif;
  display: inline-block;
  font-weight: 700;
  border-radius: 40px;
  text-decoration: none;
  color: #388dbc;
}

@media only screen and (max-width: 767px) {
  .notfound .notfound-404 {
    width: 110px;
    height: 110px;
  }
  .notfound {
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 110px;
  }
}

</style>

<div id="notfound">
    <div class="notfound">
        <div class="notfound-404"></div>
        <h1>404</h1>
        <h2>Oops! Page Not Be Found</h2>
        <p>Sorry but the page you are looking for does not exist, have been removed. name changed or is temporarily unavailable</p>
        <a href="/">اذهب الى الصفحة الرئيسية</a>
    </div>
</div>
{{-- <div class="text-center text-danger">
    <h1 class="my-5">Oops !!!!!!!, This Page Not Found</h1>
    <h1><i class="bi bi-emoji-frown rounded-circule text-dark" style="font-size:200px; background-color:yellow; border-radius:50%;"></i></h1>
</div> --}}

@endif
</body>
</html>

