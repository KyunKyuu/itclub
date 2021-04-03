@extends('templates.home')
@include('include.home.navbar_biru')
@section('main')


          <div class="berita-kegiatan p-5">
              <div class="container">
                  <h2 class="mb-3">Berita Kegiatan <span><img src="{{asset('home_page')}}/img/icon_titik.png" class="mb-1"></span> </h2>

              @foreach($articlies as $article)
                <div class="row ml-0 border-2 mb-3 slide">
                    <div class="col-md-4 px-0">
                        <img src="{{$article->thumbnail()}}" class="w-100">
                    </div>
                    <div class="col-md-8 my-auto p-4">
                    <h4>{{$article->title}}</h4>
                    <p class="tanggal mb-1">{{$article->created_at}}</p>
                    <p style="word-wrap: break-word;">{!! \Str::limit($article->content, 348, '..') !!}</p>
                    <a href="{{route('article_detail',$article->slug)}}" class="btn btn-shadow">Lihat Selengkapnya</a>
                    </div>
                </div>
              @endforeach
              
                </div>
              </div>
          </div>

          <nav aria-label="Page navigation example">
            <ul class="pagination mb-5">
              <li class="page-item ml-auto page-link">
               
               {{$articlies->links()}}
               
              </li>
            </ul>
          </nav>

@endsection