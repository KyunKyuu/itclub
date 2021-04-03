@extends('templates.home')
@include('include.home.navbar_biru')
@section('main')

 <section>
            <div class="container mt-4">
                <p>Berita Kegiatan<span class="mx-3">    /     </span><b>Details</b></p>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-berita mb-5 px-3 py-3">
    
                                <h1 class="judul-2">{{$article->title}}<span><img src="{{asset('home_page')}}/img/icon_titik.png" class="m-2 icon-titik"></span></h1>
                                <p class="mt-0 text-black-50 judul-2">{{$article->created_at}}</p>
                                <img src="{{$article->thumbnail()}}" class="judul-1">
    
                                <p class="description mt-4 slide">
                                    {!!$article->content!!}
                                </p>
                            
                        </div>
                    </div>
    
                    <div class="col-lg-4 col-sm-3">
                        <div class="card card-berita card-right p-2 pr-0">
                            <h5 class="text-center mb-3">Berita Kegiatan Terbaru</h5>
                            <div class="row col-sm-12">
                                @foreach($articlies as $data)
                                <div class="col d-flex kegiatan pb-2">
                                    <img src="{{$data->thumbnail()}}" alt="">
                                    <div class="judul-2">
                                        <h6>{{$data->title}}</h6>
                                        <p class="kegiatan-item text-black-50">{{$data->created_at}}</p>

                                        <p class="kegiatan-item-2 style="word-wrap: break-word;">{!! \Str::limit($article->content, 73, '..') !!}</p>
                                    </div>
                                </div>
                               @endforeach
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </section>

@endsection