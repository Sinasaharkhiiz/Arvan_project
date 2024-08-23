@extends('layouts.master')

@section('title')
    افزودن فیلم
@endsection


@section('content')
<div class="container">
    <style>
        body {
            color : #ffffff;
        }
    </style>
    <main>
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-1 "  src="/logo.png" alt="" width="250" >
        <h2> ویرایش فیلم  </h2>

      </div>

      <div class="row g-5" style="display: flex;justify-content: center; background-color: rgba(22, 24, 22, 0.5)">
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">مشخصات فیلم</h4>
          <form class="needs-validation" novalidate method="post" action="edit_movie" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
              <div class="col-sm-12">
                <label for="Title" class="form-label" >عنوان</label>
                <input type="text" class="form-control" dir="ltr" id="Title" name="Title" placeholder="" value="{{$m_data->Title}}" required>
                <input type="text" class="form-control"  id="movie_id" name="movie_id" placeholder="" value="{{$m_data->id}}" required readonly hidden>
                <div class="invalid-feedback">
                  Valid Title is required.
                </div>
              </div>

              <div class="col-sm-6" >
                <label for="Genre" class="form-label">ژانر</span></label>
                <input dir="ltr" type="text" class="form-control" id="Genre" name="Genre" placeholder="Action, Adventure,..." value="{{$m_data->Genre}}" required>
                <div class="invalid-feedback">
                  Valid Genre is required.
                </div>
              </div>

              <div class="col-3">
                <label for="Year" class="form-label">سال انتشار</label>
                <input type="text" class="form-control" id="Year" name="Year" placeholder="2024" value="{{$m_data->Year}}" required>
                <div class="invalid-feedback">
                  Valid Year is required.
                </div>
              </div>

              <div class="col-3">
                <label for="Duration" class="form-label">زمان <span style="color: darkgray">(دقیقه)</span></label>
                <input type="text" class="form-control" id="Duration" name="Duration" placeholder="60" value="{{$m_data->Duration}}" required>
                <div class="invalid-feedback">
                  Valid Duration is required.
                </div>
              </div>

              <div class="col-12">
                <label for="description" class="form-label">خلاصه فیلم</label>
                <input type="text" dir="ltr" class="form-control" id="Description" name="Description" placeholder="خلاصه کوتاهی از فیلم" value="{{$m_data->Description}}" required>
                <div class="invalid-feedback">
                  Valid description is required.
                </div>
              </div>

              <div class="col-sm-6" >
                <label for="Poster" class="form-label">پوستر<span style="color: darkgray">(لینک)</span></label>
                <input dir="ltr" type="text" class="form-control" id="Poster" name="Poster" placeholder="https://m.media-amazon....." value="{{$m_data->Poster}}" required>
                <div class="invalid-feedback">
                  Valid Poster is required.
                </div>
              </div>


              <div class="col-6">
                <label for="cover" class="form-label">پوستر</span></label>
                <input class="form-control" accept=".gif,.jpg,.jpeg,.GIF,.png,.PNG,.JPG,.JPEG,.bmp,.BMP" name="cover" type="file" id="cover" placeholder=".png">
                <div class="invalid-feedback">
                  Valid cover is required.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="Director" class="form-label">کارگردان</label>
                <input type="text" class="form-control" id="Director" name="Director" placeholder="" value="{{$m_data->Director}}" required>
                <div class="invalid-feedback">
                  Valid Title is required.
                </div>
              </div>

              <div class="col-6">
                <label for="Cast" class="form-label">بازیگران </label>
                <input type="text" dir="ltr" class="form-control" id="Cast" name="Cast" placeholder="Actor1,actor2,..." value="{{$m_data->Cast}}" required>
                <div class="invalid-feedback">
                  Valid description is required.
                </div>
              </div>

              <hr>
            <button class="w-100 btn btn-outline-light btn-lg" type="submit" style="margin-bottom: 25px">تایید نهایی فیلم</button>
          </form>
        </div>
      </div>
    </main>
  </div>
    @endsection



