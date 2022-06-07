@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="pageTitle">اضافة منتج</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      </div>
    </div>
</div>


<div class="container bg-light mt-5 p-5">
    <form action="{{route('products.store')}}" method="POST" action="" enctype="multipart/form-data">
        @csrf
        <div class="form-group mx-5">
          <input id="inputIcon" type="text" name='name' class="form-control"  aria-describedby="emailHelp" placeholder="اكتب اسم المنتج">
        </div>
        <br><br>
        <div class="form-group mx-5">
            <input id="inputIcon" type="file" name='photo' class="form-control"  aria-describedby="emailHelp" >
        </div>
        <br><br>
        <div class="form-group modal-footer mx-5">
          <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
    </form>

</div>
<hr>

<h2 class="mt-5 m-5">كل المنتجات</h2>
<div class="container">
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">اسم المنتج</th>
            <th scope="col">عمليات</th>

        </tr>
    </thead>
    <tbody>
        @php
            $i = 0;
        @endphp
        @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $i +=1 }}</th>
                <td>{{ $product->name }}</td>
                <td>

                    <form action="{{route('products.destroy', $product)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <span> <a  class="btn text-primary" href="{{route('products.edit', $product->id)}}" title="Edit">تعديل </a></span>

                        <span>  <button class="btn text-danger" type="submit" onclick="return confirm('هل انت متأكد انك تريد حذف اسم المنتج هذا؟');" title="Delete" >حذف</button></span>
                    </form>
                </td>
            </tr>

        @endforeach
    </tbody>
</table>
</div>


@endsection
