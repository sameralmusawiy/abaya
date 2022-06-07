@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="pageTitle">  تعديل </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('deliveries.index') }}" class="btn btn-light text-success shadow">رجوع <i class="bi bi-arrow-return-left"></i></a>
        </div>
    </div>
</div>

<div class="container bg-light mt-5 p-5">




    <form action="{{route('deliveries.update', $delivery->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group mx-5">
            <label for="exampleFormControlInput1" class="form-label">المدينة</label>
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
        <br><br>
        <div class="form-group mx-5">
            <label for="exampleFormControlInput1" class="form-label">السعر</label>
            <input name="price" type="text" value='{{ $delivery->price }}' class="form-control" id="" placeholder="ادخل سعر التوصيل">
        </div>
        <br><br>
        <div class="form-group mx-5">
            <label for="exampleFormControlTextarea1" class="form-label">الوصف</label>
            <textarea name='description' value='' class="form-control ckeditor" id="exampleFormControlTextarea1" rows="3">{{ $delivery->description }}</textarea>
        </div>

        <br><br>
        <div class="form-group modal-footer mx-5">
        <button type="submit" class="btn btn-primary">حفظ</button>
        {{-- <button type="button" class="btn text-danger" data-bs-dismiss="modal">اغلاق</button> --}}
        </div>
    </form>




</div>

@endsection
