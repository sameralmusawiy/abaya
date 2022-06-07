@extends('layouts.sitelayouts.header')

@section('content')

<style>
    body{
        background-color:#f3f3f3;

    }
    .hidden{
        /* visibility: hidden; */
        display: none;
    }
    .card{
        border:none;
        padding:0px;
    }
    
    .card:hover{
        box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
        transform: translateY(-5px);
        opacity: 1;
        transition-duration: .3s;
        border-radius:15px;

    }
</style>

<div class=" container mt-5 mb-5 ">
    <div class="card-body m-0 p-0">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-0 mb-5">
            @foreach ($offers as $offer)
                <div class="col">
                    <div class="card h-100 text-end mx-1">
                        @foreach ($offer->products_types->photo as $image)
                            @php
                                $new = [];
                                array_push($new, $image)
                            @endphp
                        @endforeach
                        <img id="img" src="{!!URL::asset('public/uploads/images/'.$new[0]) !!}" alt="..." class="p-3" style="height: 300px; padding:0px;border:none;">
                        <div class="card-body" style="border:none;">
                            <h5 class="card-title">{{ $offer->products_types->name }}</h5>
                            {{-- <p class="card-text text-danger">{{ $offer->products_types->price }}</p> --}}
                            <h6 class='text-danger small'><s>{{ $offer->products_types->price . ' ع د ' }}</s>{{ ' - ' }} {{ $offer->discount . ' ع د ' }}</h6>
                            <a class='btn bg-dark text-white' href="{!!route ('products_types.show', $offer->products_types->id)!!}" title="Show"><h6 class='small m-0'>عرض التفاصيل</h6></a>

                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>




@endsection
