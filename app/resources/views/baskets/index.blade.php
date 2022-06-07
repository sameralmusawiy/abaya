@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')

<div class="container-fluid">
    <div class="row row-cols-1 row-cols-xs-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5 g-4">
        @foreach ($baskets as $basket)
                <div class="col">
                    <div class="card" style='box-shadow: 0 4px 8px 0 rgba(3, 3, 3, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'>
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-header">
                            <h5 class="card-title">{{ $basket->name }}</h5>
                        </div>
                        <div class="card-body bg-secondary text-white" style="min-height: 350px;">
                            <p class="card-text">السعر: {{ ' IQD ' . $basket->order_id }} </p>
                            <p class="card-text">التقييم: {{ $basket->product_id }}</p>
                            <p class="card-text">القطع المتوفرة: {{ $basket->quantity }}</p>
                            <p class="card-text">مقدار التخفيض: {{ $basket->Auth::user()->name }}</p>
                        </div>
                        <div class="card-footer ">
                            <form action="{{route('baskets.destroy', $basket )}}"  method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn text-success" href="{!!route ('products_types.show', $basket->id)!!}" title="Show" >مشاهدة<i class="bi bi-eye"></i> </a>
                                <a  class="btn text-primary" href="{!!route ('products_types.edit', $basket->id)!!}" title="Edit">تعديل<i class="bi bi-pencil"></i></a>
                                <button class="btn text-danger" type="submit" onclick="return confirm('Are you sure?');" title="Delete" >حذف<i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
        @endforeach
        {{-- {{ $productTypes->links() }} --}}
    </div>
</div>

@endsection
