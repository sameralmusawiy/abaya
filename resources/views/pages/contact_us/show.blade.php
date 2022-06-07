@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')

<style>
    .container {
  /* max-width: 500px; */
  margin: auto;
  margin-top:2%;
  background: white;
  padding: 10px;
  justify-content: center;
  display:flex;
  padding-left: 10%;
  padding-right: 10%;
}
.card{
    box-shadow: 0px 0px 9px 0px rgb(207, 207, 207);
    text-align:center;
    padding: 0%;

    width:50%;
}
.contactImage{
    width:75%;
    height:auto;
}
</style>


<div class="container photo" style='text-align:center;'>
    <div class="card " >
        @if ($contactUsId->photo != null )
            <div>
                <img src="{!! URL::asset('public/uploads/contact_us/'.$contactUsId->photo) !!}" alt="" class=" contactImage w-50" style="">
            </div>
        @else
            <div>
                <img src="{{ asset('public/src/photos/pageImage/userAvatar.png') }}" alt="" class=" contactImage" style="">
            </div>
        @endif

        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
          <p class="card-text"><h2>{{ $contactUsId->name }}</h2></p>
          <p class="card-text"><h5>{{ $contactUsId->title }}</h5></p>
          <p class="card-text">
            <div class="row gx-1">
                <div class="col">
                 <div class="px-0 m-0 border bg-light">{{ $contactUsId->email  }}</div>
                </div>
                <div class="col">
                  <div class="px-0 m-0 border bg-light">{{ $contactUsId->phonenumber }}</div>
                </div>
              </div>
            </p>
            <p class="card-text">
                <div class="row gx-1">
                    <div class="col">
                     <div class="px-0 m-0 border bg-light">{{ $contactUsId->city  }}</div>
                    </div>
                    <div class="col">
                      <div class="px-0 m-0 border bg-light">{{ $contactUsId->district }}</div>
                    </div>
                </div>
            </p>
            <p class="p-0 m-0">الرسالة</p>
            <div class="bg-light"><p class="card-text">{{ $contactUsId->description }}</p></div>


        </div>
    </div>
</div>




@endsection
