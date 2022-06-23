@section('title')
    {{ 'عباية ستايل' }}
@endsection

@extends('layouts.sitelayouts.header')

@section('content')
<style>
    body{
        background-color:#E4E4E4;

    }
    .container-fluid {
        text-align: center;
        justify-content: center;

    }

    .hidden{
        /* visibility: hidden; */
        display: none;
    }
    .container-fluid  .bottonBtn{
        text-align: end;

    }
    #circle{
        display: flex;
        justify-content: center;
    }

    #circleImageBox{
        min-width: 300px;
        min-height: 300px;
        max-width: 350px;
        max-height: 350px;
        border-radius: 100%;
        margin-left: 25px;
        margin-right:25px;
        background: rgb(255, 255, 255) no-repeat center;
        overflow:hidden;

    }


    @media only screen and (max-width:430px) {
        #circleImageBox{
            min-width: 225px;
            min-height: 225px;
            max-width: 250px;
            max-height: 250;
            border-radius: 100%;
            margin-left: 0px;
            margin-right:0px;
            background: rgb(255, 255, 255) no-repeat center;
            overflow:hidden;

            }
        }


    #circleImage{
        width: 100%; /* or any custom size */
        height: 100%;
        object-fit: contain;
    }
    #offersClick{
        background-color:rgba(0, 0, 0, 0.7);
        color:white;
        border-radius: 50px;
        font-size:15px
    }


    #mineCard{
        border-radius:10px;
        transition-duration: .5s ;

    }
    #mineCard:hover{
        box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
        transform: translateY(-10px);
        opacity: 1;
        border-radius:25px;
    }

    .btn-more {
        display: inline-block;
        background: #1a1a1a;
        color: #fff;
        text-transform: uppercase;
        padding: 2px 10px;
        box-shadow: 0px 17px 10px -10px rgba(0, 0, 0, 0.4);
        cursor: pointer;
        -webkit-transition: all ease-in-out 300ms;
        transition: all ease-in-out 300ms;
        border:solid 1px black;
        border-radius:50px;
        font-family: 'Lateef', cursive;
        font-size: 20px;
        transition-duration: .5s ;

        }
    .btn-more:hover {
        box-shadow: 0px 37px 20px -20px rgba(0, 0, 0, 0.2);
        -webkit-transform: translate(0px, -10px) scale(1.1);
        transform: translate(0px, -10px) scale(1.1);
        color: #fff;
        transition-duration: .5s ;


    }

</style>



{{-- ////////////////////////////////////////////////////////////////////////////////////  Ads Carousel  ////////////// --}}


<div id="carouselExampleFade" class="carousel slide carousel-fade mb-2" data-bs-ride="carousel">
    <div class="carousel-inner">
        @if ($minSlider->count() > 0)
            @php
                $adsArr = [];
            @endphp
            @foreach ($minSlider as $item)
                @if ($item->isShow == 1)
                    @php
                        array_push($adsArr, $item)
                    @endphp
                    <div class="carousel-item" style=" overflow:hidden;max-height:576px" data-bs-interval="5000">
                        <img src="{{ URL::asset('/uploads/adsImage/'.$item->photo) }}" class="d-block w-100" alt="..." >
                        <div class="carousel-caption d-none d-md-block">
                            <a id= 'offersClick' href="{!!route ('offers.home')!!}" type="button" class=" btn px-4 py-1"
                           > تسوق الان</a>
                        </div>
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
                <div class="carousel-item active" style=" overflow:hidden;max-height:576px"  data-bs-interval="5000">
                    <img src="{{ URL::asset('/uploads/adsImage/'.$adsArr[0]->photo) }}" class="d-block w-100 " alt="..." >
                    <div class="carousel-caption d-none d-md-block">
                        <a id= 'offersClick' href="{!!route ('offers.home')!!}" type="button" class=" btn px-4 py-1  "
                        > تسوق الان</a>
                    </div>
                </div>
            @else
                <div style=" overflow:hidden;max-height:576px">
                    <img src="{{ asset('/src/photos/pageImage/Group 15@2x.png') }}" class="d-block w-100 " alt="عباية ستايل" style="">
                </div>
            @endif
        @else
            <div style=" overflow:hidden;max-height:576px">
                <img src="{{ asset('/src/photos/pageImage/Group 15@2x.png') }}" class="d-block w-100 " alt="عباية ستايل" style="">
            </div>
        @endif
    </div>
</div>

{{-- ////////////////////////////////////////////////////////////////////////////////////  Second Carousel  ////////////// --}}




  <div class="container-fluid mb-3 mt-3">
    <div class="row">
        <div class="col-md-6">
            <div id="carouselExampleFade1" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @if ($firstSlide->count() > 0)
                        @php
                            $firstS = [];
                        @endphp
                        @foreach ($firstSlide as $item)
                            @if ($item->isShow == 1)
                                @php
                                    array_push($firstS, $item)
                                @endphp
                                <div class="carousel-item" style="max-height:432px; overflow:hidden;">
                                    <img src="{{ URL::asset('/uploads/adsImage/'.$item->photo) }}" class="d-block w-100 " alt="عباية ستايل" style="overflow:hidden; max-height:432px">
                                    <div class="carousel-caption d-none d-md-block">
                                        <a id= 'offersClick' href="{!!route ('offers.home')!!}" type="button" class=" btn px-4 py-1"
                                       > تسوق الان</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @if (!empty($firstS))
                            <div class="carousel-item active" style="max-height:432px; overflow:hidden;" data-bs-interval="5000">
                                <img src="{{ URL::asset('/uploads/adsImage/'.$firstS[0]->photo) }}" class="d-block w-100 " alt="عباية ستايل" style="overflow:hidden; max-height:432px">
                                <div class="carousel-caption d-none d-md-block">
                                    <a id= 'offersClick' href="{!!route ('offers.home')!!}" type="button" class=" btn px-4 py-1"> تسوق الان</a>
                                </div>
                            </div>
                        @else
                            <img src="{{ asset('/src/photos/pageImage/01.jpg') }}" class="d-block w-100 " alt="عباية ستايل" style="overflow:hidden; max-height:432px">
                        @endif
                    @else
                        <img src="{{ asset('/src/photos/pageImage/01.jpg') }}" class="d-block w-100 " alt="عباية ستايل" style="overflow:hidden; max-height:432px">
                    @endif
                    {{-- <a href="{!!route ('offers.home')!!}" class="btn btn-dark px-5 rounded-cercule ">تسوق الان</a> --}}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="carouselExampleFade2" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade mb-2" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($secondSlide->count() > 0)
                                @php
                                    $secondS = [];
                                @endphp
                                @foreach ($secondSlide as $item)
                                    @if ($item->isShow == 1)
                                        @php
                                            array_push($secondS, $item)
                                        @endphp
                                        <div class="carousel-item" style="max-height:432px; overflow:hidden;">
                                            <img src="{{ URL::asset('/uploads/adsImage/'.$item->photo) }}" class="d-block w-100 " alt="..." style="max-height:432px">
                                            <div class="carousel-caption d-none d-md-block">
                                                <a id= 'offersClick' href="{!!route ('offers.home')!!}" type="button" class=" btn px-4 py-1"
                                               > تسوق الان</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @if (!empty($secondS))
                                <div class="carousel-item active" style="max-height:432px; overflow:hidden;" data-bs-interval="5000">
                                    <img src="{{ URL::asset('/uploads/adsImage/'.$secondS[0]->photo) }}" class="d-block w-100 " alt="عباية ستايل" style="overflow:hidden; max-height:432px">
                                    <div class="carousel-caption d-none d-md-block">
                                        <a id= 'offersClick' href="{!!route ('offers.home')!!}" type="button" class=" btn px-4 py-1"
                                       > تسوق الان</a>
                                    </div>
                                </div>
                                @else
                                    <img src="{{ asset('/src/photos/pageImage/04.jpg') }}" class="d-block w-100 " alt="عباية ستايل" style="overflow:hidden; max-height:432px">
                                @endif
                            @else
                                <img src="{{ asset('/src/photos/pageImage/04.jpg') }}" class="d-block w-100 " alt="عباية ستايل" style="overflow:hidden; max-height:432px">
                            @endif
                            {{-- <a href="{!!route ('offers.home')!!}" class="btn btn-dark px-5 rounded-cercule ">تسوق الان</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- ////////////////////////////////////////////////////////////////////////////////////  Therd Carousel  ////////////// --}}


<div class=" container-fluid">
    <div class="card container-fluid mt-0">
        <div class="card-body">
            <h5 class="card-title mb-5">اخر المنتجات</h5>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-0 mb-5">
                @foreach ($latestProducts as $products_type)
                    <div class="col">
                        <div id ='mineCard' class="card  mt-2 text-end mx-2 my-2">
                            @foreach ($products_type->photo as $image)
                                @php
                                    $new = [];
                                    array_push($new, $image)
                                @endphp
                            @endforeach
                            <img id="img" src="{!!URL::asset('/uploads/images/'.$new[0]) !!}" alt="..." class="p-4 border-none" style="height: 370px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $products_type->name }}</h5>
                                @if (isset($products_type->offers->discount))
                                    <h6 class='text-danger small'><s>{{ $products_type->price . ' ع د ' }}</s>{{ ' - ' }} {{ $products_type->offers->discount . ' ع د ' }}</h6>
                                @else
                                    <h6 class='text-danger small'>{{ $products_type->price . ' ع د ' }}</h6>
                                @endif
                                <a class='btn bg-dark text-white' href="{!!route ('products_types.show', $products_type->id)!!}" title="Show"><h6 class='small m-0'>عرض التفاصيل</h6></a>

                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
          <a href="{!!route ('products_types.latestProducts')!!}" class="btn btn-danger px-5 rounded-cercule btn-more">رؤية المزيد</a>
        </div>
    </div>
</div>



<div class=" container-fluid d-none d-lg-block">
    <div  class="card  mt-4" id= 'circle'>
        <div class="card-body">
            <h5 class="card-title mb-5">تسوق حسب الاقسام</h5>
            <div class='d-block'>
             @foreach ($products as $product)
            <div class='d-inline-block' >
                <div class='' id = 'circleImageBox'>
                    <img id='circleImage' src="{{  URL::asset('/uploads/images/'.$product->photo) }}" class="center img-tumbnail "  alt="{{ $product->name }}" >
                </div>
                <h5 class='d-block mt-3'><a class="text-decoration-none text-secondary" aria-current="page" href="{{ route('products_types.mainPart', $product->id) }}"  wire:click="render({{ $product->id }})" >{{ $product->name }}</a></h5>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</div>




<div class="container-fluid mb-4 d-none d-lg-block">
    <div class="card mt-4 ">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                <div class="col ">
                    <h5 id='iconsH' class="card-title d-inline">اسعار منخفضة</h5>
                    <img src="{{ asset('/src/photos/pageImage/Group 113@2x.png') }}" class="d-inline w-25 rounded" alt="عباية ستايل" style="">
                </div>
                <div class="col">
                    <h5 id='iconsH5' class="card-title d-inline">ارجاع الطلب في حالة الخطأ</h5>
                    <img src="{{ asset('/src/photos/pageImage/Group 112@2x.png') }}" class="d-inline w-25 rounded " alt="عباية ستايل" style="">
                </div>
                <div class="col">
                    <h5 id='iconsH5' class="card-title d-inline">الدفع عند الاستلام</h5>
                    <img src="{{ asset('/src/photos/pageImage/Group 111@2x.png') }}" class="d-inline w-25 rounded " alt="عباية ستايل" style="">
                </div>
                <div class="col">
                    <h5 id='iconsH5' class="card-title d-inline">الشحن الى باب المنزل</h5>
                    <img src="{{ asset('/src/photos/pageImage/Group 110@2x.png') }}" class="d-inline w-25  rounded " alt="عباية ستايل" >
                </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid">
    <div class="card ">
        <div class="card-body ">
            <h5 class="card-title mb-5 ">عبايات</h5>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-0 mb-5">

                @foreach ($abayaProducts as $products_type)
                    <div class="col">
                        <div id ='mineCard' class="card  mt-2 text-end m-2 ">
                            @foreach ($products_type->photo as $image)
                                @php
                                    $new = [];
                                    array_push($new, $image)
                                @endphp
                            @endforeach
                            <img id="img" class='p-4 w-100' src="{!!URL::asset('/uploads/images/'.$new[0]) !!}" alt="..."  style="height: 370px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $products_type->name }}</h5>
                                @if (isset($products_type->offers->discount))
                                    <h6 class='text-danger small'><s>{{ $products_type->price . ' ع د ' }}</s>{{ ' - ' }} {{ $products_type->offers->discount . ' ع د ' }}</h6>
                                @else
                                    <h6 class='text-danger small'>{{ $products_type->price . ' ع د ' }}</h6>
                                @endif
                                <a class='btn bg-dark text-white' href="{!!route ('products_types.show', $products_type->id)!!}" title="Show"><h6 class='small m-0'>عرض التفاصيل</h6></a>

                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach

            </div>
            @foreach ($products as $item)
                @if ($item->name == 'عبايات رأس')
                    <div class='bottonBtn'>
                        <a type="button" class="btn mb-2 mb-md-0 btn-danger  btn-more" aria-current="page" href="{{ route('products_types.mainPart', $item->id) }}"
                            wire:click="render({{ $item->id }})" >رؤية المزيد من العبايات</a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>



<div class="container-fluid mt-4">

<div class="card   ">
    <div class="card-body ">
        <h5 class="card-title mb-5 ">حجابات</h5>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-0 mb-5">

            @foreach ($hijabProducts as $products_type)
                <div class="col">
                    <div id ='mineCard' class="card  m-2 text-end">
                        @foreach ($products_type->photo as $image)
                            @php
                                $new = [];
                                array_push($new, $image)
                            @endphp
                        @endforeach
                        <img id="img" src="{!!URL::asset('/uploads/images/'.$new[0]) !!}" alt="..." class="p-4" style="height: 370px; ">
                        <div class="card-body">
                            <h5 class="card-title">{{ $products_type->name }}</h5>
                            @if (isset($products_type->offers->discount))
                                <h6 class='text-danger small'><s>{{ $products_type->price . ' ع د ' }}</s>{{ ' - ' }} {{ $products_type->offers->discount . ' ع د ' }}</h6>
                            @else
                                <h6 class='text-danger small'>{{ $products_type->price . ' ع د ' }}</h6>
                            @endif
                            <a class='btn bg-dark text-white' href="{!!route ('products_types.show', $products_type->id)!!}" title="Show"><h6 class='small m-0'>عرض التفاصيل</h6></a>

                        </div>
                    </div>
                    </a>
                </div>
            @endforeach

        </div>
        @foreach ($products as $item)
            @if ($item->name == 'حجابات')
                <div class='bottonBtn'>
                    <a type="button" class="btn mb-2 mb-md-0 btn-danger btn-more" aria-current="page" href="{{ route('products_types.mainPart', $item->id) }}"
                        wire:click="render({{ $item->id }})" >رؤية المزيد من الحجابات</a>
                </div>
            @endif
        @endforeach
    </div>
</div>
</div>

<div class="container-fluid mt-4">
<div class="card">
    <div class="card-body ">
        <h5 class="card-title mb-5 ">حقائب</h5>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-0 mb-5">

            @foreach ($bagsProducts as $products_type)
                <div class="col">
                    <div id ='mineCard' class="card  m-2 text-end">
                        @foreach ($products_type->photo as $image)
                            @php
                                $new = [];
                                array_push($new, $image)
                            @endphp
                        @endforeach
                        <img id="img" src="{!!URL::asset('/uploads/images/'.$new[0]) !!}" alt="..." class="p-4" style="height: 370px; ">
                        <div class="card-body">
                            <h5 class="card-title">{{ $products_type->name }}</h5>
                            @if (isset($products_type->offers->discount))
                                <h6 class='text-danger small'><s>{{ $products_type->price . ' ع د ' }}</s>{{ ' - ' }} {{ $products_type->offers->discount . ' ع د ' }}</h6>
                            @else
                                <h6 class='text-danger small'>{{ $products_type->price . ' ع د ' }}</h6>
                            @endif
                            <a class='btn bg-dark text-white' href="{!!route ('products_types.show', $products_type->id)!!}" title="Show"><h6 class='small m-0'>عرض التفاصيل</h6></a>

                        </div>
                    </div>
                    </a>
                </div>
            @endforeach

        </div>
        @foreach ($products as $item)
            @if ($item->name == 'حقائب')
                <div class='bottonBtn'>
                    <a type="button" class="btn mb-2 mb-md-0 btn-danger btn-more" aria-current="page" href="{{ route('products_types.mainPart', $item->id) }}"
                        wire:click="render({{ $item->id }})" >رؤية المزيد من الحقائب</a>
                </div>
            @endif
        @endforeach
    </div>
</div>
</div>



<div id="carouselExampleFade" class="carousel slide carousel-fade mb-4 mt-4" data-bs-ride="carousel">
    <div class="carousel-inner">
        @if ($today_offers_slides->count() > 0)
            @php
                $today_Arr = [];
            @endphp
            @foreach ($today_offers_slides as $item)
                @if ($item->isShow == 1)
                    @php
                        array_push($today_Arr, $item)
                    @endphp
                    <div class="carousel-item" style=" overflow:hidden;" data-bs-interval="5000">
                        <img src="{{ URL::asset('/uploads/adsImage/'.$item->photo) }}" class="d-block w-100" alt="..." >
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
            @if (!empty($today_Arr))
                <div class="carousel-item active"  data-bs-interval="000">
                    <img src="{{ URL::asset('/uploads/adsImage/'.$today_Arr[0]->photo) }}" class="d-block w-100 " alt="..." >
                </div>
            @else
                <img src="{{ asset('/src/photos/pageImage/Group 15@2x.png') }}" class="d-block w-100 " alt="عباية ستايل" style="">
            @endif

        @else
            <img src="{{ asset('/src/photos/pageImage/Group 15@2x.png') }}" class="d-block w-100 " alt="عباية ستايل" style="">
        @endif
    </div>
</div>










@endsection
