@extends('layouts.sitelayouts.header')

@section('content')

<style>
    body {
        background-color: rgb(245, 245, 245)
    }

    .card {
        background-color: #fff;
        width: 500px;
        border: none;
        border-radius: 16px
    }

    .info {
        line-height: 19px
    }

    .name {
        color: #4c40e0;
        font-size: 18px;
        font-weight: 600
    }

    .order {
        font-size: 14px;
        font-weight: 400;
        color: #050505
    }

    .detail {
        line-height: 19px
    }

    .summery {
        color: #141414;
        font-weight: 400;
        font-size: 13px
    }


    .text {
        line-height: 15px
    }

    .new {
        color: #000;
        font-size: 14px;
        font-weight: 600
    }

    .money {
        font-size: 14px;
        font-weight: 500
    }

    .address {
        color: #000000;
        font-weight: 500;
        font-size: 14px
    }

    .last {
        font-size: 10px;
        font-weight: 500
    }

    .address-line {
        color: #4C40E0;
        font-size: 11px;
        font-weight: 700
    }
</style>










<div class="container mt-5 d-flex justify-content-center mb-5">
    <div class="card p-4 mt-3">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill text-success"></i> {!! session('success') !!}
            </div>
        @endif
        <div class="first d-flex justify-content-between align-items-center mb-3">
            <div class="info"> <span class="d-block name">شكرا لك, {{ Auth::user()->name }}</span> </div>
        </div>
        <div class="text"><span class="d-block address mb-3">من محافظة: {{ $userCity }} </span> </div>

        <div class="detail"> <span class="d-block summery">   سوف نقوم بأيصال الطلب لك في اقرب
                وقت ممكن, قم بتأكيد الطلب.</span>
        </div>
        <br><br>
        <div>
            <a class="btn btn-success text-decoration-none" href="{{route('userInfo.isConfirm', $orderId )}}">تأكيد الطلب</a>
        </div>

        <hr>
        {{-- <div class="text"><span class="d-block address mb-3">مصاريف الشحن الى محافظتك: {{ $deliveryPrice }}
            </span> </div> --}}
        @if (isset($deliveryPrice[0]))
        <div class="text"><span class="d-block address mb-3">المبلغ الكلي + مصاريف الشحن:
            <h3 class="d-inline text-danger">{{ $totalPrice }} + {{ $deliveryPrice[0] }}</h3>
             د.ع</span> </div>
        @else
        <div class="text"><span class="d-block address mb-3">المبلغ الكلي + مصاريف الشحن:
            <h3 class="d-inline text-danger">{{ $totalPrice }} + 0</h3>
             د.ع</span> </div>
        @endif


        <div class=" money d-flex flex-row mt-2 align-items-center"><span class="ml-2">يرجى تسليم المبلغ الكلي
                و مصاريف الشحن الى مندوب التوصيل بعد فحص المنتج بدقة.</span> </div>
    </div>
</div>







{{-- <span class="order">رقم الطلب - {{ $orderNumber }}</span> --}}
{{-- <div class="last d-flex align-items-center mt-3"> <span class="address-line">رقم الهاتف - {{ $userInfoPhone
        }}</span> </div> --}}
{{-- <div class="last d-flex align-items-center mt-3"> <span class="address-line">CHANGE MY DELIVERY ADDRESS</span>
</div> --}}
{{-- <span class="d-block new mb-1">{{ $userInfoName }}</span> --}}

@endsection
