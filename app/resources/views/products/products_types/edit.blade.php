@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')




<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="pageTitle">تعديل المنتج</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('products_types.home') }}" class="btn btn-light text-success shadow">كل المنتجات <i class="bi bi-arrow-return-left"></i></a>
        </div>
    </div>
</div>
  <div class="container">
    <form class="row g-3"  style="text-align: right;" action="{!! route('products_types.update', $productType->id) !!}" method="POST"  enctype="multipart/form-data">
        @method('PUT')
        @csrf


        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">اسم المنتج</label>
            <input name="name" type="text" class="form-control" id="" placeholder="اسم المنتج" value='{{ $productType->name }}'>
        </div>
        <br>
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">اضغط لأختيار الصور</label>
            <input id="inputIcon" type="file" name="photo[]" class="form-control" multiple="photo[]">
        </div>
        <br>
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">اختر المنتج الرئيسي</label>
            <select id="inputIcon" name="product_id" class="form-control"  aria-label="Default select example" value="">
            @foreach ($products as $product)
                <option name="product_id" value="{{$product->id}}">
                    {{$product->name}}
                </option>
            @endforeach
        </select>
        </div>
        <br>
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">السعر</label>
            <input name="price" type="text" class="form-control" id="" placeholder="السعر" value="{{ $productType->price }}">
        </div>
        

        <br>
        <br>
        <div class="mb-3">
            <p>اختر الاحجام المتوفرة</p>
            @foreach ($sizes as $size)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name='size[]' value="{{ $size->name }}" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  {{ $size->name }}
                </label>
              </div>
            @endforeach
        </div>
        <br><hr>
        <div class="mb-3">
            <p>اختر الالوان المتوفرة</p>
            @foreach ($colors as $color)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name='color[]' value="{{ $color->value }}" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  {{ $color->name }}
                </label>
              </div>
            @endforeach
        </div>
        <br><hr>
        <div class="mb-3">
            <p>اختر الاقمشة المتوفرة</p>
            @foreach ($fabrics as $fabric)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name='fabric[]' value="{{ $fabric->name }}" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  {{ $fabric->name }}
                </label>
              </div>
            @endforeach
        </div>
        <hr>
        <br>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">وصف المنتج</label>
            <textarea name='description' class="ckeditor form-control" id="ckeditor" rows="3">{{ $productType->description }}</textarea>
        </div>

        <br>
        <div class="form-group">
            <button type="submit" class="btn text-white btn-primary">حفظ</button>
            {{-- <a class="btn text-danger" href="{{ route('products_types.index') }}">اغلاق</a> --}}
        </div>
    </form>
</div>




@endsection
