@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="pageTitle">الالوان</h1>
</div>




<div class="container bg-light mt-5 p-5">
    <p>
        <button class="btn btn-outline-primary mb-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            اضافة لون <i class="bi bi-chevron-down"></i>
        </button>
    </p>
    <div class="collapse" id="collapseExample">
    <form action="{{route('colors.store')}}" method="POST">
        @csrf
        <div class="form-group mx-5">
            {{-- <label for="exampleColorInput" class="form-label">قم بكتابة اسم اللون</label><br><br> --}}
            <input id="inputIcon" type="text" name='name' class="form-control "  aria-describedby="emailHelp" placeholder="اكتب اسم اللون المراد اضافته">
        </div>
        <br><br><br><br>
        <div class="form-group mx-5">
            <label for="exampleColorInput" class="form-label">اضغط بالمؤشر على اللون المطلوب</label><br><br>
            <input type="color" name='value' class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="اكتب اسم اللون المراد اضافته">
            {{-- <input type="color" id="inputIcon" name='value' class="form-control"  aria-describedby="emailHelp"> --}}
        </div>
        <br><br>
        <div class="form-group modal-footer mx-5">
        <button type="submit" class="btn btn-primary">حفظ</button>
        {{-- <button type="button" class="btn text-danger" data-bs-dismiss="modal">اغلاق</button> --}}
        </div>
    </form>
</div>

</div><br>
<hr>


<div class="container bg-light mt-5 p-5">
    <table class="table table-hover mx-5">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">اسم اللون</th>
            <th scope="col">الشكل</th>
            <th scope="col">عمليات</th>

        </tr>
    </thead>
    <tbody>
        @php
            $i = 0;
        @endphp
        @foreach ($colors as $color)
            <tr>
                <th scope="row">{{ $i +=1 }}</th>
                <td>{{ $color->name }}</td>
                <td><span class="badge rounded-pill" style="background-color:{{ $color->value }} ">{{ $color->name }}</span></td>
                <td>
                    <form action="{{route('colors.destroy', $color)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <span>  <button class="btn text-danger" type="submit" onclick="return confirm('هل انت متأكد انك تريد حذف هذا اللون؟');" title="Delete" >حذف</button></span>
                        <span> <a class="btn text-primary" href="{{route('colors.edit', $color->id)}}" title="Edit">تعديل </a></span>
                    </form>

                </td>
            </tr>

        @endforeach

    </tbody>
</table>
</div>






@endsection
