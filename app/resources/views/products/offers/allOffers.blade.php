@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')


<style>
    .card:hover {
       box-shadow: 0 4px 8px 0 rgba(3, 3, 3, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
       background-color: #f2e2cd;
    }

    .card-header{
        background-color: #3d3d3d;
    }
    .card-title{
        font-family: cairo, arial, helvetica, sans-serif;
    }
</style>



<div class="container-fluid bg-light rounded px-3 py-3">
    <div class="row row-cols-1 row-cols-xs-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-6 g-4">
        @foreach ($offers as $offer)

                <div class="col">
                    <div class="card " style='  border-top-left-radius:15px; border-top-right-radius:15px;'>
                        <div class="card-header  text-white" style=" border-top-left-radius:15px; border-top-right-radius:15px;">
                            <span><h6 class="card-title d-inline">{{ $offer->products_types->name }}</h6></span>
                            <span><img class='' src="{{ asset('public/src/photos/pageImage/logo2.png') }}" alt="" style='float:left'width="20" height= 'auto'></span>
                        </div>
                        <div class="card-body text-secondary bg-light" style="min-height: 150px;">
                            <p class="card-text text-danger"><s>{{ ' IQD ' . $offer->products_types->price }}</s> {{ ' - ' .' IQD ' . $offer->discount }} </p>
                            <p class="card-text ">{{ $offer->end_time }} </p>
                        </div>
                        <div class="card-footer ">
                            {{-- <a  class="btn text-primary p-0" href="{!!route ('offers.addOffers',$productType->id)!!}" title="Edit"><h6 class='m-0'>اضافة عرض <i class="bi bi-plus-lg"></i></h6></a> --}}
                            <form action="{{route('offers.destroy', $offer)}}"  method="POST">
                                @csrf
                                @method('DELETE')
                                {{-- @if ($item->isShow == 1 )
                                    <a class="btn btn-outline-success px-3 py-0" href="{{route('todaySlide.hide', $item->id)}}">اخفاء</a>
                                @else
                                    <a class="btn btn-outline-dark px-3 py-0" href="{{route('todaySlide.display', $item->id)}}">اظهار</a>
                                @endif --}}
                                {{-- <a  class="btn text-primary" href="{!!route ('products_types.edit', $productType->id)!!}" title="تعديل">تعديل<i class="bi bi-pencil"></i></a> --}}
                                <button class="btn text-danger" type="submit" onclick="return confirm('هل انت متأكد من مسح العرض؟');" title="حذف" >حذف<i class="bi bi-trash"></i></button>
                            </form>

                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</div>













@endsection
