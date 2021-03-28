@extends('error.template.page_exception')

@section('main')
<div id="app">
    <section class="section">
      <div class="container text-center mt-3">
                <img class="img-fluid" src="/private_file/assets/img/error/{{$data->thumbnail}}" alt="image" width="300">
                <h2 class="title-error">{{$data->title}}</h2>
                    <p class="lead">
                      {{$data->description}}
                    </p>
                    @if (auth()->user())
                        <a href="/dashboard/general/index" class="btn btn-info mt-4"><i class="fas fa-home"></i> Back to Dashboard</a>
                    @else
                        <a href="/auth/login" class="btn btn-info mt-4"><i class="fas fa-home"></i> Back to Login</a>
                    @endif
            <div class="mt-3">
                  <a href="#" class="mt-4 bb">Need Help?</a>
                {{-- <a href="index.html">Back to Home</a> --}}
          </div>
        </div>
        <div class="simple-footer mt-5">
          Copyright &copy; ITClub
      </div>
    </section>
  </div>
@endsection
