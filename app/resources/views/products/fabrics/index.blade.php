@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="pageTitle">الاقمشة</h1>
</div>


<div class="container bg-light mt-5 p-5">
    <p>
        <button class="btn btn-outline-primary mb-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            اضافة قماش <i class="bi bi-chevron-down"></i>
        </button>
    </p>
    <div class="collapse" id="collapseExample">
    <form action="{{route('fabrics.store')}}" method="POST">
        @csrf
        <div class="form-group mx-5">
            {{-- <label for="exampleColorInput" class="form-label">اسم القماش </label><br><br> --}}
            <input id="inputIcon" type="text" name='name' class="form-control"  aria-describedby="emailHelp" placeholder="اكتب اسم القماش المراد اضافته">
        </div>

        <br><br>
        <div class="form-group modal-footer mx-5">
        <button type="submit" class="btn btn-primary">حفظ</button>
        {{-- <button type="button" class="btn text-danger" data-bs-dismiss="modal">اغلاق</button> --}}
        </div>
    </form>
</div>

</div><br><br>
<hr>


<div class="container bg-light mt-5 p-5">
    <table class="table table-hover mx-5">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">اسم القماش</th>
            <th scope="col">عمليات</th>

        </tr>
    </thead>
    <tbody>
        @php
            $i = 0;
        @endphp
        @foreach ($fabrics as $fabric)
            <tr>
                <th scope="row">{{ $i +=1 }}</th>
                <td>{{ $fabric->name }}</td>
                <td>
                    <form action="{{route('fabrics.destroy', $fabric)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <span> <a  class="btn text-primary" href="{{route('fabrics.edit', $fabric->id)}}" title="Edit">تعديل </a></span>
                        <span>  <button class="btn text-danger" type="submit" onclick="return confirm('هل انت متأكد انك تريد حذف اسم القماش هذا؟');" title="Delete" >حذف</button></span>
                    </form>
                </td>
            </tr>

        @endforeach
    </tbody>
</table>
</div>






@endsection
