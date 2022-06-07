@extends('layouts.sitelayouts.header')

@section('content')

<style>
    .gender{
        border: 1px solid #000;
        padding-left:40px;
        padding-right:10px;
        padding-top:5px;
        padding-bottom:5px;
        border-radius:10px;
        border : 1px solid rgb(199, 199, 199);
    }
    .card{
        margin-left: 10%;
        margin-right: 10%;
        padding-left:5%;
        padding-right:5%;
    }
    .form-control{
        margin-top:2%;
        margin-bottom: 2%;
        border : 1px solid rgb(199, 199, 199);
        border-radius:15px
    }
    .form-control:hover , .gender:hover{
        background-color:rgb(238, 238, 238);
    }
</style>



<div class="container mb-5 mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="mt-4"><h1>{{ __('تسجيل') }}</h1></div>
                <h5>يرجى ملء الحقول التالية لكي تتم عملية التسجيل</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf



                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="اسم المستخدم">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="البريد الألكتروني">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="كلمة السر">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="تأكيد كلمة السر">
                            </div>

                            <div class="col-md-12">
                                <input id="city" type="text" class="form-control " name="country" value="" required placeholder="الدولة">
                            </div>

                            <div class="col-md-12">
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
                            <div class="col-md-12">
                                <input type="text" name='district' class="form-control" id="inputCity" placeholder="اسم الحي / اسم المنطقة">
                            </div>


                            <div class="col-md-12">
                                <input id="address" type="text" class="form-control " name="address" value="" required placeholder="العنوان الكامل">
                            </div>

                            <div class="col-md-12">
                                <input id="phonenumber" type="text" class="form-control " name="phonenumber" value="" required placeholder="رقم الهاتف">
                            </div>

                            <div class="col-md-12 ">
                                <label class="form-check-label " name='date_of_birth' for="exampleCheck1">تاريخ الميلاد</label>
                                <input type="date" class="form-control" id="birthday" name="date_of_birth" >
                            </div>

                            <div class="col-md-12 ">
                                <label class="form-check-label " name='date_of_birth' for="exampleCheck1">الجنس</label>
                                <div>
                                    <div class="form-check form-check-inline gender" >
                                        <input class="form-check-input" name="gender" value="ذكر" type="radio"  id="inlineRadio1" >
                                        <label class="form-check-label" for="inlineRadio1">ذكر</label>
                                    </div>
                                    <div class="form-check form-check-inline gender">
                                        <input class="form-check-input" value="انثى" type="radio" name="gender" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">انثى</label>
                                    </div>
                                </div>

                            </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark mt-4">
                                    {{ __('تسجيل') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
