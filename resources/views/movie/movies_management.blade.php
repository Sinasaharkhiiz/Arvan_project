<?php use App\Models\User; ?>
@extends('layouts.master')

@section('title')
    صفحه کاربری ادمین
@endsection


@section('content')
<style>
  .vl {
    border-left: 2px solid rgb(219, 223, 219 );
    height: 14px;
    margin-left: 4px;
    margin-right: 4px;
  }
  .vla{
    border-left: 3px solid rgb(219, 223, 219 );
    height: 70px;
    margin-left: 25px;

  }
  </style>

<div style="width:100%" class=" d-flex  justify-content-center align-items-center">
  <img src="logo.png " style="margin-right:auto margin_left:auto; width: 100px;">
  <div class="vla"></div>
  <h2 class="text-light">مدیریت فیلم ها</h2>
</div>
<!-- search users -->
<div style="width:100%; margin-bottom:15px;" class=" d-flex  justify-content-center align-items-center" data-bs-theme="dark">
  <form class="d-flex" role="search" method="GET" style="margin-left: auto; margin-right:auto " >
    <input class="form-control me-2 " type="search" name="search" placeholder=" نام - id"   value="{{ request('search') }}" aria-label="Search" style="width: 276px">
    <button class="btn btn-light" type="submit">جستجو</button>
  </form>
</div>
<!-- search users -->

<div class="album py-3" style="background-color: rgba(22, 24, 22, 0.5);">
    <div class="container" >
      <div class="row row-cols-1 row-cols-md-4 g-4">
        @if($all_movies->total() != 0)
<table class="table table-dark table-striped" id="movies" >
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">id</th>
        <th scope="col">نام</th>
        <th scope="col">سال</th>
        <th scope="col">کارگردان</th>
        <th scope="col">عملیات</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @php
            $counter = 1;
        @endphp
        @foreach ($all_movies as $key => $value)
      <tr>
        <th scope="row">{{$counter}}</th>
        <td>{{$value->id}}</td>
        <td><a class="nav-link" href="movie?id={{$value->id}}">{{$value->Title}}</a></td>
        <td>{{$value->Year}}</td>
        <td>{{$value->Director}}</td>

        <td>
          <!-- Button trigger modal (Delete movie)-->
        <button type="button" class="btn btn-danger btn-sm deletemovie" value="{{$value->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal">
          حذف
       </button>

<!-- Modal (Delete movie)-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-theme="dark">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <h1 class="modal-title fs-5" id="exampleModalLabel">حذف فیلم</h1>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
     {{"آیا مطمئن هستید که می خواهید فیلم مورد نظر را حذف کنید؟"}}
     </div>
     <div class="modal-footer" style="flex-direction: row-reverse">
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">خیر</button>
       <form class="needs-validation" novalidate method="post" action="delete_movie/{id}" enctype="multipart/form-data">
         @csrf
         <input type="text" name="movie_id" class="form-control" id="movie_id" readonly hidden>
       <button type="submit" class="btn btn-danger">بله</button>
     </form>
     </div>
   </div>
 </div>
</div>
        <div class="vl" style="display: inline-flex"></div>
        <a class="btn btn-light btn-sm" href="edit_movie?id={{$value->id}}" role="button">ویرایش</a>
        </td>
      </tr>
      @php
          $counter+=1;
      @endphp
      @endforeach
    </tbody>
  </table>
  @else
        <div style="width:100%; height:300px" class=" d-flex  justify-content-center align-items-center">
          <h2 class="text-light" style="margin-left: 25px">404</h2>
          <div class="vla" ></div>
          <h2 class="text-light"> فیلمی مطابق با اطلاعات وارد شده پیدا نشد .</h2>
        </div>
  @endif
      </div>
      {{$all_movies->appends(['search' => request('search')])->links('vendor.pagination.bootstrap-5')}}
    </div>
</div>

@endsection

@section('scripts')
    <script>
      $(document).ready(function(){
        $('.deletemovie').click(function(e){

        e.preventDefault();

        var movie_id = $(this).val();
        $('#movie_id').val(movie_id);
        $('#deleteModal').modal('show');
      });
    });
    </script>
@endsection
