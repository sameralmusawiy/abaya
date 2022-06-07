@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="pageTitle">انشاء العرض</h1>
</div>


<div class="container bg-light mt-5 p-5">
    {{-- <p>
        <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            اضافة <i class="bi bi-chevron-down"></i>
        </button>
    </p> --}}
    <div class="collapse show" id="collapseExample">

        <form  style="text-align: right;" action="{!! route('offers.save',$productType->id ) !!}" method="POST"  enctype="multipart/form-data">
            @csrf
            <br>
            <div class="col-md-6">
                <label for="exampleFormControlInput1" class="form-label">السعر بعد الخصم</label>
                <input name="discount" type="text" class="form-control" id="" placeholder="السعر">
            </div>
            <br>
            <div class="col-md-6">
                <label for="exampleFormControlInput1" class="form-label">نهاية العرض</label>
                <input name="end_time" type="datetime-local" class="form-control" id="" >
            </div>
            <br><br><br>





            <div class="form-group">
                <button type="submit" class="btn text-white btn-primary">حفظ</button>
                {{-- <a class="btn text-danger" href="{{ route('products_types.index') }}">اغلاق</a> --}}
            </div>
        </form>
</div>


@endsection
