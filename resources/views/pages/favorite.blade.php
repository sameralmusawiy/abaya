@extends('layouts.sitelayouts.header')

@section('content')

<style>
    body{
        background-color:#f1f1f1;

    }

    .hidden{
        /* visibility: hidden; */
        display: none;
    }

    .card{

        border-radius:25px;

    }


    .card:hover{
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        transform: translateY(-10px);
        opacity: 1;
        transition-duration: .3s;
        border-radius:25px;

    }

</style>





<div class=" container mt-5 mb-5 ">
    <div class="card-body m-0 p-0">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-0 mb-5">
            @foreach ($favorites as $item)
            @if ($item->user_id == Auth::user()->id)
            <div class="col">
                <div class="card  text-end m-1">
                    @foreach ($item->products_types->photo as $image)
                        @php
                            $new = [];
                            array_push($new, $image)
                        @endphp
                    @endforeach
                    <img id="img" src="{!!URL::asset('public/uploads/images/'.$new[0]) !!}" alt="..." class="p-2" style="height: 300px; padding:0px;border:none;">
                    <div class="card-body" style="border:none;">
                        <h5 class="card-title">{{ $item->products_types->name }}</h5>
                        {{-- <p class="card-text text-danger">{{ $offer->products_types->price }}</p> --}}
                        {{-- <h6 class='text-danger small'><s>{{ $item->products_types->price . ' ع د ' }}</s>{{ ' - ' }} {{ $item->products_types->offers->discount . ' ع د ' }}</h6> --}}


                        @if (isset($products_types->offers->discount))
                            <p type="" value="{{ $products_types->offers->discount }}" >{{ $products_types->offers->discount }} </p>
                        @else
                            <p type="" value="{{ $item->products_types->price }}">{{ $item->products_types->price }}</p>
                        @endif


                        <a class='btn bg-dark text-white' href="{!!route ('products_types.show', $item->products_types->id)!!}" title="Show"><h6 class='small m-0'>عرض التفاصيل <i class="bi bi-cart4"></i></h6></a>

                    </div>
                </div>
                </a>
            </div>
            @endif

            @endforeach
        </div>
    </div>
</div>


@endsection
