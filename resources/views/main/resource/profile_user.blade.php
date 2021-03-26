@extends('templates.resource')

@section('main')

      <div class="section-body">
            <h2 class="text-capitalize section-title " id="IDCARD" data-id="{{request()->segment(2)}}">Hi, {{auth()->user()->name}}!</h2>

        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
              <div class="profile-widget-header">
                  <div id="image-profile">
                    <img alt="image" src="/public_file/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                </div>
                <div class="profile-widget-items">
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Posts</div>
                    <div class="profile-widget-item-value">-</div>
                  </div>
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Comments</div>
                    <div class="profile-widget-item-value">-</div>
                  </div>
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Point</div>
                    <div class="profile-widget-item-value">-</div>
                  </div>
                </div>
              </div>
              <div class="profile-widget-description">
                <div class="profile-widget-name"> <a id="name-profile">-</a> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> <a id="status-profile">-</a> </div></div>
                <div id="deskripsi-profile">No deskripsi</div>
              </div>
              <div class="card-footer text-center" style="margin-top: -20px;">
                <div class="font-weight-bold mb-2 text-capitalize">Follow {{request()->segment(2)}} On</div>
                <div id="social-media-card">

                </div>
              </div>
            </div>
          </div>


          <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
              <form id="insert-profile" class="needs-validation" novalidate="" >
                <div class="card-header">
                  <h4>Edit Profile</h4>
                  <div class="text-left ml-auto">
                    <a href="#" class="btn btn-primary btn-lg">
                        <i class="fas fa-laptop-code"></i> Upgrade to Member
                    </a>
                </div>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label>First Name</label>
                        <input type="text" class="form-control" value="{{$data['profile']->first_name}}" required="" name="first_name" placeholder="First Name">
                        <div class="invalid-feedback">
                          Please fill in the first name
                        </div>
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <label>Last Name</label>
                        <input type="text" class="form-control" required="" name="last_name"  value="{{$data['profile']->last_name}}"  placeholder="Last Name">
                        <div class="invalid-feedback">
                          Please fill in the last name
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label>Status</label>
                        <input type="text" class="form-control" name="status" required="" placeholder="Pelajar"  value="{{$data['profile']->status}}" >
                        <div class="invalid-feedback">
                          Please fill in the status
                        </div>
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <label>Phone</label>
                        <input type="number" class="form-control" name="telepon"  value="{{$data['profile']->telepon}}" placeholder="Number Phone">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label>Thumbnail</label>
                        <input type="file" class="form-control image-input-preview"  value="" name="image" placeholder="Pelajar" data-id="img-thumbnail">
                      </div>
                      <div class="form-group col-md-6 col-12">
                          <img src="/public_file/assets/img/news/img08.jpg" id="img-thumbnail" alt="" class="img-fluid" style="max-width: 150px"><br>
                          <a id="hapusGambarProfile" href="#">Hapus Gambar</a>
                    </div>
                </div>
                    <div class="row">
                      <div class="form-group col-12">
                        <label>Bio</label>
                        <textarea class="form-control use-ckeditor" placeholder="hahaha">
                            {{$data['profile']->bio}}
                        </textarea>
                        <input type="hidden" name="bio" data-editor="ckeditor" value="{{$data['profile']->bio}}">
                      </div>
                    </div>
                    <div class="row text-center mb-3">
                        <a class="d-block mx-auto text-capitalize" id="advancedProfile" style="cursor: pointer;">advanced profile</a>
                    </div>
                    <hr>
                    <div id="social-media" class="d-none">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                          <label>Display Name</label>
                          <input type="text" class="form-control"  value="{{$data['profile']->facebook_name}}" name="facebook_name" placeholder="Input your nickname here">
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Facebook Url</label>
                          <input type="text" class="form-control" name="facebook_url"  value="{{$data['profile']->facebook_url}}" placeholder="Input your url facebook here">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Display Name</label>
                          <input type="text" class="form-control"  value="{{$data['profile']->instagram_name}}" name="instagram_name" placeholder="Input your nickname here">
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label>Instagram Url</label>
                          <input type="text" class="form-control" name="instagram_url"  value="{{$data['profile']->instagram_url}}" placeholder="Input your url instagram here">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Display Name</label>
                          <input type="text" class="form-control"  value="{{$data['profile']->linkedin_name}}" name="linkedin_name" placeholder="Input your nickname here">
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label>LinkedIn Url</label>
                          <input type="text" class="form-control" name="linkedin_url"  value="{{$data['profile']->linkedin_url}}" placeholder="Input your url LinkedIn here">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <label>Display Name</label>
                          <input type="text" class="form-control"  value="{{$data['profile']->twitter_name}}" name="twitter_name" placeholder="Input your nickname here">
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label>Twitter Url</label>
                          <input type="text" class="form-control" name="twitter_url"  value="{{$data['profile']->twitter_url}}" placeholder="Input your url Twitter here">
                        </div>
                    </div>
                </div>
            </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
