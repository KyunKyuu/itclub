@extends('templates.home')
@include('include.home.navbar_biru')
@section('main')

 <section class="body-alumni">
            <div class="alumni p-5">
                <div class="container text-center">
                    <h2>Alumni IT CLUB<span><img src="{{asset('home_page')}}/img/icon_titik.png" class="mb-1 ml-3"></span></h2>
                    <div class="row mt-3">
                        <div class="col-md-6 mt-4">
                            <img src="{{asset('home_page')}}/img/Maulana_Yusuf.jpg" alt="" class="w-100 judul-2">
                        </div>
                        <div class="col-md-6 mt-4">
                            <img src="{{asset('home_page')}}/img/Rival_Swandy.jpg" alt="" class="w-100 judul-2">
                        </div>
                        <div class="col-md-6 mt-4">
                            <img src="{{asset('home_page')}}/img/Riezkan_Aprianda.jpg" alt="" class="w-100 judul-2">
                        </div>
                        <div class="col-md-6 mt-4">
                            <img src="{{asset('home_page')}}/img/Fajri_Zulfa.jpg" alt="" class="w-100 judul-2">
                        </div>
                        <div class="col-md-6 mt-4">
                            <img src="{{asset('home_page')}}/img/Rifki_Aria.jpg" alt="" class="w-100 judul-2">
                        </div>
                        <div class="col-md-6 mt-4">
                            <img src="{{asset('home_page')}}/img/Hasan_Basri.jpg" alt="" class="w-100 judul-2">
                        </div>
                        <div class="col-md-6 mt-4">
                            <img src="{{asset('home_page')}}/img/Rafly.jpg" alt="" class="w-100 judul-2">
                        </div>
                        <div class="col-md-6 mt-4">
                            <img src="{{asset('home_page')}}/img/Adi_Sani.jpg" alt="" class="w-100 judul-2">
                        </div>
                    </div>
                </div>
            </div>
    
            <nav aria-label="Page navigation example" class="nav-pagination">
                <ul class="pagination pb-5 mb-0">
                  <li class="page-item ml-auto">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item mr-auto">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
          </section>

@endsection