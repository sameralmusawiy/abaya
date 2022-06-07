@extends('layouts.sitelayouts.header')

@section('content')
<style>
    body{
        background-color: #efeff2;
    }
    .card{
        width: 85%;
        float: none;
        margin-bottom: 10px;
        margin: 0 auto;
        border:none;
    }
    .card h5{
        font-size:border;
    }


</style>

<div class="container my-3 ">
    @foreach ($shipping_and_return as $item)
    <div class="card my-4 p-3" >
        <div class="row g-0">
            <div class="col-md-9">
                <div class="card-body">
                    <h1 class="card-title" style="font-size:25px;">{{ $item->title }}</h1>
                    <h6>{!! $item->description !!}</h6>
                </div>
            </div>
            <div class="col-md-3">
                <img src="{{URL::asset('public/uploads/images/'.$item->photo) }}" class="img-fluid rounded-start" style="width: 75%;" alt="...">
            </div>
        </div>
    </div>

    @endforeach

</div>



@endsection
