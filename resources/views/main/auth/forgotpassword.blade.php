@extends('templates.auth')

@section('main')

<div id="app">
    <section class="section">
      <div class="container mt-2">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <i class="fa fa-5x fa-laptop-code text-primary"></i>
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Forgot Password</h4></div>

              <div class="card-body">
                  <div id="Alert"></div>
                <p class="text-muted">We will send a link to reset your password</p>
                <form id="forgotPassword">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required="" autofocus="">
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Forgot Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright © ITClub 2021
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
