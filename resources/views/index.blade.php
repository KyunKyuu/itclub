@extends('templates.home')
@include('include.home.navbar_putih')
@section('main')

      <div class="hero">
          <div class="container">
            <div class="hero-text w-50 pl-2">
                <div class="text slide">
                    <img src="{{asset('home_page/img/hero_mini.png')}}" class="hero-mini w-100">
                    <h1>Mengapa Harus Masuk <br> <span class="fw-700">Ekskul IT Club?</span></h1>
                    <hr class="hr-header w-25">
                    <p>
                        Karena IT Club adalah salah satu ekstrakurikuler <br>
                        yang ada di SMK Negeri 5 Bandung yang <br> 
                        bergerak di bidang IT dan Informasi
                    </p>
                    <a href="{{route('login')}}" class="btn btn-shadow">Register Now</a>
                </div>
              </div>
          </div>
      </div>

      <div class="tentang-kami mt-5">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <img src="{{asset('home_page/img/img_tentang.png')}}" class="w-100">
                  </div>
                  <div class="col-md-6 my-auto">
                      <h2 class="judul-2">Tentang Kami <span><img src="{{asset('home_page/img/icon_titik.png')}}" class="mx-3 mb-1"></span> <br> <b>Ekstrakurikuler IT Club ?</b></h2>
                      <p class="judul-2">IT Club adalah salah satu Ekstrakurikuler yang ada di SMKN 5 Bandung yang bergerak di bidang IT, kami memiliki 4 Divisi diantaranya ada Networking, Multimedia, Programming dan Internet of Things.</p>
                      <a href="{{route('tentang')}}" class="btn btn-shadow judul-2">Lihat Selengkapnya</a>
                  </div>
              </div>
          </div>
      </div>

      <div class="mentor p-5">
          <div class="container text-center">
              <h2 class="slide"><b>Our Mentor</b></h2>
              <hr class="orange mx-auto">
              <div class="row p-4">
                  <div class="col-md-4 down-delay-1">
                    <img src="{{asset('home_page/img/herdian.jpg')}}" class="mb-3">
                    <h5 class="mb-0">Herdian Nuryansyah</h5>
                    <p>Divisi Networking</p>
                  </div>
                  <div class="col-md-4 down-delay-2">
                    <img src="{{asset('home_page/img/riezkan.jpg')}}" class="mb-3">
                    <h5 class="mb-0">Riezkan Aprianda F.</h5>
                    <p>Divisi Programming</p>
                  </div>
                  <div class="col-md-4 down-delay-3">
                    <img src="{{asset('home_page/img/pebi.jpg')}}" class="mb-3">
                    <h5 class="mb-0">Pebi Ferdiantoro</h5>
                    <p>Divisi Multimedia</p>
                  </div>
              </div>
          </div>
      </div>

      <div class="prestasi">
          <img src="{{asset('home_page/img/background_prestasi.jpg')}}" class="position-absolute bg-prestasi w-100">
          <div class="container">
            <div class="text-prestasi text-center">
                <h2 class="text-white slide">Prestasi IT Club</h2>
                <p class="text-white mb-0 slide">Berikut adalah prestasi yang <br> di peroleh IT Club</p>
                <hr class="orange mx-auto mt-1">

                <div class="owl-carousel owl-theme owl-loaded">
                    <div class="owl-nav">
                        <div class="customPrevBtn btn text-white bg-transparent"><i class="fas fa-chevron-left"></i></div>
                        <div class="customNextBtn btn text-white bg-transparent"><i class="fas fa-chevron-right"></i></div>
                    </div>
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                             @foreach($prestations as $prestation)
                            <div class="owl-item px-2 m-auto">
                              <img  src="{{$prestation->image()}}" class="w-100">
                                 <div class="card">
                                     <div class="card-body text-left">
                                         <h5><b><a href="#" class="text-decoration-none">{{$prestation->name}}</a></b></h5>
                                         <p style="word-wrap: break-word;">{!! \Str::limit($prestation->content, 108, '..') !!}</p>
                                     </div>
                                 </div>
                            </div>
                            @endforeach
  
                        </div>
                    </div>
                </div>
                
            </div>
          </div>
      </div>

      <div class="divisi-itclub p-5">
          <div class="container text-center">
            <h2 class="slide"><b>Divisi IT Club</b></h2>
            <hr class="orange mt-2 mx-auto">
            <div class="row mt-5">
               @foreach($divisions as $division)
                <div class="col-md-4 zoomin my-2">
                    <img src="{{$division->image()}}" alt="Logo Divisi" class="w-50 mb-2">
                    <h4 class="mb-1">{{$division->name}}</h4>
                    <a href="{{route('division', $division->slug)}}" class="text-black-50 text-decoration-none">Baca Selengkapnya</a>
                </div>
                @endforeach
            </div>
          </div>
      </div>

      <div class="berita pt-5 px-5 pb-3">
          <div class="container pt-3 text-center">
              <h2 class="slide"><b>Berita Kegiatan</b></h2>
              <hr class="orange mt-2 mx-auto">
              <div class="row text-left mt-md-5">
              @foreach($articlies as $article)
                  <div class="col-md-4 down">
                      <img src="{{$article->thumbnail()}}" alt="Webinar" class="w-100">
                      <div class="card">
                          <div class="card-body">
                            <h5 class="mb-1"><b>{{$article->title}}</b></h5>
                            <p class="tanggal mb-3">{{$article->created_at}}</p>
                           <p style="word-wrap: break-word;">{!! \Str::limit($article->content, 160, '..') !!}</p>
                             <a href="{{route('article_detail',$article->slug)}}" class="btn btn-shadow">Lihat Selengkapnya</a>
                          </div>
                      </div>
                  </div>
                 @endforeach
              
              </div>
              <h4 class="mt-4 down"><a href="{{route('article')}}" class="active">Read More...</a></h4>
          </div>
      </div>

      <div class="contact-index p-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('home_page/img/img_contact.png')}}" class="w-100">
                </div>
                <div class="col-md-6 pr-5">
                    <div class="contact-text mt-3 pr-3 judul-2">
                        <h2>Beritahu Kami Jika Ada Masalah</h2>
                        <p>
                            Kami akan memberikan pelayanan terbaik untuk anggota Ekskull IT Club Jika ada yang ingin 
                            berkolaborasi dan mengisi Seminar atau Webinar di IT Club, kami dengan senang hati 
                            akan menerimanya. Oleh karena itu bisa menghubungi kami.
                        </p>
                    </div>
                    <div class="contact-address mt-5 judul-2">
                        <h3>Contact Us <span><img src="{{asset('home_page/img/icon_titik.png')}}" class="mb-1"></span></h3>
                        <div class="d-flex mt-4">
                            <img src="{{asset('home_page/img/ic_wa.png')}}" class="icon mr-3">
                            <h5 class="my-auto">088802335851</h5>
                        </div>
                        <div class="d-flex mt-4">
                            <img src="{{asset('home_page/img/ic_mail.png')}}" class="icon mr-3">
                            <h5 class="my-auto">itclubsmk5bdg@gmail.com</h5>
                        </div>
                        <div class="d-flex mt-4">
                            <img src="{{asset('home_page/img/ic_location.png')}}" class="icon mr-3">
                            <h6 class="my-auto">Jln.Bojongkoneng 37A, Sukapada, Kec.Cibeunying Kidul, Kota Bandung, Jawa Barat 40191</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

     
@endsection