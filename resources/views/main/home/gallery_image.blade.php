@extends('templates.home')
@include('include.home.navbar_biru')
@section('main')
<div class="galery-kegiatan p-5">
                <div class="container">
                    <p>Berita Kegiatan<span class="mx-3">    /     </span><b>{{$gallery->name}}</b></p>
                    <div class="galery-item mb-5">
                        <div class="row">
                            @foreach($imageGallery as $image)
                            <div class="col-md-4 mt-4 down">
                                <img src="{{$image->image()}}">
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
@endsection