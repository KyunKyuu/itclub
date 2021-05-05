@extends('templates.home')
@include('include.home.navbar_biru')
@section('main')
 <div class="galery-kegiatan p-5">
                <div class="container">
                    <h1>Galeri Kegiatan <span><img src="{{asset('home_page/img/icon_titik.png')}}"></span></h1>
                    <div class="galery-item">
                        <div class="row">
                           @foreach($galleries as $gallery) 
                            <div class="col-md-4 mt-4 down">
                                <img src="{{$gallery->image()}}">
                                <p class="my-2">{{$gallery->name}}, {{$gallery->created_at}}</p>
                                <a href="{{route('image.gallery', $gallery->slug)}}" class="btn btn-1">Lihat Selengkapnya</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{$galleries->links()}}
                </div>
            </div>
@endsection

@section('footer')
@include('include.home.footer_putih')
@endsection