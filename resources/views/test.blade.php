@extends('layouts.sitelayouts.header')

@section('content')


<style>
    .hidden{
        visibility: hidden;
        display: none;
    }
    #img{
        /* border-bottom-left-radius: 200px 70px;
        border-bottom-right-radius: 200px 70px; */



    }
</style>






<div class="container">
    <div class="row">
        <div class="col-6 col-md-3">

        </div>
        <div class="col-md-9">
            <div class="row g-3">
                <div class="col-md-4">
                    @livewire('shop-component')
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="inputCity">
                </div>

                  {{-- <div class="col-md-4">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                  </div> --}}
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-0">
                @foreach ($products_types as $products_type)
                <div class="col">
                    <div class="card h-100">
                    @foreach (json_decode($products_type->photo) as $image)
                    @php
                        $new = [];
                        array_push($new, $image)
                    @endphp
                    @endforeach
                    <img id="img" src="{!!URL::asset('/uploads/images/'.$new[0]) !!}" alt="..." class="px-1" style="height: 37  0px; padding:0px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $products_type->name }}</h5>
                        <p class="card-text">{{ $products_type->price }}</p>
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class='hidden'>
                            <input type="hidden" value="{{ $products_type->id }}" name="id">
                            <input type="text" value="{{ $products_type->name }}" name="name">
                            <input type="" value="{{ $products_type->price }}" name="price">
                            <input type="text" value="{{ $products_type->fabric }}" name="fabric">
                            <input type="hidden" value="{{ $products_type->image }}"  name="photo[]">
                            <input type="" value="1" name="quantity">
                        </div>
                        <button class="btn btn-dark py-0 small">اضافة الى السلة <i class="bi bi-cart4"></i></button>
                    </form>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
