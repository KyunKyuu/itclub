@extends('error.template.page_exception')

@section('main')
<div id="app">
    <section class="section">
      <div class="container text-center">
                <img class="img-fluid" src="/public_file/assets/img/drawkit/drawkit-full-stack-man-colour.svg" alt="image" width="300">
                <h2 style="font-size: 60px">300</h2>
                    <p class="lead">
                      We were unable to reach the server, it seemed like it was sleeping, so we were reluctant to wake it up.
                    </p>
                    @if (auth())
                        <a href="#" class="btn btn-info mt-4"><i class="fas fa-home"></i> Back to Dashboard</a>
                    @else
                        <a href="#" class="btn btn-info mt-4"><i class="fas fa-home"></i> Back to Home</a>
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
