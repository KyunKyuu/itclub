@extends('templates.dashboard')


@section('main')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Data Registration Member</h4>
                    <div class="ml-auto">
                        {{-- <a href="#" class="btn btn-primary rounded" data-target="#insertMember" data-toggle="modal"><i
                                class="fas fa-plus"></i> Tambah</a>
                        <a href="#" class="btn btn-danger rounded"><i class="far fa-trash-alt"></i> Hapus</a> --}}
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th width="10px">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                                class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th width="70px">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 ">
            <div class="card author-box card-primary">
                <div class="card-header">
                    <div class="author-box-name">
                        <a href="#">Hasan Basri</a>
                    </div>
                    <div class="ml-auto mt-sm-0 mt-3 ">
                        <a href="#" class=" badge badge-danger">Close <i class="fas fa-times"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="author-box-left">
                        <img alt="image" src="/public_file/assets/img/avatar/avatar-1.png"
                            class="rounded-circle author-box-picture">
                        <div class="clearfix"></div>
                        <a href="#" class="btn btn-primary mt-3 follow-btn" data-follow-action="alert('follow clicked');"
                            data-unfollow-action="alert('unfollow clicked');">Follow</a>
                    </div>
                    <div class="author-box-details">
                        <div class="author-box-job">Web Developer</div>
                        <div class="author-box-description">
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
