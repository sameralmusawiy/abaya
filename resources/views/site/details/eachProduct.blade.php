@extends('layouts.sitelayouts.header')

@section('content')


<style>
    .content {
        /* max-width: 500px; */
        margin: auto;
        margin-top: 5%;
        background: white;
        padding: 10px;
    }

    .card {
        font-family: cairo, arial, helvetica, sans-serif;
        border: none;
    }

    .bigImage {
        /* overflow: hidden; */
        max-height: 450px;

        max-width: 600px;

        background-size: contain;
    }

    .fIframe {
        /* overflow: hidden;

    background-size: contain;
    height:500px;
    width:450px; */
    }

    .box {
        width: 700px;
        min-height: 200px;
        border: rgb(219, 219, 219) 3px dashed;
        border-width: 1px;
        border-bottom: none;
        padding: 10px;
        background-color: white;
    }

    @media only screen and (max-width:767px) {
        .box {
            width: 550px;
            border: rgb(219, 219, 219) 3px dashed;
            border-width: 1px;

            background-color: rgb(255, 255, 255);
        }
    }

    @media only screen and (max-width:600px) {
        .box {
            width: 450px;
            border: rgb(255, 255, 255) 2px dashed;
            border-width: 1px;

            background-color: rgb(192, 192, 192);
        }
    }

    @media only screen and (max-width:500px) {
        .box {
            margin-top: 10px;
            width: 320px;
            border: rgb(219, 219, 219) 3px dashed;
            border-width: 1px;

            background-color: rgb(255, 255, 255);
        }
    }

    .btnIframe {
        text-decoration: none;
        border: rgb(219, 219, 219) 2px dashed;
        border-width: 1px;
        border-bottom: none;
        margin-left: 20px;
        padding-left: 40px;
        padding-right: 10px;
        background-color: rgb(255, 255, 255);

    }

    .btnIframe:hover {
        text-decoration: none;
        background-color: black;
        color: white;
    }

    .btnIframe:focus {
        text-decoration: none;
        border: none;

        background-color: rgb(0, 0, 0);
        color: white;

    }



    .hidden {
        /* visibility: hidden; */
        display: none;
    }



    input[type="number"] {
        -webkit-appearance: textfield;
        -moz-appearance: textfield;
        appearance: textfield;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
    }

    .number-input {
        border: 2px solid #ddd;
        display: inline-flex;
    }

    .number-input,
    .number-input * {
        box-sizing: border-box;
    }

    .number-input button {
        outline: none;
        -webkit-appearance: none;
        /* background-color: transparent; */
        border: none;
        align-items: center;
        justify-content: center;
        width: 1.5rem;
        height: 1.5rem;
        cursor: pointer;
        margin: 0;
        position: relative;
    }

    /* .number-input button:after {
  display: inline-block;
  position: absolute;
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  content: '\f077';
  transform: translate(-50%, -50%) rotate(180deg);
} */
    .number-input button.plus:after {
        transform: translate(-50%, -50%) rotate(0deg);
    }

    .number-input input[type=number] {
        font-family: sans-serif;
        max-width: 3rem;
        padding: .5rem;
        border: solid #ddd;
        border-width: 0 2px;
        font-size: 1rem;
        height: 1.5rem;
        font-weight: bold;
        text-align: center;
    }

    /* /////////////////////////////////////////// */
    .column {
        float: left;
        width: 25%;
        padding: 10px;
    }

    /* Style the images inside the grid */
    .column img {
        opacity: 0.8;
        cursor: pointer;
    }

    .column img:hover {
        opacity: 1;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* The expanding image container */
    .container {
        position: relative;
        display: none;
    }

    /* Expanding image text */
    #imgtext {
        position: absolute;
        bottom: 15px;
        left: 15px;
        color: white;
        font-size: 20px;
    }

    /* Closable button inside the expanded image */
    .closebtn {
        position: absolute;
        top: 10px;
        right: 15px;
        color: white;
        font-size: 35px;
        cursor: pointer;
    }

</style>




<main class='content '>
    <div class="card mb-3 " style="max-width: 1600px;">
        <div class="row g-0">
            <div class="col-md-8 p-2">
                {{-- <div class=" container bigImage ">
                    @php
                    $imgSrcArr = [];
                    @endphp
                    @foreach ($products_types->photo as $image)
                    @php
                    $imgSrc = URL::asset('/uploads/images/'.$image);
                    array_push($imgSrcArr, $imgSrc)
                    @endphp
                    @endforeach
                    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                    <img src="{{ $imgSrcArr[0] }}" id="expandedImg" style="width:100%" class="p-3">
                    <div id="imgtext"></div>
                </div> --}}
                {{-- ////////////////////////////////////////////////////// الصور الصغيرة //////////////////////////////////////////////////////////////////////////  --}}
                <div class="row">
                    <div class="d-block text-center">
                        <div id='spritespin'></div>
                        <a class='btn rounded-circle border p-2 m-1 d-inline' id="prev"><i class="bi bi-caret-right"></i></a>
                        <a class='btn rounded-circle border p-2 m-1 d-inline' id="next"><i class="bi bi-caret-left"></i></a>
                    </div>
                </div>
                @php
                    $arr = [];
                @endphp
                @if ($imgId == null )
                    @foreach( $images[0]->photo as $key)
                        @php
                            $url = '/uploads/images/'.$key;
                            array_push($arr, $url);
                        @endphp

                    @endforeach
                @else
                    @foreach ($images as $image)
                        @if($image->id == $imgId)
                            @foreach ($image->photo as $photo)
                            @php
                                $url = '/uploads/images/'.$photo;
                                array_push($arr, $url);
                            @endphp
                            @endforeach
                        @endif
                    @endforeach
                @endif
                <br><br>
                @foreach($colors as $color)
                    @foreach ($images as $image)
                        @if($color->id == $image->color_id)
                        <a href="{{ route('products_types.show', ['imgId'=>$image->id, 'id'=> $id ]) }}" class="btn rounded-circle border p-3 m-1" style="background-color:{{ $color->value }}"><small>  </small></a>
                        @endif
                    @endforeach
                @endforeach
            </div>

            <script>
                function myFunctionProduct(imgs) {
                    var expandImg = document.getElementById("expandedImg");
                    var imgText = document.getElementById("imgtext");
                    expandImg.src = imgs.src;
                    imgText.innerHTML = imgs.alt;
                    expandImg.parentElement.style.display = "block";
                }
            </script>


            <script>
                var frame = '<?php echo json_encode($arr  )   ?>';
                var frames = JSON.parse(frame)
                // these are the frame numbers that will show a detail bubble
                var details = [0, 8, 20];
                // the current index in the details array
                var detailIndex = 0;
                // initialise spritespin
                var spin = $('#spritespin');
                spin.spritespin({
                    source: frames,
                    width: 600,
                    sense: -1,
                    height: 450,
                    animate: false
                });
                // get the api object. This is used to trigger animation to play up to a specific frame
                var api = spin.spritespin("api");
                spin.bind("onLoad", function(){
                    var data = api.data;
                    data.stage.prepend($(".details .detail")); // add current details
                    data.stage.find(".detail").hide();         // hide current details
                }).bind("onFrame", function(){
                    var data = api.data;
                    data.stage.find(".detail:visible").stop(false).fadeOut();
                    data.stage.find(".detail.detail-" + data.frame).stop(false).fadeIn();
                });
                $( "#prev" ).click(function(){
                    setDetailIndex(detailIndex - 1);
                });
                $( "#next" ).click(function(){
                    setDetailIndex(detailIndex + 1);
                });
                function setDetailIndex(index){
                    detailIndex = index;
                    if (detailIndex < 0){
                        detailIndex = details.length - 1;
                    }
                    if (detailIndex >= details.length){
                        detailIndex = 0;
                    }
                    api.playTo(details[detailIndex]);
                }
            </script>







            {{-- ////////////////////////////////////////////////////// الصور الصغيرة النهاية//////////////////////////////////////////////////////////////////////////  --}}

            <div class="col-md-4 p-5">
                <div class="card-body">
                    <h5 class="card-title ">{{ $products_types->name }}</h5>
                    @if (isset($products_types->offers->discount))
                    <h6 class='text-danger small'><s>{{ $products_types->price . ' ع د ' }}</s>{{ ' - ' }} {{ $products_types->offers->discount . ' ع د ' }}</h6>
                    @else
                    <h6  class='text-danger small'>{{ $products_types->price . ' ع د ' }}</h6>
                    @endif
                    {{-- <h6>{{ $products_types->rate }}</h6> --}}
                    <h6 class='small'>القطع المتوفرة: {{ $products_types->number }}</h6>
                    @php
                    $allcolor = explode('-', $products_types->color);
                    $allsize = explode('-', $products_types->size);
                    $allfabric = explode('-', $products_types->fabric);
                    @endphp
                    <h6>
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class='hidden'>
                                <input type="hidden" value="{{ $products_types->id }}" name="id">
                                <input type="text" value="{{ $products_types->name }}" name="name">
                                @if (isset($products_types->offers->discount))
                                <input type="" value="{{ $products_types->offers->discount }}" name="price">
                                @else
                                <input type="" value="{{ $products_types->price }}" name="price">
                                @endif
                                <input type="hidden" value="{{ $products_types->image }}" name="photo[]">
                            </div>
                            <div class='mt-1'>
                                <h6 class="card-text small">نوع القماش</h6>
                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @foreach ($allfabric as $fabric)
                                        <div class='form-check form-check-inline p-0 m-0'>
                                            <input type="radio" value="{{ $fabric }}" name="fabric" class="btn-check" id="{{ $fabric }}" autocomplete="off">
                                            <label for="{{ $fabric }}" class="btn btn-outline-secondary px-2">{{ $fabric }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class='mt-1'>
                                <h6 class="card-text small">اللون</h6>
                                @foreach ($allcolor as $color)
                                <div class="form-check form-check-inline">
                                    <input style="background-color:{{ $color }} " class="form-check-input" type="radio" name="color" id="inlineRadio2" value="{{ $color }}">
                                </div>
                                @endforeach
                            </div>
                            <div class='mt-1'>
                                <h6 class="card-text small">الحجم</h6>
                                @foreach ($allsize as $size)
                                <div class='form-check form-check-inline p-0 m-0'>
                                    <input type="radio" value="{{ $size }}" name="size" class="btn-check" id="{{ $size }}" autocomplete="off">
                                    <label class="btn btn-outline-secondary px-2" for="{{ $size }}">{{ $size }}</label>
                                </div>
                                @endforeach
                            </div>
                            <button class="px-1 py-1 text-white  rounded mt-4 small" style="background-color: black">اضافة الى السلة <i class="bi bi-cart4"></i></button>
                            <div class="number-input bg-light">
                                <a onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"><i class="bi bi-dash"></i>
                                </a>
                                <input class="quantity" min="0" name="quantity" value="1" type="number">
                                <a onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"><i class="bi bi-plus"></i>
                                </a>
                            </div>
                        </form>
                        <form action="{!!route ('favorites.save' , $products_types->id)!!}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button class="submit btn btn-dark mx-0 mt-1">
                                <p class="small m-0">اضف الى قائمة المفضلات <i class="bi bi-heart"></i></p>
                            </button>
                        </form>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-success mb-3 mt-5">
        <div class=" bg-transparent border-success">
            <div>
            </div>
            <button class="btnIframe" type="three_element1" onclick="show('three_element1');" active>الوصف </button>
            <button class="btnIframe" type="three_element2" onclick="show('three_element2');">التعليقات</button>
            <button class="btnIframe" type="three_element3" onclick="show('three_element3');">الشحن</button>

            {{-- ////////////////////////////////////////////////////////////////// --}}
            <div class='box' id="three_element1" style="">{!! $products_types->description !!}</div>
            <div class='box' id="three_element2" style="display:none">
                @foreach ( $products_types->comment as $item)
                <div class="row">
                    <div class="col col-md-1">
                        <img src="{{ asset('/src/photos/pageImage/userAvatar.png') }}" alt="" class="img-tumbnail " width='50' height='50'>
                    </div>
                    <div class="col col-md-11 mb-3">
                        <h6 class="text-secondary">{{ $item->users->name  }}</h6>
                        <h6>{{ $item->comment }}</h6>
                    </div>
                    <hr>
                </div>
                @endforeach
            </div>
            <div class='box scrollspy-example' id="three_element3" data-bs-spy="scroll" style="display:none">بغداد الجديدة – مقابل افران الفراشة – مول بغداد الجديدة / طابق ١

                [ اهلاً وسهلاً بكم ]

                اسيا : 07708460007
                اثير : 07800049693

                #عباية_ستايل
            </div>
        </div>

        {{-- ////////////////////////////////////////////////// --}}
        <script type="text/javascript">
            function show(elementId) {
                document.getElementById("three_element1").style.display = "none";
                document.getElementById("three_element2").style.display = "none";
                document.getElementById("three_element3").style.display = "none";
                document.getElementById(elementId).style.display = "block";
            }

        </script>
        <form action="{!! route('comment.save', $products_types->id) !!}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="" name='comment' id="inputPassword5" class="form-control" placeholder="اكتب تعليقك هنا" aria-describedby="passwordHelpBlock" style="border-top:none">
            <button class="form-control bg-light" type="submit">تعليق</button>
        </form>
    </div>
</main>
<div class="card  mt-0 text-center">
    <!--<h5 class="card-title mb-5 py-2" style="background-color: rgb(230, 230, 230);">منتجات ذات صلة</h5>-->

    <div class="card-body container-fluid">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-0 mb-5">
            @foreach ($mainProducts as $mainProduct)

            @if ($mainProduct->products->name == 'عبائة رأس')

            <div class="col">
                <div class="card h-100 mt-2 text-end">
                    @foreach ($mainProduct->photo as $image)
                    @php
                    $new = [];
                    array_push($new, $image)
                    @endphp
                    @endforeach
                    <img id="img" src="{!!URL::asset('/uploads/images/'.$new[0]) !!}" alt="..." class="px-0" style="height: 370px; padding:0px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $mainProduct->name }}</h5>
                        <p class="card-text text-danger">{{ $mainProduct->price }}</p>
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class='hidden'>
                                <input type="hidden" value="{{ $mainProduct->id }}" name="id">
                                <input type="text" value="{{ $mainProduct->name }}" name="name">
                                <input type="" value="{{ $mainProduct->price }}" name="price">
                                <input type="text" value="{{ $mainProduct->fabric }}" name="fabric">
                                <input type="hidden" value="{{ $mainProduct->image }}" name="photo[]">
                                <input type="" value="1" name="quantity">
                            </div>
                            <button class="btn btn-dark py-0 small">اضافة الى السلة <i class="bi bi-cart4"></i></button>
                        </form>
                    </div>
                </div>
                </a>
            </div>
            @endif

            @endforeach
        </div>
    </div>
</div>









@endsection
