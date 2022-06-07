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
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-0 mb-5">
            @if (isset($productType) )
                @foreach ($productType as $products_type)
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
                                <img id="img" src="{!!URL::asset('public/uploads/images/'.$new[0]) !!}" alt="..." class="p-3 w-100" style="height: 360px; padding:0px;">
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
            @endif

        </div>
    </div>
    @if (!isset($productType))
    <div class="alert alert-danger" role="alert">
        {{ $status }}
      </div>
    @endif

</div>
{{-- @livewire('shop-component', ['productsID' => $productsID]) --}}
@endsection
