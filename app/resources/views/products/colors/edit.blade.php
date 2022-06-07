@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="pageTitle">تعديل اللون</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('colors.index') }}" class="btn btn-light text-success shadow">رجوع <i class="bi bi-arrow-return-left"></i></a>
        </div>
    </div>
</div>

<div class="container bg-light mt-5 p-5">




<form action="{{route('colors.edit', $color->id)}}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="exampleColorInput" class="form-label">قم بكتابة اسم اللون</label><br><br>
        <input value='' id="inputIcon" type="text" name='name' class="form-control"  aria-describedby="emailHelp" placeholder="اكتب اسم اللون المراد اضافته">
    </div>
    <br><br><br><br>
    <div class="form-group">
        <label for="exampleColorInput" class="form-label">اضغط بالمؤشر على اللون المطلوب</label><br><br>
        <input type="color" name='value' class="form-control form-control-color" id="exampleColorInput" value="" title="اكتب اسم اللون المراد اضافته">
    </div>
    <br><br>
    <div class="form-group modal-footer">
    <button type="submit" class="btn btn-primary">حفظ</button>
    <button type="button" class="btn text-danger" data-bs-dismiss="modal">اغلاق</button>
    </div>
</form>




</div>

@endsection
