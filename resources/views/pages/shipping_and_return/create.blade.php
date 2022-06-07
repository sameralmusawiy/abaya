@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')




<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="pageTitle">الشحن و الاسترجاع</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('shipping_and_return.index') }}" class="btn text-success rounded shadow"> رجوع<i class="bi bi-arrow-return-left"></i></a>
        </div>
    </div>
</div>
<div class="container">
    <form class="row g-3" style="text-align: right;" action="{!! route('shipping_and_return.store') !!}" method="POST"  enctype="multipart/form-data">
    @csrf
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">العنوان</label>
            <input name="title" type="text" class="form-control" id="" placeholder="قم بكتابة العنوان">
        </div>
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">اضغط لأختيار الصور</label>
            <input id="inputIcon" type="file" name="photo" class="form-control">
        </div>
        <br>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">الوصف</label>
            <textarea name='description' class="form-control ckeditor" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn text-white btn-primary">حفظ</button>
            {{-- <a class="btn text-danger" href="{{ route('products_types.index') }}">اغلاق</a> --}}
        </div>
    </form>
</div>







@endsection
