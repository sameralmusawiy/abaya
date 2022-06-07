@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
    <h1 class="h2" id="pageTitle">الرسائل الواردة</h1>
</div>

<div class="container-fluide text-center">
    {{-- <div class="card py-4 mb-4">
        <div class="row g-0">
            <div class="col-sm-6 col-md-12">.col-sm-6 .col-md-8</div>
        </div>
    </div> --}}
    <div class="card">
        <table class="table table-hover table-responsive">
            @foreach ($contactUs as $item)
            <tbody>
                <td class="table-active">{{ $item->name }}</td>
                <td class="table-">{{ $item->title }}</td>
                <td class="table-">{{ $item->city }}</td>
                <td class="table-">{{ $item->phonenumber }}</td>
                <td class="table-">
                    <form action="{{route('contact_us.destroy', $item->id )}}"  method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn text-success d-inline" href="{{route('contact_us.show', $item->id )}}" title="Show" >التفاصيل<i class="bi bi-eye"></i> </a>

                        <button class="btn text-danger d-inline" type="submit" onclick="return confirm('Are you sure?');" title="Delete" >حذف<i class="bi bi-trash"></i></button>
                    </form>
                </td>

            </tbody>
            @endforeach
        </table>
    </div>
</div>



@endsection
