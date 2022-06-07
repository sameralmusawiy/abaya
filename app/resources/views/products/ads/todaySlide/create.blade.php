@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="pageTitle">انشاء اعلان </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2" >
            <a href="{{ route('todaySlide.index') }}" class="btn btn-light text-success shadow">رجوع <i class="bi bi-arrow-90deg-up"></i></a>
        </div>
    </div>
</div>




<div class="container bg-light mt-5 p-5">

<div class="container">
    <form class="" style="text-align: right;" action="{!! route('todaySlide.store') !!}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">العنوان</label>
            <input name="title" type="text" class="form-control" id="" placeholder="نبذة عن الاعلان">
        </div><br><br>
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">اضغط لأختيار الصور</label>
            <input id="inputIcon" type="file" name="photo" class="form-control" multiple="photo[]">
        </div>
        <br><br>
        <div class="form-group">
            <button type="submit" class="btn text-white btn-primary">حفظ</button>
            {{-- <a class="btn text-danger" href="{{ route('products_types.index') }}">اغلاق</a> --}}
        </div>
    </form>
    
    <ol class='mt-5'>
        <p>ملاحظة/ يجب ان تكون ابعاد الصورة كالتالي لكي تظهر بالشكل المطلوب في الموقع</p>
        <li> عرض = 2024 بكسل</li>
        <li>ارتفاع = 576 بكسل</li>
    </ol>
</div>

</div>



@endsection
