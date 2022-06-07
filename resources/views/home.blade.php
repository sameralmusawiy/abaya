@section('title')
    {{ 'لوحة التحكم' }}
@endsection

@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')

<style>

    .carousel-item > .carousel-caption{
        background-color:rgba(0, 0, 0, 0.7);
        color:rgb(255, 255, 255);
        border-radius:50px;

    }


</style>



<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                {{-- <i class="material-icons opacity-10">العروض الحالية</i> --}}
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0">العروض الحالية</p>
                <h4 class="mb-0 d-inline"> {{  $offers->count()  }} <h6 class="d-inline text-sm">متوفرة</h6></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2  bg-white">
              <p class="mb-0"><a href="{{ route('offers.allOffers') }}" class="btn text-primary rounded py-1 my-0">تفاصيل العروض</a></p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                @if ($not_read_order->count() > 0)
                    <div class="card-header p-3 pt-2">
                        <div class="text-end pt-1 d-inline-block">
                            <p class="text-sm mb-0 text-capitalize">طلبات غير مقروءة </p>
                            <h4 class="mb-0 d-inline"> {{ $not_read_order->count() }} <h6 class="d-inline text-sm">متوفرة</h6></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2  bg-white">
                        <a href="{{ route('orders.index') }}" type="button" class="btn text-success rounded py-1 my-0 position-relative">
                            الطلبات
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $not_read_order->count() }}
                            </span>
                        </a>
                    </div>
                    @else
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        {{-- <i class="material-icons opacity-10">person</i> --}}
                        </div>
                        <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">طلبات غير مقروءة</p>
                        <h4 class="mb-0 d-inline"> {{ $not_read_order->count() }} <h6 class="d-inline text-sm">متوفرة</h6></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2  bg-white">
                        <p class="mb-0"><a href="{{ route('orders.index') }}" class="btn text-primary rounded py-1 my-0">الطلبات</a></p>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                {{-- <i class="material-icons opacity-10">person</i> --}}
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">المستخدمون</p>
                <h4 class="mb-0 d-inline"> {{ Auth::user()->count()}} <h6 class="d-inline text-sm">مستخدم</h6></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2  bg-white">
                @if (Auth::user()->role == 'manager')
                    <p class="mb-0"><a href="{{ route('users.index') }}" class="btn text-primary rounded py-1 my-0">ادارة المستخدمون</a></p>
                @else
                    <p class="mb-0"><a href="{{ route('users.index') }}" class="btn text-danger rounded py-1 my-0 disabled" >ادارة المستخدمون</a></p>
                @endif
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                {{-- <i class="material-icons opacity-10">weekend</i> --}}
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">المنتجات</p>
                <h4 class="mb-0 d-inline"> {{ $rodects_types->count() }} <h6 class="d-inline text-sm">منتج</h6></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2  bg-white">
                <p class="mb-0"><a href="{{ route('products_types.home') }}" class="btn text-primary rounded py-1 my-0">تفاصيل المنتجات</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-8 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @if ($firstSlide->count() > 0)
                        @php
                            $adsArr = [];
                        @endphp
                        @foreach ($firstSlide as $item)
                            @if ($item->isShow == 1)
                                @php
                                    array_push($adsArr, $item)
                                @endphp
                                <div class="carousel-item" style=" overflow:hidden;" data-bs-interval="5000">
                                    <img src="{{ URL::asset('public/uploads/adsImage/'.$item->photo) }}" class="d-block w-100" alt="..." >
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        @endforeach
                        @if (!empty($adsArr))
                            <div class="carousel-item active"  data-bs-interval="5000">
                                <img src="{{ URL::asset('public/uploads/adsImage/'.$adsArr[0]->photo) }}" class="d-block w-100 " alt="..." >
                            </div>
                        @else
                        <img src="{{ asset('public/src/photos/pageImage/Group 15@2x.png') }}" class="d-block w-100 " alt="عباية ستايل" styl  e="">
                        @endif
                    @else
                        <img src="{{ asset('public/src/photos/pageImage/Group 15@2x.png') }}" class="d-block w-100 " alt="عباية ستايل" style="">
                    @endif
                </div>
            </div>
        </div>
        </div>

        <div class="col-lg-4 mt-4 mb-3">
            <div class="card  ">
                <div id="carouselExampleCaptions2" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($products as $product)
                            <div class="carousel-item " style="max-height:480px; overflow:hidden">
                                <img src="{{  URL::asset('public/uploads/images/'.$product->photo) }}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block py-2" style="background-color:rgba(83, 83, 83, 0.5); color:rgb(248, 248, 248)">
                                <h5 class='' >{{ $product->name }}</h5>
                                {{-- <p>Some representative placeholder content for the first slide.</p> --}}
                                </div>
                            </div>
                        @endforeach
                        <div class="carousel-item active" style="height:480px; overflow:hidden" data-bs-interval="5000">
                            <img src="{{ asset('/public/src/photos/pageImage/products-and-services.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block py-2">
                            <h5 class=''>المنتجات</h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
      </div>

      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            
          </div>
        </div>
      </footer>
    </div>
  </main>







@endsection
