<?php use Illuminate\Support\Facades\Auth;?>
@extends('layouts.master')

@section('title')
    ویرایش کاربر
@endsection


@section('content')

<style>
    .nav{
        --bs-nav-link-color: #718096;
    }
</style>
<div class="container" style="margin-top: 100px" data-bs-theme="dark">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card bg-dark">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{'storage/'.$u_data->avatar}}" alt="Admin" class="rounded-circle p-1 bg-light" width="110">
                            <div class="mt-3">
                                <h4 class="text-light mb-1">{{$u_data->name}}</h4>
                                <p class="text-secondary mb-1" dir="ltr">{{"@".$u_data->username}}</p>
                                <hr>
                                <p class="text-secondary mb-1">@if($u_data->profile!=null)  {{$u_data->profile->age}} @endif</p>
                                <p class="text-secondary font-size-sm">@if($u_data->profile!=null) <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                  </svg>
                                  {{$u_data->profile->state}} @endif</p>
                                <a href="{{asset("chatify/".$u_data->id)}}"><button class="btn btn-outline-light" >Message</button> </a>
                            </div>
                        </div>
                        <hr class="my-4">
                    </div>
                </div>
            </div>
            <div class="col-lg-8">

                <div class="card">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">حساب کاربری</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">مشخصات فردی</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">راه های ارتباطی</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pass-tab" data-bs-toggle="tab" data-bs-target="#pass-tab-pane" type="button" role="tab" aria-controls="pass-tab-pane" aria-selected="false">رمز عبور</button>
                          </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"><div class="card-body">
                            <form class="needs-validation" novalidate method="POST" action="update_user" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="user_id" class="form-control" id="re-name" value="{{$u_data->id}}" readonly hidden>
                                <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">نام و نام خانوادگی:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="u_name" class="form-control" value="{{$u_data->name}}" @if(Auth::user()->id!=$u_data->id) readonly @endif>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">ایمیل:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="email" class="form-control" value="{{$u_data->email}}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">شماره همراه:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="+989254863215" @if(Auth::user()->id!=$u_data->id) readonly @endif>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                <label for="avatar" class="form-label">تصویر پروفایل : </label>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <input accept=".gif,.jpg,.jpeg,.GIF,.png,.PNG,.JPG,.JPEG,.bmp,.BMP" class="form-control" name="avatar" type="file" id="avatar" placeholder=".png">
                                </div>
                                <div class="invalid-feedback">
                                  Valid avatar is required.
                                </div>
                              </div>
                            @if(Auth::user()->role=="super_admin")
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">نقش:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                    <select class="form-select" aria-label="Default select example" name="role">
                                        <option selected value="{{$u_data->role}}">{{$u_data->role}}</option>
                                        @if($u_data->role!='user')<option value="user">user</option>@endif
                                        @if($u_data->role!='admin')<option value="admin">admin</option>@endif
                                        @if($u_data->role!='super_admin')<option value="super_admin">super_admin</option>@endif
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-outline-light px-4" value="اعمال تغییرات">
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>




                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="card-body">
                                <form class="needs-validation" novalidate method="POST" action="update_profile" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="user_id" class="form-control" id="re-name" value="{{$u_data->id}}" readonly hidden>
                                    <div class="row mb-3">
                                    <div class="col-sm-1">
                                        <label for="age" class="col-form-label">سن:</label>
                                    </div>
                                    <div class="col-sm-2 text-secondary">
                                        <input type="text" name="age" class="form-control" placeholder="" @if(Auth::user()->id!=$u_data->id) readonly @endif  @if($u_data->profile!=null) value='{{$u_data->profile->age}}' @endif>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="gender" class="col-form-label">جنسیت:</label>
                                    </div>
                                    <div class="col-sm-3 text-secondary">
                                        <select class="form-select" id="gender" required name="gender">
                                            <option selected  @if($u_data->profile!=null)value="{{$u_data->profile->gender}}" @endif>@if($u_data->profile!=null) @if($u_data->profile->gender=='male') آقا @else خانم @endif @endif</option>
                                            @if($u_data->profile!=null)
                                            @if ($u_data->profile->gender=='female')<option value="male">آقا</option>@endif
                                            @if ($u_data->profile->gender=='male')<option value="female">خانم</option>@endif
                                            @else
                                            <option value="male">آقا</option>
                                            <option value="female">خانم</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="state" class="col-form-label">استان:</label>
                                    </div>
                                    <div class="col-sm-4 text-secondary">
                                        <select class="form-select" id="state" required name="state">
                                            <option selected  @if($u_data->profile!=null)value="{{$u_data->profile->state}}" @endif>@if($u_data->profile!=null) {{$u_data->profile->state}} @endif</option>
                                            <option value="آذربایجان شرقی">آذربایجان شرقی</option>
                                            <option value="آذربایجان غربی">آذربایجان غربی</option>
                                            <option value="اردبیل">اردبیل</option>
                                            <option value="اصفهان">اصفهان</option>
                                            <option value="البرز">البرز</option>
		                                    <option value="ایلام">ایلام</option>
		                                    <option value="بوشهر">بوشهر</option>
                                            <option value="تهران">تهران</option>
		                                    <option value="چهارمحال و بختیاری">چهارمحال و بختیاری</option>
		                                    <option value="خراسان جنوبی">خراسان جنوبی</option>
		                                    <option value="خراسان رضوی">خراسان رضوی</option>
		                                    <option value="خراسان شمالی">خراسان شمالی</option>
		                                    <option value="خوزستان">خوزستان</option>
		                                    <option value="زنجان">زنجان</option>
		                                    <option value="سمنان">سمنان</option>
		                                    <option value="سیستان و بلوچستان">سیستان و بلوچستان</option>
		                                    <option value="فارس">فارس</option>
		                                    <option value="قزوین">قزوین</option>
		                                    <option value="قم">قم</option>
		                                    <option value="کردستان">کردستان</option>
		                                    <option value="کرمان">کرمان</option>
		                                    <option value="کرمانشاه">کرمانشاه</option>
		                                    <option value="کهگلویه و بویراحمد">کهگلویه و بویراحمد</option>
		                                    <option value="گلستان">گلستان</option>
		                                    <option value="گیلان">گیلان</option>
		                                    <option value="لرستان">لرستان</option>
		                                    <option value="مازندران">مازندران</option>
		                                    <option value="مرکزی">مرکزی</option>
		                                    <option value="هرمزگان">هرمزگان</option>
		                                    <option value="همدان">همدان</option>
		                                    <option value="یزد">یزد</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="about" class="form-label">درباره من :</label>
                                    </div>

                                    <div class="col-sm-10 text-secondary">
                                        <textarea name="about"  class="form-control" placeholder="" id="about" rows="4">@if($u_data->profile!=null) {{$u_data->profile->about}} @endif</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-outline-light px-4" value="اعمال تغییرات">
                                    </div>
                                </div>
                            </div>
                        </form>
                            </div>

                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                            <div class="card-body">
                                <form class="needs-validation" novalidate method="POST" action="update_user_contact" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="user_id" class="form-control" id="re-name" value="{{$u_data->id}}" readonly hidden>
                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <label for="website" class="col-form-label">وبسایت :</label>
                                        </div>
                                        <div class="col-sm-4 text-secondary">
                                            <input style="direction: ltr;" type="text" name="website" class="form-control" placeholder="https://unilink.ir/...." @if(Auth::user()->id!=$u_data->id) readonly @endif>
                                        </div>

                                        <div class="col-sm-2">
                                            <label for="telegram" class="col-form-label"> تلگرام :</label>
                                        </div>
                                        <div class="col-sm-4 text-secondary">
                                            <input style="direction: ltr;" type="text" name="telegram" class="form-control" placeholder="https://unilink.ir/...." @if(Auth::user()->id!=$u_data->id) readonly @endif>
                                        </div>
                                        </div>

                                          <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <label for="instagram" class="col-form-label">اینستاگرام :</label>
                                        </div>
                                        <div class="col-sm-4 text-secondary">
                                            <input style="direction: ltr;" type="text" name="instagram" class="form-control" placeholder="https://unilink.ir/...." @if(Auth::user()->id!=$u_data->id) readonly @endif>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="twitter" class="col-form-label"> توییتر (X) :</label>
                                        </div>
                                        <div class="col-sm-4 text-secondary">
                                            <input style="direction: ltr;" type="text" name="twitter" class="form-control" placeholder="https://unilink.ir/...." @if(Auth::user()->id!=$u_data->id) readonly @endif>
                                        </div>
                                        </div>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-outline-light px-4" value="اعمال تغییرات">
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>

                        <div class="tab-pane fade" id="pass-tab-pane" role="tabpanel" aria-labelledby="pass-tab" tabindex="0">
                            <div class="card-body">
                                <form class="needs-validation" novalidate method="POST" action="update_user_password" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="user_id" class="form-control" id="re-name" value="{{$u_data->id}}" readonly hidden>
                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <label for="old_pass" class="col-form-label">رمز عبور فعلی :</label>
                                        </div>
                                        <div class="col-sm-4 text-secondary">
                                            <input type="password" name="old_pass" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="new_pass" class="col-form-label">رمز عبور جدید :</label>
                                        </div>
                                        <div class="col-sm-4 text-secondary">
                                            <input type="password" name="new_pass" class="form-control">
                                        </div>

                                        </div>

                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-outline-light px-4" value="اعمال تغییرات">
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>

                      </div>

                </div>
                {{--
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="d-flex align-items-center mb-3">Project Status</h5>
                                <p>Web Design</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>Website Markup</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>One Page</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>Mobile Template</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>Backend API</p>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                --}}
            </div>
        </div>
    </div>
</div>

@endsection
