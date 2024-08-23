<?php use Illuminate\Support\Facades\Auth;?>
@extends('layouts.master')
@section('title')
Chat Movie
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
</style>
<div class="container" >
    <img src="logo.png" class="d-block mx-auto mb-4" style=";margin-top:10rem;" alt="">
    <h2 class="text-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
        <circle cx="8" cy="8" r="8"/>
      </svg> فیلم های منتخب</h2>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="c1.jpg" class="d-block w-100" alt="..." style="border-radius: 30px">
            <div class="carousel-caption d-none d-md-block">
              <p><a class="btn btn-light" href="movie?id=56">مشاهده فیلم</a></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="c2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="txt-carousel text-dark">Interstellar</h1>
                <p class="opacity-75 txt-carousel text-dark">When Earth becomes uninhabitable in the future</p>
                <p><a class="btn btn-light" href="movie?id=78">مشاهده فیلم</a></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="c3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                {{--<p class="opacity-75 txt-carousel text-dark">Harry, Ron, and Hermione search for Voldemort's remaining Horcruxes in their effort to destroy the Dark Lord as the final battle rages on at Hogwarts.</p>--}}
                <p><a class="btn btn-light" href="movie?id=536">مشاهده فیلم</a></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="c4.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              {{--<p class="opacity-75 txt-carousel text-dark">Harry, Ron, and Hermione search for Voldemort's remaining Horcruxes in their effort to destroy the Dark Lord as the final battle rages on at Hogwarts.</p>--}}
              <p><a class="btn btn-light" href="movie?id=309">مشاهده فیلم</a></p>

            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <h2 style="margin-top:5rem" class="text-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
        <circle cx="8" cy="8" r="8"/>
      </svg> فیلم های مورد علاقه شما (<a href="profile" class="text-light" style="text-decoration: none;">مشاهده بیشتر</a>)</h2>

      @if ($movies!="notlogin")



      <div class="album py-3" style="background-color: rgba(22, 24, 22, 0.88);">
        <div class="container" >
            <div style="width:100%; margin-bottom:15px;" class=" d-flex  justify-content-center align-items-center" data-bs-theme="dark">

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
              <h2 class="text-light">متاسفانه فیلمی در لیست مورد علاقه شما وجود ندارد</h2>
            </div>
            @endif
          </div>
          @else
          <div  style="border-radius: 35px; background-color: rgba(22, 24, 22, 0.88); width:100%; height:300px" class=" d-flex  justify-content-center align-items-center">
            <h2 class="text-light" style="margin-left: 25px">404</h2>
            <div class="vl" ></div>
            <h2 class="text-light">ابتدا وارد حساب کاربری خود شوید</h2>
          </div>
          @endif


</div>


@endsection
