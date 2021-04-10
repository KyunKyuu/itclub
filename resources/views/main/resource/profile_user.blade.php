@extends('templates.resource')

@section('main')

    <div class="section-body">
        <h2 class="text-capitalize section-title " id="IDCARD" data-id="{{ request()->segment(2) }}">Hi,
            {{ auth()->user()->name }}!</h2>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <div id="image-profile">
                            <img alt="image" src="/public_file/assets/img/avatar/avatar-1.png"
                                class="rounded-circle profile-widget-picture">
                        </div>
                        <div class="profile-widget-items">
                            @if ($data['user']->role_id < 5)
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Posts</div>
                                    <div class="profile-widget-item-value">-</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Comments</div>
                                    <div class="profile-widget-item-value">-</div>
                                </div>
                            @endif
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Role</div>
                                <div class="profile-widget-item-value text-muted">{{ $data['user']->roles->name }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name"> <a id="name-profile">-</a>
                            <div class="text-muted d-inline font-weight-normal">
                                <div class="slash"></div> <a id="status-profile">-</a>
                            </div>
                        </div>
                        <div id="deskripsi-profile">No deskripsi</div>
                    </div>
                    <div class="card-footer text-center" style="margin-top: -2nullpx;">
                        <div class="font-weight-bold mb-2 text-capitalize">Follow {{ request()->segment(2) }} On</div>
                        <div id="social-media-card">

                        </div>
                    </div>
                </div>
            </div>


            {{-- !ANCHOR USER PROFILE EDIT ONLY --}}
            @if (request()->segment(2) == auth()->user()->name)

                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form id="insert-profile" class="needs-validation" novalidate="">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                                <div class="text-left ml-auto">
                                    @if (auth()->user()->role_id > 4)
                                        <a href="#" class="btn btn-primary btn-lg">
                                            <i class="fas fa-laptop-code"></i> Upgrade to Member
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>First Name</label>
                                        @if ($data['profile'] != null)
                                            <input type="text" class="form-control"
                                                value="{{ $data['profile']->first_name }}" required="" name="first_name"
                                                placeholder="First Name">
                                        @else
                                            <input type="text" class="form-control" value="" required="" name="first_name"
                                                placeholder="First Name">
                                        @endif
                                        <div class="invalid-feedback">
                                            Please fill in the first name
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Last Name</label>
                                        @if ($data['profile'] != null)
                                            <input type="text" class="form-control" required="" name="last_name"
                                                value="{{ $data['profile']->last_name }}" placeholder="Last Name">
                                        @else
                                            <input type="text" class="form-control" required="" name="last_name" value=""
                                                placeholder="Last Name">
                                        @endif
                                        <div class="invalid-feedback">
                                            Please fill in the last name
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Status</label>
                                        @if ($data['profile'] != null)
                                            <input type="text" class="form-control" name="status" required=""
                                                placeholder="Pelajar" value="{{ $data['profile']->status }}">
                                        @else
                                            <input type="text" class="form-control" name="status" required=""
                                                placeholder="Pelajar" value="">
                                        @endif
                                        <div class="invalid-feedback">
                                            Please fill in the status
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Phone</label>
                                        @if ($data['profile'] != null)
                                            <input type="number" class="form-control" name="telepon"
                                                value="{{ $data['profile']->telepon }}" placeholder="Number Phone">
                                        @else
                                            <input type="number" class="form-control" name="telepon" value=""
                                                placeholder="Number Phone">
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Thumbnail</label>
                                        <input type="file" class="form-control image-input-preview" value="" name="image"
                                            placeholder="Pelajar" data-id="img-thumbnail">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <img src="/public_file/assets/img/news/imgnull8.jpg" id="img-thumbnail" alt=""
                                            class="img-fluid" style="max-width: 15nullpx"><br>
                                        <a id="hapusGambarProfile" href="#">Hapus Gambar</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Bio</label>
                                        @if ($data['profile'] != null)
                                            <textarea class="form-control use-ckeditor"
                                                placeholder="hahaha">{{ $data['profile']->bio }}</textarea>
                                        @else
                                            <textarea class="form-control use-ckeditor" placeholder="hahaha"></textarea>
                                        @endif
                                        @if ($data['profile'] != null)
                                            <input type="hidden" name="bio" data-editor="ckeditor"
                                                value="{{ $data['profile']->bio }}">
                                        @else
                                            <input type="hidden" name="bio" data-editor="ckeditor" value="">
                                        @endif
                                    </div>
                                </div>
                                <div class="row text-center mb-3">
                                    <a class="d-block mx-auto text-capitalize" id="advancedProfile"
                                        style="cursor: pointer;">advanced profile</a>
                                </div>
                                <hr>
                                <div id="social-media" class="d-none">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Display Name</label>
                                            @if ($data['profile'] != null)
                                                <input type="text" class="form-control"
                                                    value="{{ $data['profile']->facebook_name }}" name="facebook_name"
                                                    placeholder="Input your nickname here">
                                            @else
                                                <input type="text" class="form-control" value="" name="facebook_name"
                                                    placeholder="Input your nickname here">
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Facebook Url</label>
                                            @if ($data['profile'] != null)
                                                <input type="text" class="form-control" name="facebook_url"
                                                    value="{{ $data['profile']->facebook_url }}"
                                                    placeholder="Input your url facebook here">
                                            @else
                                                <input type="text" class="form-control" name="facebook_url" value=""
                                                    placeholder="Input your url facebook here">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Display Name</label>
                                            @if ($data['profile'] != null)
                                                <input type="text" class="form-control"
                                                    value="{{ $data['profile']->instagram_name }}" name="instagram_name"
                                                    placeholder="Input your nickname here">
                                            @else
                                                <input type="text" class="form-control" value="" name="instagram_name"
                                                    placeholder="Input your nickname here">
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            @if ($data['profile'] != null)
                                                <label>Instagram Url</label>
                                                <input type="text" class="form-control" name="instagram_url"
                                                    value="{{ $data['profile']->instagram_url }}"
                                                    placeholder="Input your url instagram here">
                                            @else
                                                <label>Instagram Url</label>
                                                <input type="text" class="form-control" name="instagram_url" value=""
                                                    placeholder="Input your url instagram here">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Display Name</label>
                                            @if ($data['profile'] != null)
                                                <input type="text" class="form-control"
                                                    value="{{ $data['profile']->linkedin_name }}" name="linkedin_name"
                                                    placeholder="Input your nickname here">
                                            @else
                                                <input type="text" class="form-control" value="" name="linkedin_name"
                                                    placeholder="Input your nickname here">
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>LinkedIn Url</label>
                                            @if ($data['profile'] != null)
                                                <input type="text" class="form-control" name="linkedin_url"
                                                    value="{{ $data['profile']->linkedin_url }}"
                                                    placeholder="Input your url LinkedIn here">
                                            @else
                                                <input type="text" class="form-control" name="linkedin_url" value=""
                                                    placeholder="Input your url LinkedIn here">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Display Name</label>
                                            @if ($data['profile'] != null)
                                                <input type="text" class="form-control"
                                                    value="{{ $data['profile']->twitter_name }}" name="twitter_name"
                                                    placeholder="Input your nickname here">
                                            @else
                                                <input type="text" class="form-control" value="" name="twitter_name"
                                                    placeholder="Input your nickname here">
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Twitter Url</label>
                                            @if ($data['profile'] != null)
                                                <input type="text" class="form-control" name="twitter_url"
                                                    value="{{ $data['profile']->twitter_url }}"
                                                    placeholder="Input your url Twitter here">
                                            @else
                                                <input type="text" class="form-control" name="twitter_url" value=""
                                                    placeholder="Input your url Twitter here">
                                            @endif
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

            @endif

        </div>
    </div>
    </section>
    </div>

@endsection
