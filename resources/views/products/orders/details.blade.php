@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')

<style>
    #mainPage > .container > col{
        text-align: center;
    }
    .container{
        /* display: flex; */
        text-align: center;
        float:center;

    }

    .col{
        background-color: rgb(220, 106, 255);
        padding-top: 10px;
        padding-bottom: 10px;
        color:rgb(19, 18, 18);
        font-weight: bold;
    }

</style>

<h3 class='mx-5 mt-3 p-2 text-secondary'>معلومات الزبون</h3><br>

<div class="container ">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-2 g-lg-3 mb-5">
      <div class="col">
        <div class="p-3 border bg-light">الاسم: {{ $order->user_infos->name }}</div>
      </div>
      <div class="col">
        <div class="p-3 border bg-light">رقم الهاتف: {{ $order->user_infos->phonenumber }}</div>
      </div>
      <div class="col">
        <div class="p-3 border bg-light">الايميل: {{ $order->user_infos->email }}</div>
      </div>
      <div class="col">
        <div class="p-3 border bg-light">المدينة: {{ $order->user_infos->city }}</div>
      </div>
      <div class="col">
        <div class="p-3 border bg-light">الجنس: {{ $order->user_infos->gender }}</div>
      </div>
      <div class="col">
        <div class="p-3 border bg-light">تاريخ الولادة: {{ $order->user_infos->date_of_birth }}</div>
      </div>
      <div class="col">
        <div class="p-3 border bg-light">العنوان الكامل: {{ $order->user_infos->address }}</div>
      </div>
    </div>



<hr>
{{-- <h3 class='mx-5 mt-3 p-2 text-secondary'>تفاصيل الطلب</h3><br> --}}

    <table class="table table-sm mt-5 table-responsiv">
        <thead>
            <tr class=''>
              <th scope="col">اسم القطعة</th>
              <th scope="col">العدد</th>
              <th scope="col">اللون</th>
              <th scope="col">الحجم</th>
              <th scope="col">نوع القماش</th>

            </tr>
        </thead>
        <tbody class='p-5'>
            <h3 class='text-secondary'>طلبية رقم: AS-{{ $order->order_no }}</h3>

            @foreach ($order->baskets()->get() as $item)
            <tr >
                <th scope="row">{{ $item->products_types->name }}</th>
                <td>{{ $item->quantity }}</td>
                <td><span class="badge " style="background-color:{{ $item->color }};"value='{{ $item->color }}'>اللون</span> </td>
                <td>{{ $item->size }}</td>
                <td>{{ $item->fabric }}</td>
              </tr>
            @endforeach

        </tbody>
    </table>





</div>







@endsection
