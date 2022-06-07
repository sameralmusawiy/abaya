@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')







<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-secondary  p-2" id="pageTitle">طلبات الشراء</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('products_types.home') }}" class="btn btn-light text-success shadow">المنتجات <i class="bi bi-arrow-return-left"></i></a>
        </div>
    </div>
</div>


<div class="row g-0">
    <div class="col-sm-6 col-md-12">
        <p>
            <button class="btn text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample" style="background-color:#f2e2cd;">
                بحث <i class="bi bi-arrow-down-short"></i>
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="container overflow-hidden">
                    <div class="row gx-5">
                        <div class="col">
                            <div class="p-0  bg-light">
                                <form class=" my-2 my-md-0 d-inline" action="{{ route('orders.cpSearch') }}" method="POST">
                                    @csrf
                                    <button type="reset" class="text-white bg-dark p-2 rounded" style="border: solid 0px;"><i class=" bi bi-x-lg"></i></button>
                                    <input class="bg-light p-2 rounded text-dark  w-75" id="q" name="q" type="text" placeholder="بحث بواسطة رقم الطلبية" style="border: solid 0px;">
                                </form>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-0  bg-light">
                                {{-- <form class=" my-2 my-md-0 d-inline" action="{{ route('userInfo.cpSearch') }}"
                                method="POST">
                                @csrf
                                <button type="reset" class="text-white bg-dark p-2 rounded" style="border: solid 0px;"><i class=" bi bi-x-lg"></i></button>
                                <input class="bg-light p-2 rounded text-dark  w-75" id="q" name="q" type="text" placeholder="بحث بواسطة اسم الزبون " style="border: solid 0px;">
                                </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (session ('status'))
<div class="toast-body">
    {{session('status')}}
</div>
@endif


<div class="card  mt-3 p-3">
    <p class="card-text small"><i>عدد الطلبات الكلي: ( {{$orders->count()}} )</i> </p>

    <div class="row row-cols-1 row-cols-md-6 g-2 ">

        @foreach ($orders as $item)
            @if ($item->isConfirm == 1)
                <div class="col ">
                    @if ($item->isRead == 0 )
                    <a class="text-dark text-decoration-none" href="{{route('orders.isRead', $item->id)}}">
                        <div class="card shadow" style="background-color: #f2e2cd">
                            <div class="card-header">
                                <h5 class="card-title">رقم الطلبية: {{ $item->order_no }}</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">اسم المشتري: {{ $item->user_infos->name }}</p>
                                <p class="card-text">عدد القطع: {{ $item->baskets()->get()->count() }}</p>
                                <p class="card-text">رقم الهاتف: {{ $item->user_infos->phonenumber }}</p>
                                <p class="card-text">العنوان : {{ $item->user_infos->address }}</p>
                            </div>
                        </div>
                    </a>
                    @elseif($item->isRead == 1)
                    <a class="text-dark text-decoration-none" href="{{route('orders.notRead', $item->id)}}">
                        <div class="card shadow" style="background-color:rgba(255, 255, 255, 0.5);">
                            <div class="card-header">
                                <h5 class="card-title">رقم الطلبية: {{ $item->order_no }}</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">اسم المشتري: {{ $item->user_infos->name }}</p>
                                <p class="card-text">عدد القطع: {{ $item->baskets()->get()->count() }}</p>
                                <p class="card-text">رقم الهاتف: {{ $item->user_infos->phonenumber }}</p>
                                <p class="card-text">العنوان : {{ $item->user_infos->address }}</p>
                            </div>
                        </div>
                    </a>
                    @endif
                </div>
            @endif
        @endforeach
    </div>
    <div class='mt-5'>
        {{$orders->links()}}
    </div>
</div>






@endsection
