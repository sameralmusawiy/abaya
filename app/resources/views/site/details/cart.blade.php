@extends('layouts.sitelayouts.header')

@section('content')


<style>

input[type="number"] {
  -webkit-appearance: textfield;
  -moz-appearance: textfield;
  appearance: textfield;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
}

.number-input {
  border: 2px solid #ddd;
  display: inline-flex;
}

.number-input,
.number-input * {
  box-sizing: border-box;
}

.number-input button {
  outline:none;
  -webkit-appearance: none;
  background-color: transparent;
  border: none;
  align-items: center;
  justify-content: center;
  width: 1.5rem;
  height: 1rem;
  cursor: pointer;
  margin: 0;
  position: relative;
}

/* .number-input button:after {
  display: inline-block;
  position: absolute;
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  content: '\f077';
  transform: translate(-50%, -50%) rotate(180deg);
} */
.number-input button.plus:after {
  transform: translate(-50%, -50%) rotate(0deg);
}

.number-input input[type=number] {
  font-family: sans-serif;
  max-width: 3rem;
  padding: .5rem;
  border: solid #ddd;
  border-width: 0 2px;
  font-size: 1rem;
  height: 1.5rem;
  font-weight: bold;
  text-align: center;
}

.card{
    box-shadow: 0px 0px 9px 0px rgb(207, 207, 207);
    border-radius:15px;
}


.hidden{
        /* visibility: hidden; */
        display: none;
    }
</style>

    <main class="my-8 mb-5 mt-5 p-2">
        <div class="container px-6 mx-auto">
            <div class="flex justify-center my-6">
                <div class="row">
                    <div class="col col-md-4 col-xs-12 col-sm-12 " >
                        <div class="card " style="width: 100%;  ">
                            <div class="card-body">
                                <h5><p class="card-text">الملخص</p></h5>
                                {{-- <hr>
                                <p class="card-text d-inline" style="width: 100%;">مجموع السعر: </p><strong>{{ Cart::getTotal() . ' د ع '}}</strong><br> --}}
                                {{-- <p class="card-text d-inline">رسوم الشحن: </p> <strong class="">{{ 10000 . ' د ع ' }}</strong> --}}
                                <hr>
                                <p class="card-text d-inline">السعر الكلي: </p><strong>{{ Cart::getTotal() . ' د ع '}}</strong><br><br>
                                {{-- <form action="{{ route('orders.save') }}" method="POST">
                                    @csrf
                                    @foreach ($cartItems as $item)

                                    <input class='hidden' type="hidden" name="id" value="{{ $item->id}}" >
                                    <input class='hidden' type="hidden" name="name" value="{{ $item->name}}" >
                                    <input class='hidden' type="hidden" name="price" value="{{ $item->price}}" >
                                    @endforeach --}}
                                   @if (Auth::check())
                                       <a type="submit" class="form-control bg-dark text-white text-center text-decoration-none" href="{{ route('userInfo') }}">التقدم لأكمال الطلب</a>
                                   @else
                                       <a type="submit" class="form-control bg-dark text-white text-center text-decoration-none" href="{{ route('login') }}">قم بتسجيل الدخول </a>
                                   @endif

                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card text-white mb-3" style="max-width: 100%;">
                            <div class="card-body">
                                <form action="{{ route('cart.clear') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-secondary m-3">مسح كل الطلبات</button>
                                </form>
                            </div>
                        </div>
                        <div class="card flex flex-col w-full  text-gray-800 bg-white  p-4" >
                            @if ($message = Session::get('success'))
                                <div class=" bg-green-400 rounded">
                                    <p class="text-green-800">{{ $message }}</p>
                                </div>
                            @endif
                            <div class="flex-1 text-center">
                                @foreach ($cartItems as $item)

                                <table class="table mt-5 table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col small"></th>
                                            <th scope="col small">الاسم</th>
                                            <th scope="col small">الكمية</th>
                                            <th scope="col small">السعر</th>
                                            <th scope="col small">القياس</th>
                                            <th scope="col small">اللون</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <form action="{{ route('cart.remove') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                                    <button class="btn">x</button>
                                                </form>
                                            </td>
                                            <th scope="row">{{ $item->name }}</th>
                                            <td>
                                                <form action="{{ route('cart.update') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id}}" >
                                                    <div class="number-input">
                                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"><i class="bi bi-dash"></i>
                                                        </button>
                                                        <input class="quantity" min="0" name="quantity" value="{{ $item->quantity }}" type="number">
                                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"><i class="bi bi-plus"></i>
                                                        </button>
                                                    </div>
                                                    {{-- <button type="submit" class="btn btn-success">تحديث</button> --}}
                                                </form>
                                            </td>
                                            <td> د.ع {{ $item->price }}
                                            </td>
                                            <td>
                                                @if ($item->attributes->has('size'))
                                                    {{ $item->attributes->size }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->attributes->has('color'))
                                                    {{-- <input  style="background-color:{{ $item->attributes->color }} " class="form-check-input" type="radio"> --}}
                                                    <i  class="bi bi-circle rounded " style="background-color:{{ $item->attributes->color }}; color:{{ $item->attributes->color }}; border-reduse:5px  "></i>
                                                @else
                                                    {{ 'اختر اللون' }}
                                                @endif
                                            </td>
                                            <td>
                                                {{-- @foreach (json_decode($item->image) as $image)
                                                    <a  href="{!!URL::asset('/uploads/images/'.$image) !!}" target="iframe_a" ><img role='presentation' src="{!!URL::asset('/uploads/images/'.$image) !!}" class="img-tumbnail " width = '60' height='85' style="border:1px solid rgb(211, 211, 211);"></a>
                                                @endforeach
                                                <img src="{{ $item->photo }}" alt="" width = '60' height='80'></td> --}}
                                        </tr>

                                    </tbody>
                                    <hr>

                                </table>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>





















    @endsection
