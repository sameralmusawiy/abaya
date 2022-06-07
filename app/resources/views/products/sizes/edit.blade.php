@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="pageTitle">اتعديل الحجم</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('sizes.index') }}" class="btn btn-light text-success shadow">رجوع <i class="bi bi-arrow-return-left"></i></a>
        </div>
    </div>
</div>

<div class="container bg-light mt-5 p-5">




<form action="{{route('sizes.edit', $size->id)}}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="exampleColorInput" class="form-label">قم بكتابة اسم الحجم</label><br><br>
        <input value='{{ $size->name }}' id="inputIcon" type="text" name='name' class="form-control"  aria-describedby="emailHelp" placeholder="اكتب اسم الحجم المراد تعديله">
    </div>
    <br><br>

    <div class="form-group modal-footer">
    <button type="submit" class="btn btn-primary">حفظ</button>
    </div>
</form>




</div>

@endsection
