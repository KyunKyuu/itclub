@extends('templates.home')
@include('include.home.navbar_biru')
@section('main')
  <div class="galery-kegiatan p-5">
                <div class="container">
                    <nav aria-label="breadcrumb" class="breadcrumb-galery">
                        <ol class="breadcrumb bg-transparent mb-0">
                          <li class="breadcrumb-item"><a href="{{route('gallery')}}" class="text-decoration-none text-black-50 fw-normal">Galeri Kegiatan</a></li>
                          <li class="breadcrumb-item active" aria-current="page"> <p class="fw-bold">Details</p> </li>
                        </ol>
                      </nav>
                    <div class="galery-item mb-5">
                        <div class="row">
                           @foreach($imageGallery as $images)
                            <div class="col-md-4 mt-4 down">
                                 <img src="{{$images->image()}}">
                            </div>
                          @endforeach
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('footer')
@include('include.home.footer_putih')
@endsection