@extends('templates.resource')

@section('main')

<div class="section-body">
    <h2 class="section-title">Change Password</h2>
    <p class="section-lead">
      Remember older password and new password.
    </p>

    <div class="row">

        <div class="card card-primary col-12">
            <div class="card-header justify-content-center text-primary pt-3"><h2>Users Password</h2></div>
            <div class="card-body col-6 mx-auto">
              <form method="POST">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input value="{{auth()->user()->email}}" disabled type="email" class="form-control" name="email" tabindex="1">
                </div>


                <div class="form-group">
                    <label for="password">Older Password</label>
                    <div class="input-group mb-3">
                      <input id="oldPassword" type="password" class="form-control" name="password">
                      <div class="input-group-append">
                        <button class="btn btn-primary" id="seeOldPassword" type="button"><i class="fas fa-eye-slash"></i></button>
                      </div>
                    </div>
                  </div>

                <div class="form-group">
                  <label for="password">New Password</label>
                  <div class="input-group mb-3">
                    <input id="newPassword" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                    <div class="input-group-append">
                      <button class="btn btn-primary" id="seeNewPassword" type="button"><i class="fas fa-eye-slash"></i></button>
                    </div>
                  </div>
                  <div id="pwindicator" class="pwindicator">
                    <div class="bar"></div>
                    <div class="label"></div>
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
  </div>

@endsection
