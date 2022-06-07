@extends('layouts.sitelayouts.header')

@section('content')

<style>
    body {
}
    .container {
  /* max-width: 500px; */
  margin: auto;
  margin-top:2%;
  background: white;
  padding: 10px;
  justify-content: center;
  display:flex;
  padding-left: 10%;
  padding-right: 10%;
}
.card{
    box-shadow: 0px 0px 9px 0px rgb(207, 207, 207);

    padding-left: 5%;
  padding-right: 5%;
}
</style>



<main class="content ">
    <div class="container">
        <div class="card" style="width: 85%;">
            <h1 class="py-4">اتصل بنا</h1>
            <h6>يرجى ملء الحقول التالية لكي تصل رسالتك لنا.</h6>
            <div class="card-body text-center">
                <form id='form_login' class="row g-3 "action="{{ route('contact_us.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <input type="text" name='title' class="form-control" placeholder="اسم الموضوع " >
                    </div>
                    <div class="col-md-12">
                        <input type="text" name='name' class="form-control" placeholder="الاسم الرباعي" >
                    </div>
                    <div class="col-md-12">
                        <input type="email" name='email' class="form-control" id="inputEmail4" placeholder="البريد الالكتروني">
                    </div>
                    <div class="col-12">
                        <input type="text" name='phonenumber' class="form-control" id="inputPassword4" placeholder="رقم الهاتف">
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
                    <div class="mb-3">
                        <textarea class="form-control" name='description' id="exampleFormControlTextarea1" rows="10" placeholder="اكتب الرسالة هنا"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">اضغط لأختيار الصور</label>
                        <input id="inputIcon" type="file" name="photo" class="form-control">
                    </div>
                    <div class="col-12">
                    <button type="submit" class="btn btn-dark ">ارسال</button>
                    </div>
                </form>
            </div>
          </div>
    </div>
</main>













@endsection
