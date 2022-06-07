@extends('layouts.sitelayouts.header')

@section('content')
<style>
    .card{
        width: 85%;
        float: none;
        margin-bottom: 10px;
        margin: 0 auto;
        border:none;
    }
    .card h5{
        font-size:border;
    }
    .reg{
        min-height: 400px;
        background: linear-gradient(to top right, rgb(19, 19, 19) 20% , rgb(255, 255, 255) -70%);
    }
    #form_login {

}

</style>

<div class="container my-5">
    @foreach ($aboutUs as $item)
    <div class="card my-5 " >
        <div class="row g-0">
          <div class="col-md-8">
            <div class="card-body">
                <h1 class="card-title" style="font-size:45px;">{{ $item->title }}</h1>
                <p class="card-text"><h4>{{ $item->description }}</h4></p>
            </div>
          </div>
          <div class="col-md-4">
            <img src="{{URL::asset('public/uploads/images/'.$item->photo) }}" class="img-fluid rounded-start" style="width: 100%;" alt="...">
          </div>
        </div>
    </div>

    @endforeach

</div>
@if (Auth::check() == false)
<div class="container-fluid my-5" style="border-top: solid 1px rgb(182, 182, 182); border-bottom: solid 1px rgb(182, 182, 182);">
    <div class="row ">
      <div class="col-sm-7 bg-white p-5">
        <form id='form_login' class="row g-3 "action="{{ route('userInfo.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <input type="text" name='name' class="form-control" placeholder="الاسم الرباعي" >
            </div>
            <div class="col-md-6">
                <select id="inputState" class="form-select form-control" name='city' >
                    <option selected value='النجف الاشرف' name='city'>النجف الاشرف</option>
                    <option value='كربلاء' name='city'>كربلاء</option>
                    <option value='بغداد' name='city'>بغداد</option>
                    <option value='بابل' name='city'>بابل</option>
                    <option value='الديوانية' name='city'>الديوانية</option>
                    <option value='كوت' name='city'>كوت</option>
                    <option value='ديالى' name='city'>ديالى</option>
                    <option value='ناصرية' name='city'>ناصرية</option>
                    <option value='بصرة' name='city'>بصرة</option>
                    <option value='ميسان' name='city'>ميسان</option>
                    <option value='صلاح الدين' name='city'>صلاح الدين</option>
                    <option value='كركوك' name='city'>كركوك</option>
                    <option value='اربيل' name='city'>اربيل</option>
                    <option value='سليمانية' name='city'>سليمانية</option>
                    <option value='دهوك' name='city'>دهوك</option>
                    <option value='الموصل' name='city'>الموصل</option>
                    <option value='الانبار' name='city'>الانبار</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" name='district' class="form-control" id="inputCity" placeholder="اسم الحي / اسم المنطقة">
            </div>
            <div class="col-md-6">
            <input type="email" name='email' class="form-control" id="inputEmail4" placeholder="البريد الالكتروني">
            </div>
            <div class="col-md-3">
                <input type="text" name='address' class="form-control" id="inputAddress2" placeholder="عنوان المنزل">
            </div>
            <div class="col-md-3">
                <input type="text" name='country' class="form-control" id="inputPassword4" placeholder="اسم البلد">
            </div>
            <div class="col-6">
            <input type="text" name='phonenumber' class="form-control" id="inputPassword4" placeholder="رقم الهاتف">
            </div>
            <div class="col-6 ">
                <input type="password" class="form-control" id="inputPassword">
            </div>
            <div class="col-6 ">
                <input type="password" class="form-control" id="inputPassword">
            </div>
            <div class="col-6 ">
                <label class="form-check-label " name='date_of_birth' for="exampleCheck1">تاريخ الميلاد</label>
                <input type="date" class="form-control" id="birthday" name="date_of_birth" >
            </div>
            <div class="col-6 ">
                <div class="form-check form-check-inline bg-light px-4 py-2 rounded">
                    <input class="form-check-input" name="gender" value="ذكر" type="radio"  id="inlineRadio1" >
                    <label class="form-check-label" for="inlineRadio1">ذكر</label>
                </div>
                <div class="form-check form-check-inline bg-light px-4 py-2 rounded">
                    <input class="form-check-input" value="انثى" type="radio" name="gender" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">انثى</label>
                </div>
            </div>
            <div class="col-12">
            <button type="submit" class="btn btn-dark ">ارسال</button>
            </div>
        </form>
      </div>
      <div class="col-sm-5 bg-dark text-white text-center">
          <h1 class='my-5'>تسجيل الدخول</h1>
          <h3 class='my-5'>لمتابعة اخر التخفيضات و اخر العروض و احدث المنتجات قم الان بتسجيل الدخول</h3>
          <a type="submit" class=" bg-white text-dark text-center text-decoration-none px-4 py-2 m-5 rounded" href="{{ route('login') }}"><h4> تسجيل الدخول</h4> </a>
      </div>
    </div>
</div>
@endif


@endsection
