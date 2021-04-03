@extends('templates.home')
@include('include.home.navbar_biru')
@section('main')

<div class="container">
          <div class="divisi mt-5 pt-5 mb-5 pb-5">
                <div class="row">
                    <div class="col col-sm-6 col-md-6 img-1 text-center">
                        <img src="{{$division->image()}}" class="zoomin">
                        <h4 class="mt-4" style="text-transform: uppercase;">{{$division->name}}</h4>
                        <div class="row text-center">
                           <div class="d-flex">
                               <img src="{{asset('home_page')}}/img/beginner.png" class="ml-auto down-delay-static-1">
                               <img src="{{asset('home_page')}}/img/intermediate.png" class="mx-3 down-delay-static-1">
                               <img src="{{asset('home_page')}}/img/expert.png" class="mr-auto down-delay-static-1">
                           </div>
                        </div>
                    </div>

                    <div class="col col-sm-6 col-md-6">
                        <h2>Divisi {{$division->name}}<span><img  src="{{asset('home_page/img/icon_titik.png')}}" class="mx-3 mb-1"></span></h2>
                        <p class="down-delay-1" style="word-wrap: break-word;">
                           {!! $division->content !!}
                        </p>

                        <div class="materi">
                            <div class="row">
                          @foreach($imageDivision as $image)
                            <div class="col col-md-2">
                                <img width="60" src="{{$image->image()}}" alt="materi divisi" >
                            </div>
                          @endforeach
                            </div>
                        </div>
                    </div>
                </div>
          </div>
      </div>

@endsection