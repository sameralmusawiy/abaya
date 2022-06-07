@extends('layouts.sitelayouts.header')

@section('content')


<style>
    body{
        font-family: cairo,sans-serif;

    }
    .hidden{
        /* visibility: hidden; */
        display: none;
    }
    #img{
        /* border-bottom-left-radius: 200px 70px;
        border-bottom-right-radius: 200px 70px; */
    }
    .form-check .form-check-input {
        float: right;
    }
    label{
        float: left;

    }
    #sidBar{
        justify-content: center;
    }
    a{
        text-decoration: none;
        color: black;
    }

    .card{
        border-radius:15px;
        /* box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px; */
    }
    .card:hover{
        box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
        transform: translateY(-5px);
        opacity: 1;
        transition-duration: .3s;
        border-radius:15px;

        }

        .sizePtn:hover,
        .sizePtn:focus{
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
            background-color: rgb(100, 100, 100);
        }

    </style>


<div class="container mt-5 mb-5">
    <div class="row">
        <div id="sidBar" class="col-12 col-md-3 mt-5">
            <form class=""action="{{ route('products_types.mainPart', $productsID->id) }}" method="GET"  enctype="multipart/form-data">
                @csrf
            <h5 class='mb-4'>نوع القماش</h5>
            @foreach ($fabrics as $fabric)
                <div class=" form-check">
                    <input class="sizePtn form-check-input" type="checkbox" value="{{ $fabric->name }}" name="fabric" id="defaultCheck1">
                    <label class=" form-check-label" for="defaultCheck1">{{ $fabric->name }}</label>
                </div>
            @endforeach
            <hr class='divider'>
            <h5 class='mb-3'>اللون</h5>
            @foreach ($colors as $color)
                <div class="form-check form-check-inline">
                    <input class="sizePtn form-check-input" type="radio" name="color" id="inlineRadio1" value="{{ $color->value }}" style='background-color:{{ $color->value }};'>
                </div>
            @endforeach
            <hr class='divider'>
            <h5 class='mb-3'>الحجم</h5>
            @foreach ($sizes as $size)
            <div class=" form-check form-check-inline mx-0 my-2 px-0" >
                <input type="checkbox" name='size' class="sizePtn btn-check" id="{{ $size->name }}" autocomplete="off" value="{{ $size->name }}">
                <label class="sizePtn btn btn-outline" for="{{ $size->name }}" style="background-color: rgb(236, 236, 236);">{{ $size->name }}</label><br>
                    {{-- <input href="" name='{{ $size->name }}'  class='btn-light px-2 mx-1 ' style="background-color: rgb(236, 236, 236);">{{ $size->name }}</a> --}}
                </div>
            @endforeach
            <hr class='divider'>
            <div class="form-check form-check-inline mx-0 my-2 px-0">
                <h5 class='mb-3'>السعر</h5>
                من <input type="text" name='min_price' class="" min="" max="" id="customRange1" style="width: 100px;"> الى
                <input type="text" name='max_price' class="" min="10.000" min="1000" id="customRange1" style="width: 100px;">
            </div>
            <hr class='divider'>

            <button type="submit" class="btn btn-dark form-control mt-1">فلترة</button>
        </form>

        </div>

        <div class="col-md-9">
            <div class="row g-3">
                <div class="col-md-4 mb-2">
                    <form class="row g-3"action="{{ route('products_types.mainPart',$productsID->id) }}" method="POST"  enctype="multipart/form-data">

                    <!--<select id="inputState" name="sorting" class="form-select" wire:model="sorting" style="border:none">-->
                    <!--    <option value="default" selected>بدون ترتيب</option>-->

                    <!--    <option value="name" name='sort_new'>فرز: الاحدث</option>-->
                    <!--    <option value="price" name='price'>فرز: من الاقل الى الاعلى</option>-->
                    <!--    <option value="price-desc" name='price_desc'>فرز: من الاعلى الى الاقل</option>-->

                    <!--</select>-->
                    </form>
                </div>
                <div class="col-md-4">
                    {{-- <input type="text" class="form-control" id="inputCity"> --}}
                </div>

                  {{-- <div class="col-md-4">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                  </div> --}}
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-0 mb-5">
                @foreach ($products_types as $products_type)
                    <div class="col">
                        <a href="{!!route ('products_types.show', $products_type->id)!!}" title="Show"  >
                         <div class="card  mt-2  m-1">
                            @php
                                $new = [];
                            @endphp
                            @foreach ($products_type->photo as $image)
                                @php
                                    array_push($new, $image)
                                @endphp
                            @endforeach
                            @if (!empty($new))
                                <img id="img" src="{!!URL::asset('/uploads/images/'.$new[0]) !!}" alt="..." class="p-3 w-100" style="height: 360px; padding:0px;">
                            @endif
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
                {{ $products_types->links() }}
        </div>
    </div>
</div>

{{-- @livewire('shop-component', ['productsID' => $productsID]) --}}
@endsection
