@extends('templates.home')
@include('include.home.navbar_biru')
@section('main')
 <div class="p-5">
            <div class="container text-center">
                <div class="row mt-3 mb-5 pb-5">
                    <div class="col col-sm-12">
                        <div class="text-center">
                            <img src="{{asset('home_page')}}/img/img_elearning.jpg" class="img-elearning">
                            <h2 class="mt-2"><b>Maaf, halaman sedang diperbaiki!</b></h2>
                            <p>Untuk sementara layanan Elearning kita tutup dulu karena <br> sedang dalam perbaikan oleh team Progammer</p>
                            <a href="{{route('home')}}" class="btn btn-1 py-1">Kembali ke Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('footer')
@include('include.home.footer_putih')
@endsection