@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="pageTitle">انشاء اعلان </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2" >
            <a href="{{ route('secondSlider.index') }}" class="btn btn-light text-success shadow">رجوع <i class="bi bi-arrow-90deg-up"></i></a>
        </div>
    </div>
</div>




<div class="container bg-light mt-5 p-5">
    {{-- <p>
        <button class="btn btn-outline-primary mb-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            اضافة اعلان <i class="bi bi-chevron-down"></i>
        </button>
    </p> --}}
    <div class="collapse show" id="collapseExample">
        <div class="container">
            <form class="" style="text-align: right;" action="{!! route('secondSlider.store') !!}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">العنوان</label>
                    <input name="title" type="text" class="form-control" id="" placeholder="نبذة عن الاعلان">
                </div>
                <br><br><br>
                <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">اضغط لأختيار الصورة</label>
                    <input id="inputIcon" type="file" name="photo" class="form-control" multiple="photo[]">
                </div>
                <br><br><br>
                <div class="form-group">
                    <button type="submit" class="btn text-white btn-primary">حفظ</button>
                    {{-- <a class="btn text-danger" href="{{ route('products_types.index') }}">اغلاق</a> --}}
                </div>
            </form>
            
            <ol class='mt-5'>
                <p>ملاحظة/ يجب ان تكون ابعاد الصورة كالتالي لكي تظهر بالشكل المطلوب في الموقع</p>
                <li> عرض = 900 بكسل</li>
                <li>ارتفاع = 432 بكسل</li>

            </ol>
        </div>
    </div>
</div>




@endsection
