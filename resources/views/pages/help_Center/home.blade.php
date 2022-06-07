@extends('layouts.sitelayouts.header')

@section('content')
<style>
    .collapsible {
      background-color: rgb(255, 255, 255);
      color: rgb(68, 68, 68);
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: right;
      outline: none;
      font-size: 15px;
    }

    .active1, .collapsible:hover {
      background-color: rgb(209, 209, 209);
      color: rgb(228, 228, 228);

    }

    .content {
      padding: 0 18px;
      display: none;
      overflow: hidden;
      background-color: #f1f1f1;
    }
    </style>



<div class="container my-5">
    <div class="card my-5 border-0 " >
        <div class='text-center'>
            <p class="card-text "><h4>مركز المساعدة</h4></p>
        </div>
        @foreach ($help_Center as $item)
            <div class="row g-0">
                <div class="col-md-12">
                    <div class="card-body">
                        <a class="btn collapsible" type="button" data-bs-toggle="collapse" data-bs-target="#{{$item->question}}" aria-expanded="false" aria-controls="collapseExample">
                            {{ $item->question }}
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <div class=" content" id="{{ $item->question }}">
                            <div class="card-body">
                                <p class="card-text"><h4>{!! $item->answer !!}</h4></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        @endforeach
    </div>
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active1");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
              content.style.display = "none";
            } else {
              content.style.display = "block";
            }
          });
        }
        </script>
</div>


@endsection
