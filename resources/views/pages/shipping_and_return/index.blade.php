@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-secondary" id="pageTitle">الشحن و الاسترجاع</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2" >
            <a href="{{ route('shipping_and_return.create') }}" class="btn btn-light text-success shadow">اضافة  <i class="bi bi-plus-lg"></i></a>
        </div>
    </div>
</div>

<div class="container text-center">
    @foreach ($shipping_and_return as $item)

    <div class="card mb-3 p-3" style="max-width: 940px;">
        <div class="row g-0">
          <div class="col-md-9">
            <div class="card-body">
                <h5 class="card-title">{{ $item->title }}</h5>
                <p class="card-text">{!! $item->description !!}</p>
            </div>
          </div>
          <div class="col-md-3">
            <img src="{{URL::asset('public/uploads/images/'.$item->photo) }}" class="img-fluid rounded-start" alt="...">
          </div>
        </div>
      </div>
      @endforeach
</div>



















@endsection
