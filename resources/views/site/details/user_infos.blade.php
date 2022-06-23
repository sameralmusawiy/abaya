@extends('layouts.sitelayouts.header')

@section('content')
<style>
    .card{
    box-shadow: 0px 0px 9px 0px rgb(207, 207, 207);
    border-radius:15px;
}
#sCard{
    padding-left:10%;
    padding-right:10%;
}

</style>





<div class="container mt-5">
    <div class="row">
      <div class="col col-md-4 col-xs-12 col-sm-12">
        <div class="card " style="width: 100%;  ">
            <div class="card-body">
                <h5><p class="card-text">الملخص</p></h5>
                <hr>
                <table class="table table-hover table-borderless">
                    <tbody>
                        @foreach ($cartItems_second as $item)
                        <tr>
                            <th scope="row" style="width: 50%;" >
                                 {{ $item->name }} {{ $item->quantity .'X' }}
                            </th>
                            <td>
                                <strong>{{' د ع ' . $item->price*$item->quantity }}</strong>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <hr>
                <table class="table table-hover table-borderless">
                    <tbody>
                        <tr>
                            <th scope="row" style="width: 75%; ">
                            {{ 'رسوم الشحن'}}
                            </th>
                            <td>
                                <strong>{{'د ع ' . 10000 }}</strong>
                            </td>
                        </tr>
                    </tbody>
                </table> --}}
                <hr>
                <table class="table table-hover table-borderless">
                    <tbody>
                        <tr>

                            <th scope="row" style="width: 50%; ">
                                {{ 'السعر الكلي: ' }}
                                <td>
                                    <strong>{{' د ع ' . (Cart::getTotal()) }}</strong>
                                </td>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card text-dark bg-light mt-3" style="">
            <h5><p class="card-header p-3">تكلفة الشحن</p></h5>
            <div class="card-body">
                <h6 class="card-title">سيتم اضافة سعر التوصيل الى سعر التسوق الكلي</h6>
                <p class="card-text">يمكنك الاطلاع على اسعار الشحن و التوصيل لجميع المحافظات بالضغط على زر <strong>(اسعار الشحن و التوصيل)</strong> </p>
                <button type="button" class="btn btn-secondary form-control" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    اسعار الشحن و التوصيل
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">اسعار الشحن و التوصيل للمحافظات التالية</h5>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover border-none">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">المحافظة</th>
                                        <th scope="col">السعر</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($deliveries as $delivery)
                                        <tr>
                                            <th scope="row">{{ $i +=1 }}</th>
                                            <td>{{ $delivery->city }}</td>
                                            <td>{{ $delivery->price }}{{ ' د ع ' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                        </div>
                    </div>
                    </div>
                </div>



            </div>
        </div>
      </div>
      <div class="col-md-8">
        <div id='sCard' class="card text-center mb-5" >
            <div class="card-body">
                <h5 class="card-title mb-5">يرجى ملء الحقول التالية لكي يكتمل الطلب</h5>

                <form class="row g-3"action="{{ route('userInfo.store') }}" method="POST"  enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
                    @csrf
                    <div class="col-6 "> <p class="text-right text-danger p-0 m-0">*</p>
                        <input type="text" name='name' class="form-control" placeholder="الاسم الرباعي" >
                    </div>
                    <div class="col-6"><p class="text-right text-danger p-0 m-0">*</p>
                        <input type="email" name='email' class="form-control" id="inputEmail4" placeholder="البريد الالكتروني">
                    </div>
                    <div class="col-6"><p class="text-right text-danger p-0 m-0">*</p>
                        <input type="text" name='phonenumber' class="form-control" id="inputPassword4" placeholder="رقم الهاتف">
                    </div>
                    <div class="col-6"><p class="text-right text-danger p-0 m-0">*</p>
                        <input type="text" name='address' class="form-control" id="inputAddress2" placeholder="عنوان المنزل">
                    </div>
                    <div class="col-md-6"><p class="text-right text-danger p-0 m-0">*</p>
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
                    <div class="col-md-6"><p class="text-right text-danger p-0 m-0">*</p>
                        <input type="text" name='district' class="form-control" id="inputCity" placeholder="اسم الحي / اسم المنطقة">
                    </div>
                    <div class="col-6 text-right">تاريخ الميلاد<p class=" text-danger p-0 m-0 d-inline">  *</p>
                        <input type="date" class="form-control" id="birthday" name="date_of_birth" >
                    </div>
                    <div class="col-6 text-right ">  <p class=" text-danger p-0 m-0 d-block">الجنس * :</p>
                        <div class="form-check form-check-inline ">
                            <input class="form-check-input" name="gender" value="ذكر" type="radio"  id="inlineRadio1" >
                            <label class="form-check-label" for="inlineRadio1">ذكر</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="انثى" type="radio" name="gender" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">انثى</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <input type="text" name='country' class="form-control" id="inputPassword4" placeholder="اسم البلد">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name='zip' class="form-control" id="inputZip" placeholder="الرمز البريدي">
                    </div>
                    <div class="col-6">
                        <input type="text" name='home_no' class="form-control" id="inputAddress2" placeholder="رقم الشقة / الجناح / الوحدة / الخ (اختياري)">
                    </div>
                    <div class="col-6">
                        <input type="text" name='comp_name' class="form-control" id="inputAddress" placeholder="اسم الشركة (اختياري)">
                    </div>
                    <div class="mb-3 text-right">
                        <label for="exampleFormControlTextarea1" class="form-label">ملاحظة الطلب (اختياري)</label>
                        <textarea class="form-control" name='note' id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>

                    {{-- <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                        Check me out
                        </label>
                    </div>
                    </div> --}}
                    <div class="col-12">
                    {{-- <a type="submit" class="btn btn-dark form-control" href="/">ارسال</a> --}}
                    <button type="submit" class="btn btn-dark form-control">ارسال</button>
                    </div>
                </form>
            </div>
          </div>
      </div>
    </div>
</div>









<script>
    function validateForm() {
        let a = document.forms["myForm"]["name"].value;
        let b = document.forms["myForm"]["email"].value;
        let c = document.forms["myForm"]["phonenumber"].value;
        let d = document.forms["myForm"]["city"].value;
        let e = document.forms["myForm"]["address"].value;
        let f = document.forms["myForm"]["date_of_birth"].value;
        let g = document.forms["myForm"]["gender"].value;
        let h = document.forms["myForm"]["district"].value;

        if (a == "") {
            alert("يجب كتابة الاسم");
            return false;
        }
        if (b == "") {
            alert("يجب كتابة الايميل");
            return false;
        }
        if (c == "") {
            alert("يجب كتابة رقم الموبايل");
            return false;
        }
        if (d == "") {
            alert("يجب كتابة اسم المدينة");
            return false;
        }
        if (e == "") {
            alert("يجب كتابة العنوان الكامل");
            return false;
        }
        if (f == "") {
            alert("يجب كتابة تاريخ الميلاد");
            return false;
        }
        if (g == "") {
            alert("يجب اختيار الجنس");
            return false;
        }
        if (h == "") {
            alert("يجب كتابة اسم المنطقة");
            return false;
        }
    }
</script>





@endsection
