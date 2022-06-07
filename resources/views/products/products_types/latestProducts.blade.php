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
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
</style>

<div class=" container mt-5 mb-5 ">
    <div class="card-body m-0 p-0">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-0 mb-5">
            @foreach ($products_types as $products_type)
                <div class="col">
                    <div class="card  text-end m-1">
                        @foreach ($products_type->photo as $image)
                            @php
                                $new = [];
                                array_push($new, $image)
                            @endphp
                        @endforeach
                        <img id="img" src="{!!URL::asset('public/uploads/images/'.$new[0]) !!}" alt="..." class="p-2" style="height: 300px; padding:0px;border:none;">
                        <div class="card-body" style="border:none;">
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
    </div>
        {{ $products_types->links() }}

</div>

@endsection
