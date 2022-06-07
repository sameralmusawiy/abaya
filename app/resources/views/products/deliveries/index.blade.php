@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="pageTitle">اضافة عنوان</h1>
</div>


<div class="container bg-light mt-5 p-5">
    <p>
        <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            اضافة مدينة <i class="bi bi-chevron-down"></i>
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form action="{{route('deliveries.store')}}" method="POST">
                @csrf
                <div class="form-group mx-5">
                    <label for="exampleFormControlInput1" class="form-label">المدينة</label>
                    <select id="inputState" class="form-select form-control" name='city' >
                        <option selected value='النجف الاشرف' name='city'>النجف الاشرف</option>
                        <option value='كربلاء' name='city'>كربلاء</option>
                        <option value='بغداد' name='city'>بغداد</option>
                        <option value='بابل' name='city'>بابل</option>
                        <option value='الديوانية' name='city'>الديوانية</option>
                        <option value='كوت' name='city'>كوت</option>
                        <option value='ديالى' name='city'>ديالى</option>
                        <option value='ناصرية' name='city'>ناصرية</option>
                        <option value='بصرة' name='city'>بصرة</option>
                        <option value='ميسان' name='city'>ميسان</option>
                        <option value='صلاح الدين' name='city'>صلاح الدين</option>
                        <option value='كركوك' name='city'>كركوك</option>
                        <option value='اربيل' name='city'>اربيل</option>
                        <option value='سليمانية' name='city'>سليمانية</option>
                        <option value='دهوك' name='city'>دهوك</option>
                        <option value='الموصل' name='city'>الموصل</option>
                        <option value='الانبار' name='city'>الانبار</option>
                    </select>
                </div>
                <br><br>
                <div class="form-group mx-5">
                    <label for="exampleFormControlInput1" class="form-label">السعر</label>
                    <input name="price" type="text" class="form-control" id="" placeholder="ادخل سعر التوصيل">
                </div>
                <br><br>
                <div class="form-group mx-5">
                    <label for="exampleFormControlTextarea1" class="form-label">الوصف</label>
                    <textarea name='description' class="form-control ckeditor" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <br><br>
                <div class="form-group modal-footer mx-5">
                <button type="submit" class="btn btn-primary">حفظ</button>
                {{-- <button type="button" class="btn text-danger" data-bs-dismiss="modal">اغلاق</button> --}}
                </div>
            </form>
       </div>
    </div>





</div><br><br>
<hr>





<div class="container bg-light mt-5 p-5">


    <p>
        <button class="btn btn-outline-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
            التفاصيل <i class="bi bi-chevron-down"></i>
        </button>
    </p>
    <div class="collapse show" id="collapseExample2">
        <div class="card card-body">
            <table class="table table-hover mx-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">المحافظة</th>
                        <th scope="col">السعر</th>
                        <th scope="col">العمليات</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($deliveries as $delivery)
                        <tr>
                            <th scope="row">{{ $i +=1 }}</th>
                            <td>{{ $delivery->city }}</td>
                            <td>{{ $delivery->price }}</td>

                            <td>
                                <form action="{{route('deliveries.destroy', $delivery)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <span> <a  class="btn text-primary" href="{{route('deliveries.edit', $delivery->id)}}" title="Edit">تعديل </a></span>
                                    <span>  <button class="btn text-danger" type="submit" onclick="return confirm('هل انت متأكد انك تريد حذف اسم القماش هذا؟');" title="Delete" >حذف</button></span>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>





</div>






@endsection
