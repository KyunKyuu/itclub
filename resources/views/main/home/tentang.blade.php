 @extends('templates.home')
@section('navbar')
@include('include.home.navbar_biru')
@endsection
@section('main')

<div class="container">
          <div class="tentang mt-5 pt-5 mb-5 pb-5">
                <div class="row">
                    <div class="col col-sm-6 col-md-6 img-1">
                        <img src="{{asset('home_page/img/img_tentang_2.png')}}" class="img-tentang">
                    </div>

                    <div class="col col-sm-6">
                        <div class="judul-tentang">
                            <h2>Tentang Kami<span><img  src="{{asset('home_page//img/icon_titik.png')}}" class="mx-3 mb-1 w-2"></span></h2>
                            <h2><b>Kami Ekstrakurikuler IT Club</b></h2>
                        </div>
                        <p class="deskripsi-tentang">
                            IT Club adalah salah satu Ekstrakurikuler yang ada di SMKN 5 Bandung. Sebagai Ekstrakurikuler, artinya IT Club ini merupakan suatu wadah untuk mengembangkan kepribadian, bakat, dan kemampuannya di bidang information and Technology. Pengembangan kemampuan di IT Club itu sendiri dibagi kedalam beberapa bagian, ada Multimedia, Programming dan Networking.
                        </p>

                        <div class="divisi-item">
                            <div class="row text-center divisi-tentang">

                                 @foreach($divisions as $division) 
                                <div class="col col-sm-3 item-1">
                                    <img src="{{$division->image()}}">
                                    <h5 class="mt-3 mb-0">{{$division->name}}</h5>
                                    <a href="{{route('division', $division->slug)}}" class="text-black-50">Baca Selengkapnya</a>
                                </div>
                               @endforeach
                            </div>
                        </div>
                    </div>
                </div>
          </div>
      </div>

@endsection

@section('footer')
@include('include.home.footer_putih')
@endsection