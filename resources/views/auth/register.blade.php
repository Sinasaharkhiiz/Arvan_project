@extends('layouts.master')

@section('title')
    ثبت نام
@endsection


@section('content')
<section class="vh-105 gradient-custom">
    <style>
        body {
            .form-control-lg {
                font-size: 0.9rem;
            }

    }
    </style>
    <div class="container py-5 h-50">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-6 text-center">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                <div class="mb-md-3 mt-md-3 pb-1" >

                <h2 class="fw-bold mb-3 text-uppercase">ثبت نام</h2>

                <div class="form-outline form-white mb-4">
                    <input type="text" name="name" id="name" style="text-align: center" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus />
                      @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                      @enderror
                    <label class="form-label" for="name">نام</label>
                </div>



                <div class="form-outline form-white mb-4">
                  <input type="email" name="email" id="typeEmailX" style="text-align: center" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus />
                    @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                  <label class="form-label" for="typeEmailX">ایمیل</label>
                </div>


                <div class="form-outline form-white mb-2">
                  <input type="password" name="password" id="typePasswordX" style="text-align: center" class="form-control form-control-lg @error('password') is-invalid @enderror" required autocomplete="new-password" />
                    @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                  <label class="form-label" for="typePasswordX">رمز عبور</label>
                </div>

                <div class="form-outline form-white mb-2">
                    <input type="password" name="password_confirmation" id="password-confirm" style="text-align: center" class="form-control form-control-lg " required autocomplete="new-password" />
                    <label class="form-label" for="password-confirm">تایید رمز عبور</label>
                  </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">ثبت نام</button>

              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </section>
@endsection
