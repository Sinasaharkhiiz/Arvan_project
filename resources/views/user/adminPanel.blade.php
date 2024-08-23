@extends('layouts.master')

@section('title')
    صفحه کاربری ادمین
@endsection


@section('content')


<div class="album py-3" style="background-color: rgba(22, 24, 22, 0.5);">
  <div class="container" >
    <div class="row row-cols-1 row-cols-md-2 g-2">
      <div class="col">
        <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
          <div class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16" style="padding-left: 3px">
            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
          </svg>&nbsp;کاربران</div>
          <div class="card-body">
            <h5 class="card-title"> تعداد کاربران &nbsp;: &nbsp;&nbsp;{{$user_count}} </h5>
            <hr class="text-light">
            <div class="d-grid gap-3 col-5 mx-auto">
                <a href="users_management"><button type="button" class="btn btn-sm btn-light" >اطلاعات بیشتر</button></a>
              </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
          <div class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1h-2v2h2zm-2 3v2h2V4zm2 3h-2v2h2zm-2 3v2h2v-2zm2 3h-2v2h2z"/>
          </svg>&nbsp;&nbsp;فیلم ها</div>
          <div class="card-body">
            <h5 class="card-title">تعداد فیلم &nbsp;: &nbsp;&nbsp;{{$movie_count}}</h5>
            <hr class="text-light">
            <div class="d-grid gap-3 col-5 mx-auto">
                <a href="movies_management"><button type="button" class="btn btn-sm btn-light" >اطلاعات بیشتر</button></a>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>




@endsection
