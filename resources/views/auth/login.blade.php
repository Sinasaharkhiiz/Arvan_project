@extends('layouts.master')

@section('content')
<section class="vh-100 gradient-custom">
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
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                <div class="mb-md-3 mt-md-3 pb-1" >

                <h2 class="fw-bold mb-3 text-uppercase">ورود به سیستم</h2>


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
                  <input type="password" name="password" id="typePasswordX" style="text-align: center" class="form-control form-control-lg @error('password') is-invalid @enderror" required autocomplete="current-password" />
                    @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                  <label class="form-label" for="typePasswordX">رمز عبور</label>
                </div>


                <p class="small mb-2 pb-lg-2"><a class="text-white-50" href="#!">فراموش کرده اید؟</a></p>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">ورود</button>

              </div>
              <div>
                <p class="mb-0">هنوز عضو نشده اید؟ <a href="register" class="text-white-50 fw-bold">ثبت نام </a>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </section>
@endsection
