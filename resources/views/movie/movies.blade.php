<?php use App\Models\User; ?>
@extends('layouts.master')
@section('title')
فیلم ها
@endsection
@section('content')
<style>
  .vl {
    border-left: 3px solid rgb(219, 223, 219 );
    height: 70px;
    margin-left: 25px;
  }
  .vll {
    border-left: 3px solid rgb(219, 223, 219 );
    height: 8px;
    margin-left: 5px;
    margin-right: 5px;
  }
  .card {
    transition: transform 0.3s ease;
    cursor: pointer;
}

.card:hover {
    transform: scale(1.1);
}
  </style>
<main>
  <div style="width:100%;margin-top: 75px;margin-bottom:20px;" class=" d-flex  justify-content-center align-items-center">
    <img src="logo.png " style="margin-right:auto margin_left:auto; width: 100px;">
    <div class="vl"></div>
    <h2 class="text-light">لیست فیلم ها</h2>
  </div>

  <div style="width:100%" class=" d-flex  justify-content-center align-items-center" data-bs-theme="dark">
    <form class="d-flex" role="search" method="GET" style="margin-left: auto; margin-right:auto " >
      <input class="form-control me-2 " type="search" name="search" placeholder="دنبال چی میگردی؟"   value="{{ request('search') }}" aria-label="Search" style="width: 276px">
      <button class="btn btn-light" type="submit">جستجو</button>
    </form>
  </div>
  <br>
  <div class="album py-3" style="background-color: rgba(22, 24, 22, 0.88);">
    <div class="container" >
        <div style="width:100%; margin-bottom:15px;" class=" d-flex  justify-content-center align-items-center" data-bs-theme="dark">
            <label class="form-label text-light" for="ordering" style="font-size: 18px"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5m-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5"/>
              </svg> مرتب سازی براساس </label>
            <form action="">
            <select class="form-select "  onchange="this.form.submit()" aria-label="Default select example" style="width: 150px" name="order" id="ordering">
                <option selected >{{$c_order}}</option>
                @if($c_order!='برترین')<option value="best">برترین </option>@endif
                @if($c_order!='جدید ترین')<option value="newest">جدید ترین</option>@endif
                @if($c_order!='تصادفی')<option value="random"> تصادفی</option>@endif

              </select>
              <input type="hidden" name="search" value="{{ request()->search }}" />
            </form>
            </div>
      <div class="row row-cols-2 row-cols-sm-2 row-cols-md-5 g-3">
        @if($movies->total() != 0)
        @foreach ($movies as $key => $value)
        <div class="col">
          <div class="card shadow-sm bg-dark">
           {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">--}}
                <img src={{$value->Poster}} alt="Movie" class="bd-placeholder-img card-img-top" width="100%" height="280" >
              <title>{{$value->Title}} </title>
              <rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body">
              <div class="text-center text-light" dir="ltr">
                <h4 class="">  <a class="nav-link" href="movie?id={{$value->id}}">  @if (strlen($value->Title)>17){{substr($value->Title,0,17)."..."}}</title>@else{{$value->Title}}</title>@endif</a></h4>
              </div>
              {{--
              <p class="text-center" style="color: rgb(139, 138, 138)">@if (strlen($value->Description)>200)
                {{substr($value->Description,0,200)."..."}}.</p>
              @else
              {{$value->Description}} .</p>
              @endif--}}

              <div class="d-flex justify-content-between align-items-center">


                  <p class="text-light" style="display: inline-flex"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                    <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9z"/>
                    <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1zm1.038 3.018a6 6 0 0 1 .924 0 6 6 0 1 1-.924 0M0 3.5c0 .753.333 1.429.86 1.887A8.04 8.04 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5M13.5 1c-.753 0-1.429.333-1.887.86a8.04 8.04 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1"/>
                  </svg>{{' '.$value->Duration}}

                  @if ($value->Rating!=0)

                  <p class="text-warning" style="display: inline-flex"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>{{$value->Rating}}</p>
                  @endif
              </div>
              <hr class="text-light">
              <div class="d-flex justify-content-center align-items-center" dir="ltr">
                <div >
                   {{-- @foreach (explode(",", $value->Genre) as $genre) --}}
                    <button type="button" class="btn btn-sm btn-outline-light"  disabled>{{explode(",", $value->Genre)[0]}}</button>
                    <button type="button" class="btn btn-sm btn-outline-light"  disabled>{{$value->Year}}</button>
                    {{-- @endforeach --}}
                </div>
               {{--  <p style="color: rgb(102, 105, 103);margin-bottom:2px"><strong><s> 3000000 </s></strong></p>--}}

                <small style="color: rgb(139, 138, 138)">{{--jdate($value->created_at)->format('%B %d، %Y')--}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <div style="width:100%; height:300px" class=" d-flex  justify-content-center align-items-center">
          <h2 class="text-light" style="margin-left: 25px">404</h2>
          <div class="vl" ></div>
          <h2 class="text-light">متاسفانه فیلمی  با عنوان ورودی شما یافت نشد</h2>
        </div>
        @endif
      </div>
      {{$movies->appends(['search' => request('search'),'order'=> request('order')])->links('vendor.pagination.bootstrap-5')}}
    </div>
  </div>

</main>

@endsection
