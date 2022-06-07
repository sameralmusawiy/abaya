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

}

</style>

<div class="container my-5">
    @foreach ($payment_Methods as $item)
    <div class="card my-5 p-4" >
        <div class="row g-0">
          <div class="col-md-9">
            <div class="card-body">
                <h4 class="card-title mb-5" >{{ $item->title }}</h4>
                <h6>{!! $item->description !!}</h6>
            </div>
          </div>
          <div class="col-md-3">
            <img src="{{URL::asset('public/uploads/images/'.$item->photo) }}" class="img-fluid rounded-start" style="width: 50%;" alt="عباية ستايل">
          </div>
        </div>
    </div>

    @endforeach

</div>



@endsection
