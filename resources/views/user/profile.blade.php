<?php use Illuminate\Support\Facades\Auth;?>
@extends('layouts.master')

@section('title')
   صفحه کاربری
@endsection


@section('content')


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
                                <a class="nav-link" href="user_profile?id={{$u_data->id}}"><p class="text-secondary mb-1" dir="ltr">{{"@".$u_data->username}}</p></a>
                                <hr>
                                <p class="text-secondary mb-1">@if($u_data->profile!=null)  {{$u_data->profile->age}} @endif</p>
                                <p class="text-secondary font-size-sm">@if($u_data->profile!=null) <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                  </svg>
                                  {{$u_data->profile->state}} @endif</p>
                                  @if(Auth::user()->id==$u_data->id)
                                <a href="edit_profile"><button class="btn btn-outline-light"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                  </svg> &nbsp; ویرایش پروفایل</button></a>
                                  @else
                                  <a href="{{asset("chatify/".$u_data->id)}}"><button class="btn btn-outline-light" >Message</button> </a>
                                  @endif
                                {{--<a href="{{asset("chatify/".$u_data->id)}}"><button class="btn btn-outline-light" >پیام رسان</button> </a> --}}
                            </div>
                        </div>
                        <hr class="my-4">
                        @if($u_data->profile!=null)
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-browser-firefox" viewBox="0 0 16 16"> <path d="M13.384 3.408c.535.276 1.22 1.152 1.556 1.963a8 8 0 0 1 .503 3.897l-.009.077-.026.224A7.758 7.758 0 0 1 .006 8.257v-.04q.025-.545.114-1.082c.01-.074.075-.42.09-.489l.01-.051a6.6 6.6 0 0 1 1.041-2.35q.327-.465.725-.87.35-.358.758-.65a1.5 1.5 0 0 1 .26-.137c-.018.268-.04 1.553.268 1.943h.003a5.7 5.7 0 0 1 1.868-1.443 3.6 3.6 0 0 0 .021 1.896q.105.07.2.152c.107.09.226.207.454.433l.068.066.009.009a2 2 0 0 0 .213.18c.383.287.943.563 1.306.741.201.1.342.168.359.193l.004.008c-.012.193-.695.858-.933.858-2.206 0-2.564 1.335-2.564 1.335.087.997.714 1.839 1.517 2.357a4 4 0 0 0 .439.241q.114.05.228.094c.325.115.665.18 1.01.194 3.043.143 4.155-2.804 3.129-4.745v-.001a3 3 0 0 0-.731-.9 3 3 0 0 0-.571-.37l-.003-.002a2.68 2.68 0 0 1 1.87.454 3.92 3.92 0 0 0-3.396-1.983q-.116.001-.23.01l-.042.003V4.31h-.002a4 4 0 0 0-.8.14 7 7 0 0 0-.333-.314 2 2 0 0 0-.2-.152 4 4 0 0 1-.088-.383 5 5 0 0 1 1.352-.289l.05-.003c.052-.004.125-.01.205-.012C7.996 2.212 8.733.843 10.17.002l-.003.005.003-.001.002-.002h.002l.002-.002h.015a.02.02 0 0 1 .012.007 2.4 2.4 0 0 0 .206.48q.09.153.183.297c.49.774 1.023 1.379 1.543 1.968.771.874 1.512 1.715 2.036 3.02l-.001-.013a8 8 0 0 0-.786-2.353"/> </svg> Website</h6>
                                <a href={{$u_data->profile->website}}><span class="text-secondary">{{$u_data->profile->website}}</span></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16"> <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/> </svg> X|Twitter</h6>
                                <a href={{$u_data->profile->twitter}}><span class="text-secondary">{{$u_data->profile->twitter}}</span></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                <a href={{$u_data->profile->instagram}}><span class="text-secondary">{{$u_data->profile->instagram}}</span></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-telegram text-primary" viewBox="0 0 16 16"> <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906q-1.168.486-4.666 2.01-.567.225-.595.442c-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294q.39.01.868-.32 3.269-2.206 3.374-2.23c.05-.012.12-.026.166.016s.042.12.037.141c-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8 8 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629q.14.092.27.187c.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.4 1.4 0 0 0-.013-.315.34.34 0 0 0-.114-.217.53.53 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09"/> </svg> Telegram</h6>
                                <a href={{$u_data->profile->telegram}}><span class="text-secondary">{{$u_data->profile->telegram}}</span></a>
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
                <div class="album col-lg-8" style="background-color: rgba(22, 24, 22, 0.88); border-radius:7px">
                    <div class="container" >
                        <div style="width:100%;margin-top: 5px;margin-bottom:5px" class=" d-flex  justify-content-center align-items-center" data-bs-theme="dark">
                            <input type="text" class="form-control" style="text-align:center" @if(Auth::user()->id==$u_data->id) value="فیلم های مورد علاقه شما" @else value="فیلم های مورد علاقه {{$u_data->name}}" @endif readonly>
                        </div>
                      <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-3">
                        @if($m_data->toArray()!= "")
                        @foreach ($m_data as $key => $value)
                        <div class="col">
                            <div class="card shadow-sm bg-dark">
                             {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">--}}
                                  <img src={{$value->Poster}} alt="Movie" class="bd-placeholder-img card-img-top" width="100%" height="280" >
                                <title>{{$value->Title}} </title>
                                <rect width="100%" height="100%" fill="#55595c"/></svg>
                              <div class="card-body">
                                <div class="text-center text-light" dir="ltr">
                                  <h4 class="">  <a class="nav-link" href="movie?id={{$value->id}}"> @if (strlen($value->Title)>17){{substr($value->Title,0,17)."..."}}</title>@else{{$value->Title}}</title>@endif</a></h4>
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
                        @endif
                      </div>
                      {{$m_data->appends(['id' => $u_data->id])->links('vendor.pagination.bootstrap-5')}}
                    </div>
                  </div>
            </div>

    </div>
</div>

@endsection
