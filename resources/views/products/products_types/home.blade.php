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
     
      .btnAction{
         font-size: 12px;
         text-decoration: none;
         border:solid 0px white;
         border-radius: 5px;
         padding:3px;
         margin-left: 3px;
         background-color: rgb(247, 247, 247);


     }
 </style>



<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-secondary" id="pageTitle">كل المنتجات</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2" >
            <a href="{{ route('products_types.index') }}" class="btn btn-light text-success shadow">اضافة <i class="bi bi-plus-lg"></i></a>
        </div>
    </div>
</div>




<div class="container-fluid bg-light rounded px-3 py-3">
    <div class="row row-cols-1 row-cols-xs-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
        @foreach ($productTypes as $productType)
                <div class="col">
                    <div class="card " style='  border-top-left-radius:15px; border-top-right-radius:15px;'>
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-header  text-white" style="background-color:#3d3d3d; border-top-left-radius:15px; border-top-right-radius:15px;">
                            <span><h5 class="card-title d-inline">{{ $productType->name }}</h5></span>
                            <span><img class='p-2' src="{{ asset('public/src/photos/pageImage/logo2.png') }}" alt="" style='float:left'width="40" height= 'auto'></span>
                        </div>
                        <div class="card-body bg-light text-dark" style="min-height: 200px;">
                            <p class="card-text">السعر: {{ ' IQD ' . $productType->price }} </p>
                            <p class="card-text">الاحجام : {{ $productType->size }}</p>
                            <p class="card-text"> الالوان:
                                @php
                                    $allcolor = explode('-', $productType->color);
                                @endphp
                                @foreach ($allcolor as $color)
                                <span class="badge rounded-pill" style="background-color:{{ $color }} ">  </span>
                                @endforeach
                            </p>
                            <p class="card-text">نوع القماش: {{ $productType->fabric }}</p>
                        </div>
                        <div class="card-footer ">
                            <form action="{{route('products_types.destroy', $productType )}}"  method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btnAction text-success" href="{!!route ('products_types.show', $productType->id)!!}" title="مشاهدة" >مشاهدة<i class="bi bi-eye"></i> </a>
                                <a  class="btnAction text-primary" href="{!!route ('products_types.edit', $productType->id)!!}" title="تعديل">تعديل<i class="bi bi-pencil"></i></a>
                                <button class="btnAction text-danger" type="submit" onclick="return confirm('Are you sure?');" title="حذف" >حذف<i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
        @endforeach
        {{-- {{ $productTypes->links() }} --}}
    </div>
    <div class='mt-5 '>
        {{ $productTypes->links() }}
    </div>
</div>
@endsection
