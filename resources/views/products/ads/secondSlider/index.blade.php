@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-secondary  p-2" id="pageTitle">الاعلانات</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2" >
            <a href="{{ route('secondSlider.create') }}" class="btn btn-light text-success shadow">اضافة <i class="bi bi-plus-lg"></i></a>
        </div>
    </div>
</div>




<div class="row row-cols-1 row-cols-md-4 g-4">

    @foreach ($secondSlide as $item)
            <div class="col">
            <div class="card" style="height:300px">
                <img src="{!! URL::asset('public/uploads/adsImage/'.$item->photo) !!}" alt=""  class="card-img-top img-tumbnail">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                </div>
                <div class="card-header">
                    <form action="{{route('secondSlider.destroy', $item->id )}}"  method="POST">
                        @csrf
                        @method('DELETE')
                        @if ($item->isShow == 1 )
                            <a class="btn btn-outline-success px-3 py-0" href="{{route('secondSlider.hide', $item->id)}}">اخفاء <i class="bi bi-eye-slash"></i></a>
                        @else
                            <a class="btn btn-outline-dark px-3 py-0" href="{{route('secondSlider.display', $item->id)}}">اظهار <i class="bi bi-eye"></i></a>
                        @endif
                        {{-- <a  class="btn text-primary" href="{!!route ('products_types.edit', $productType->id)!!}" title="تعديل">تعديل<i class="bi bi-pencil"></i></a> --}}
                        <button class="btn text-danger" type="submit" onclick="return confirm('Are you sure?');" title="حذف" >حذف<i class="bi bi-trash"></i></button>
                    </form>

                </div>
            </div>
            </div>
    @endforeach
    </div>



@endsection
