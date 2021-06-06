@extends('templates.auth')
@section('title', 'Reset Password - IT CLUB')
@section('main')

<div id="app">
    <section class="section">
      <div class="container mt-2">
        <div class="row">
          <div class="col-sm-8 col-md-6 offset-sm-2 offset-md-3 mt-4">

            <div class="card card-primary">
              <div class="card-header"><h4>Reset Password</h4></div>

              <div class="card-body">
                  <div id="Alert"></div>
                <form id="resetPassword">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" disabled value="{{$_GET['email']}}" class="form-control" name="email" tabindex="1" required="" autofocus="">
                  </div>


                    <div class="form-group">
                        <label for="password" class="d-block">Password</label>
                        <div class="input-group mb-3">
                          <input id="password" type="password" autocomplete required class="form-control pwstrength" data-indicator="pwindicator" name="password">
                          <div class="input-group-append">
                            <button class="btn btn-primary" id="seePassword" type="button"><i class="fas fa-eye-slash"></i></button>
                          </div>
                        </div>
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                      <div class="label"></div>
                  </div>


                <div class="form-group">
                    <label for="password2" class="d-block">Password Confirmation</label>
                    <input id="password2" type="password" autocomplete required class="form-control">
                </div>


                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                    <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                  </div>
                </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Reset Password
                    </button>
                  </div>
                </form>
              </div>
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
