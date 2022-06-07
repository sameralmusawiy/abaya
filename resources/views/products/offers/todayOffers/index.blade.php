@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')

    <div class="container-fluid bg-light rounded px-3 py-3">
        <div class="row row-cols-1 row-cols-xs-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-6 g-4">
            @foreach ($offers as $offer)

                    <div class="col">
                        <div class="card " style='  border-top-left-radius:15px; border-top-right-radius:15px;'>
                            <div class="card-header  text-white" style="background-color:rgb(218, 89, 223); border-top-left-radius:15px; border-top-right-radius:15px;">
                                <span><h6 class="card-title d-inline">{{ $offer->products_types->name }}</h6></span>
                                <span><img class='' src="{{ asset('public/src/photos/pageImage/logo2.png') }}" alt="" style='float:left'width="20" height= 'auto'></span>
                            </div>
                            <div class="card-body text-secondary" style="min-height: 100px;background-color:rgb(241, 241, 241);">
                                <p class="card-text "><s>{{ ' IQD ' . $offer->products_types->price }}</s> {{ ' - ' .' IQD ' . $offer->discount }} </p>
                            </div>
                            <div class="card-footer ">
                                {{-- <a  class="btn text-primary p-0" href="{!!route ('offers.addOffers',$productType->id)!!}" title="Edit"><h6 class='m-0'>اضافة عرض <i class="bi bi-plus-lg"></i></h6></a> --}}
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>

@endsection
