<?php use App\Models\User; ?>
@extends('layouts.master')

@section('title')
{{$m_data->Title}}
@endsection

@section('content')


<div class="container" style="margin-top: 100px">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-8">
                <div class="card bg-dark">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-12" dir="ltr">
                                <h3 class="mb-0 text-light">{{$m_data->Title}}</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h5 class="mb-0 text-light">خلاصه ای از فیلم:</h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                            </div>
                            <div dir="ltr" class="col-sm-9 text-secondary">
                                <h6  class="mb-0" style="color: darkgray">{{$m_data->Description}}</h6>
                            </div>
                        </div>
                        <hr>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h5 class="mb-0 text-light">بازیگران:</h5>
                            </div>
                            <hr>
                            <div class="col-sm-3"></div>
                            <div  dir="ltr" class="col-sm-9 text-secondary">
                                <h6 style="color: darkgray">

                                    {{$m_data->Cast}}

                                </h6>
                            </div>
                        </div>
                        <hr class="text-light">
                        <p class="text-light mb-1"><span style="color: darkgray"> تا کنون</span> {{$p_count}} <span style="color: darkgray"> کاربر این فیلم را به لیست مورد علاقه خود اضافه کرده اند </span></p>
                        <hr class="text-light">
                        <div class="row">

                            <div class="col-sm-12 text-secondary" id="comments">
                                @if (Auth::check())
                                @if (Auth::user()->role=='super_admin' || Auth::user()->role=='admin' )
                                <button type="button" class="btn btn-warning "><a href={{'movies_management?search='.$m_data->id}} class="nav-link">ویرایش فیلم</a></button>
                                @endif
                                @endif
                                <form class="needs-validation" novalidate method="post" action="comment/{id}" enctype="multipart/form-data" style="display: inline">
                                    @csrf
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-theme="dark">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">نظر جدید</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form>
                                          <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">فیلم:</label>
                                            <input type="text" class="form-control" id="recipient-name" value="{{$m_data->Title}}" readonly>
                                            <input type="text" name="m_id" class="form-control" id="re-name" value="{{$m_data->id}}" readonly hidden>
                                          </div>
                                          <div class="mb-3">
                                            <label for="message-text" class="col-form-label">نظر:</label>
                                            <textarea class="form-control" name="comment" id="message-text" required></textarea>
                                          </div>
                                        </form>
                                      </div>
                                      <div class="modal-footer" style="flex-direction: row-reverse">
                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">بازگشت</button>
                                        <button type="submit" class="btn btn-light">ارسال</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </form>

                                    <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                        <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                                      </svg>  دیدگاه  </button>
                                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@getbootstrap"> ثبت امتیاز </button>
                                @if (!$Check_playlist)
                                <form method="POST" action="add_playlist" style="display: inline">
                                    @csrf
                                    <input type="text" value="{{$m_data->id}}" name="mo_id" id="mo_id" readonly hidden>
                                <button type="submit" class="btn btn-light" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z"/>
                                  </svg> افزودن به مورد علاقه</button>
                                </form>
                                @else
                                <form method="POST" action="rm_playlist" style="display: inline">
                                    @csrf
                                    <input type="text" value="{{$m_data->id}}" name="mv_id" id="" readonly hidden>
                                <button type="submit" class="btn btn-danger" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon" viewBox="0 0 16 16">
                                  <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1z"/><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                  </svg> حذف از مورد علاقه</button>
                                </form>

                                @endif

                                <form class="needs-validation" novalidate method="post" action="rate/{id}" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-theme="dark">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">امتیاز جدید</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form>
                                          <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">فیلم:</label>
                                            <input type="text" class="form-control" id="recipient-name" value="{{$m_data->Title}}" readonly>
                                            <input type="text" name="m_id" class="form-control" id="re-name" value="{{$m_data->id}}" readonly hidden>

                                          </div>
                                          <div class="mb-3">
                                            <label for="message-text" class="col-form-label">امتیاز:</label>
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group" style="display:block">

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio10" value="10" autocomplete="off">
                                                <label class="btn btn-outline-light" style=" width: 45px; " for="btnradio10"> 10 </label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio9" value="9" autocomplete="off">
                                                <label class="btn btn-outline-light" style=" width: 35px; " for="btnradio9"> 9 </label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio8" value="8" autocomplete="off">
                                                <label class="btn btn-outline-light" style=" width: 35px; " for="btnradio8"> 8 </label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio7" value="7" autocomplete="off">
                                                <label class="btn btn-outline-light" style=" width: 35px; " for="btnradio7"> 7 </label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio6" value="6" autocomplete="off">
                                                <label class="btn btn-outline-light" style=" width: 35px; " for="btnradio6"> 6 </label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio5" value="5" autocomplete="off" checked>
                                                <label class="btn btn-outline-light" style=" width: 35px; " for="btnradio5"> 5 </label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio4" value="4" autocomplete="off">
                                                <label class="btn btn-outline-light" style=" width: 35px; " for="btnradio4">  4 </label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" value="3" autocomplete="off">
                                                <label class="btn btn-outline-light" style=" width: 35px; " for="btnradio3">  3 </label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" value="2" autocomplete="off">
                                                <label class="btn btn-outline-light" style=" width: 35px; " for="btnradio2"> 2 </label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" value="1" autocomplete="off">
                                                <label class="btn btn-outline-light" style=" width: 35px; " for="btnradio1"> 1 </label>
                                              </div>

                                          </div>
                                        </form>
                                      </div>
                                      <div class="modal-footer" style="flex-direction: row-reverse">
                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">بازگشت</button>
                                        <button type="submit" class="btn btn-light">ثبت</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="col-lg-4">
                <div class="card bg-dark">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{$m_data->Poster}}" alt="Admin" class=" p-1 bg-light" width="170px">
                            <div class="mt-3">

                                <p class="text-light mb-1"><span style="color: darkgray">کارگردان:</span> {{$m_data->Director}}</p>
                                <p class="text-light mb-1"><span style="color: darkgray">سال انتشار:</span> {{$m_data->Year}}</p>
                                <p class="text-light mb-1"><span style="color: darkgray">مدت زمان :</span> {{$m_data->Duration}} دقیقه</p>
                                <p class="text-dark mb-1" style="background-color: #f6b828;border-radius:15px">امتیاز:<b>{{$m_data->Rating}}</b>/10</p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="text-light" id="comments">
    <div class="col-lg-8">
        <div style="background-color: rgba(22, 24, 22, 0.6); border-radius: 10px" >
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <h3 class="mb-0 text-light" style="display: inline">دیدگاه و پرسش:</h3>

                    </div>

                </div>

                @if($co_data->total() != 0)
                @foreach ($co_data as $key => $value)
                <div class="row mb-3">
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-10 text-secondary" style="padding-bottom: 20px">
                        <div class="mb-0" style="background-color: rgba(22, 24, 22, 0.9); border-radius: 10px">
                            <?php $sender = User::find($value->sender_id)?>
                            <img src="{{'storage/'.$sender->avatar}}" alt="Admin" class="rounded-circle p-0 bg-light" width="50" style="display: inline; margin-right:5px;margin-top:5px;margin-bottom:5px">
                            <div style="margin-right: 10px ; display:inline">{{$sender->name}}</div>
                            <div dir="ltr" style="margin-right: 10px ; display:inline"><a style="text-decoration: none;" href="user_profile?id={{$sender->id}}">{{"@".$sender->username}}</a></div>

                            <br>
                            <h5 class="text-light" style="margin-right: 20px">{{$value->comment}}</h5>
                            @if (Auth::user()->id == $value->sender_id || Auth::user()->role == "admin" || Auth::user()->role == "super_admin")
                            <br>
                            <div style="margin-right: 20px">
                                <form class="needs-validation" id="delete_comment" novalidate method="post" action="delete_comment/{id}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="com_id" class="form-control" id="re-name" value="{{$value->id}}" readonly hidden>
                                    <input type="text" name="cou_id" class="form-control" id="re-name" value="{{ request('id')}}" readonly hidden>
                                <a type="submit" onclick="document.getElementById('delete_comment').submit();"><div class="text-danger" style="display: inline-flex"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><title>حذف</title>
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                  </svg></div></a>

                                </form>
                            </div>
                            @endif
                            <div style="text-align: left; margin-left: 10px">
                                {{jdate($value->created_at)->ago()}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div style="width:100%; height:100px" class=" d-flex  justify-content-center align-items-center">
                    <h3 class="text-light">نظری درباره این فیلم ثبت نشده است. </h3>
                  </div>
                @endif
            </div>
            {{$co_data->appends(['id' => request('id')])->fragment('comments')->links('vendor.pagination.bootstrap-5')}}
        </div>
    </div>


</div>





@endsection
