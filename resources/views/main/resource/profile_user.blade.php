@extends('templates.resource')

@section('main')

      <div class="section-body">
        <h2 class="section-title text-capitalize">Hi, {{auth()->user()->name}}!</h2>

        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
              <div class="profile-widget-header">
                <img alt="image" src="/public_file/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                <div class="profile-widget-items">
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Posts</div>
                    <div class="profile-widget-item-value">187</div>
                  </div>
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Followers</div>
                    <div class="profile-widget-item-value">6,8K</div>
                  </div>
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Following</div>
                    <div class="profile-widget-item-value">2,1K</div>
                  </div>
                </div>
              </div>
              <div class="profile-widget-description">
                <div class="profile-widget-name"> - <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> - </div></div>
                No deskripsi
              </div>
              <div class="card-footer text-center">
                <div class="font-weight-bold mb-2 text-capitalize">Follow {{request()->segment(1)}} On</div>
                <a href="#" class="btn btn-primary mr-1 d-block my-1">
                  <i class="fa-fw fab fa-facebook"></i> Facebook
                </a>
                <a href="#" class="btn btn-danger mr-1 d-block my-1">
                  <i class="fa-fw fab fa-instagram"></i> Instagram
                </a>
                <a href="#" class="btn btn-info mr-1 d-block my-1">
                  <i class="fa-fw fab fa-twitter"></i> Twitter
                </a>
                <a href="#" class="btn btn-primary mr-1 d-block my-1">
                  <i class="fa-fw fab fa-linkedin"></i> LinkedIn
                </a>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
              <form method="post" class="needs-validation" novalidate="">
                <div class="card-header">
                  <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label>First Name</label>
                        <input type="text" class="form-control" value="Ujang" required="">
                        <div class="invalid-feedback">
                          Please fill in the first name
                        </div>
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <label>Last Name</label>
                        <input type="text" class="form-control" value="Maman" required="">
                        <div class="invalid-feedback">
                          Please fill in the last name
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-7 col-12">
                        <label>Email</label>
                        <input type="email" class="form-control" value="ujang@maman.com" required="">
                        <div class="invalid-feedback">
                          Please fill in the email
                        </div>
                      </div>
                      <div class="form-group col-md-5 col-12">
                        <label>Phone</label>
                        <input type="tel" class="form-control" value="">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-12">
                        <label>Bio</label>
                        <textarea class="form-control summernote-simple">Ujang maman is a superhero name in &lt;b&gt;Indonesia&lt;/b&gt;, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with &lt;b&gt;'John Doe'&lt;/b&gt;.</textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group mb-0 col-12">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                          <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                          <div class="text-muted form-text">
                            You will get new information about products, offers and promotions
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
