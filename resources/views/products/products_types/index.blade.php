 @extends('layouts.cplayouts.controlPanelLayouts')

@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="pageTitle">اضافة نوع</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('products_types.home') }}" class="btn text-success rounded shadow"> كل المنتجات<i class="bi bi-arrow-return-left"></i></a>
        </div>
    </div>
</div>
<div class='mt-5'>
    <p>ملاحظة/ يجب ان تكون ابعاد الصور 352 بكسل للعرض و 460 بكسل للأرتفاع.</p>
</div>
<div  >
    @if (count($errors)>0)
        <ul style="text-align: left;">
            @foreach ($errors->all() as $item)
                <li>
                    {{$item}}
                </li>
            @endforeach
        </ul>
    @endif
</div>
<div class="container">
    <form class="row g-3" style="text-align: right;" action="{!! route('products_types.store') !!}" method="POST"  enctype="multipart/form-data">
    @csrf
            <div class="col-md-6">
                <label for="exampleFormControlInput1" class="form-label">اسم المنتج</label>
                <input name="name" type="text" class="form-control" id="" placeholder="اكتب اسم المنتج المراد اضافته">
            </div>
            <div class="col-md-6">
                <label for="exampleFormControlInput1" class="form-label">اضغط لأختيار الصور</label>
                <input id="inputIcon" type="file" name="photo[]" class="form-control" multiple="photo[]">
            </div>
            <br>
            <div class="col-md-6">
                <label for="exampleFormControlInput1" class="form-label">اختر المنتج الرئيسي</label>
                <select id="inputIcon" name="product_id" class="form-control"  aria-label="Default select example">
                    <option selected>اختر المنتج</option>
                    @foreach ($products as $product)
                        <option name="product_id" value="{{$product->id}}">
                            {{$product->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="exampleFormControlInput1" class="form-label">السعر</label>
                <input name="price" type="text" class="form-control" id="" placeholder="ادخل سعر المنتج">
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
                    <input class="form-check-input" type="radio" name='color' value="{{ $color->value }}" id="flexCheckDefault">
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
                    <input class="form-check-input" type="checkbox" name='fabric[]' value="{!! $fabric->name !!}" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                    {{ $fabric->name }}
                    </label>
                </div>
                @endforeach
            </div>
            <hr>


            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">وصف المنتج</label>
                <textarea name='description' class="form-control ckeditor" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>


            <div class="col-md-6">
                <label for="exampleFormControlInput1" class="form-label">اضغط لأختيار الصور</label>
                <input id="inputIcon" type="file" name="images[]" class="form-control" multiple="photo[]">
            </div>

        <div class="form-group">
            <button type="submit" class="btn text-white btn-primary">حفظ</button>
            {{-- <a class="btn text-danger" href="{{ route('products_types.index') }}">اغلاق</a> --}}
        </div>
    </form>
</div>

@endsection

