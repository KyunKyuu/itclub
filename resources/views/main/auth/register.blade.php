@extends('templates.auth')

@section('main')
<body>
    <div id="app">
    <section class="section">
      <div class="container mt-5">
          <div class="row">
              <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">

                  <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>


              <div class="card-body">
                  <div id="message"></div>
                  <form method="POST" id="register">
                      <div class="row">
                    <div class="form-group col-6">
                        <label for="first_name">Username</label>
                        <input id="first_name" type="text" class="form-control" name="name" autofocus>
                    </div>
                    <div class="form-group col-6">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>

                  <div class="row">
                      <div class="form-group col-6">
                          <label for="password" class="d-block">Password</label>
                          <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                            <div class="input-group-append">
                              <button class="btn btn-primary" id="seePassword" type="button"><i class="fas fa-eye-slash"></i></button>
                            </div>
                          </div>
                          <div id="pwindicator" class="pwindicator">
                              <div class="bar"></div>
                        <div class="label"></div>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="password2" class="d-block">Password Confirmation</label>
                    <input id="password2" type="password" class="form-control">
                    </div>
                </div>


                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
                <div class="text-center">
                    Do you have account <a href="/auth/login">Login</a>
                </div>
            </div>
            </div>

            <div class="simple-footer">
                Copyright &copy; Stisla 2018
            </div>
        </div>
    </div>
</div>
</section>
</div>

    @endsection
