@extends('templates.home')
@include('include.home.navbar_biru')
@section('main')

 <div class="body-divisi">
          <div class="container pt-3">
              <div class="divisi pt-5 pb-5">
                      <div class="row">
                          <div class="col col-sm-6 col-md-6 img-1 text-center">
                              <img src="{{$division->image()}}">
                              <h4 class="mt-4" style="text-transform: uppercase;">{{$division->name}}</h4>
                              <div class="row text-center">
                              <div class="d-flex">
                                  <img src="{{asset('home_page')}}/img/beginner.png" class="ml-auto">
                                  <img src="{{asset('home_page')}}/img/intermediate.png" class="mx-3">
                                  <img src="{{asset('home_page')}}/img/expert.png" class="mr-auto">
                              </div>
                              </div>
                          </div>
  
                          <div class="col col-sm-6 col-md-6">
                              <div class="judul">
                                  <h2>Divisi {{$division->name}}<span><img  src="{{asset('home_page/img/icon_titik.png')}}" class="mx-3 mb-1"></span></h2>
                              </div>
                              <p class="down-delay-1" style="word-wrap: break-word;">
                           {!! $division->content !!}
                        </p>
  
                              <div class="materi">
                                <div class="owl-carousel owl-theme owl-multimedia" id="divisi">
                                  @foreach($imageDivision as $images)
                                      <div class="item-owl p-3"><img src="{{$images->image()}}"></div>
                                  @endforeach
  
                                </div>
                                </div>
                            </div>
                          </div>
                      </div>
              </div>
          </div>
    

@endsection