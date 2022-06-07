@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')
<style>
    .card:hover {
       box-shadow: 0 4px 8px 0 rgba(3, 3, 3, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
       background-color: #f2e2cd;

    }
    .card-title{
        font-family: cairo, arial, helvetica, sans-serif;
    }
    .card-header{
        background-color:#3d3d3d;
    }

</style>




<div class="container-fluid bg-light rounded px-3 py-3">
    <div class="row row-cols-1 row-cols-xs-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-6 g-4">
        @foreach ($productTypes as $productType)
                <div class="col">
                    <div class="card " style='  border-top-left-radius:15px; border-top-right-radius:15px;'>
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-header  text-white" style=" border-top-left-radius:15px; border-top-right-radius:15px;">
                            <span><h6 class="card-title d-inline">{{ $productType->name }}</h6></span>
                            <span><img class='' src="{{ asset('public/src/photos/pageImage/logo2.png') }}" alt="" style='float:left'width="20" height= 'auto'></span>
                        </div>
                        <div class="card-body bg-white text-dark" style="min-height: 100px;">
                            <p class="card-text">السعر: {{ ' IQD ' . $productType->price }} </p>
                            <p class="card-text">القطع المتوفرة: {{ $productType->number }}</p>
                        </div>
                        <div class="card-footer ">
                            <a  class="btn text-primary p-0" href="{!!route ('offers.addOffers',$productType->id)!!}" title="Edit"><h6 class='m-0'>اضافة عرض <i class="bi bi-plus-lg"></i></h6></a>
                        </div>
                    </div>
                </div>
        @endforeach
        {{-- {{ $productTypes->links() }} --}}
    </div>
</div>

@endsection
