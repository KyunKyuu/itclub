@extends('templates.dashboard')

@section('main')

        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Master Data Submenu</h4>
                <div class="ml-auto">
                    <a href="#" class="btn btn-primary rounded" data-target="#insertSubmenu" data-toggle="modal"><i class="fas fa-plus"></i> Tambah</a>
                    <a href="#" class="btn btn-danger rounded"><i class="far fa-trash-alt"></i> Hapus</a>
                </div>
              </div>
              <div class="card-body p-3">
                <div class="table-responsive">
                  <table class="table table-hover" id="table">
                    <thead>
                        <tr>
                            <th width="20px">
                                <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                </div>
                            </th>
                            <th width="40px">Menu</th>
                            <th width="100px">Submenu Name</th>
                            <th>Comments</th>
                            <th width="40px">Created_By</th>
                            <th width="10px">Status</th>
                            <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  {{-- !NOTE Data Modal here  --}}

  <!-- Modal Insert Submenu -->
    <div class="modal fade" id="insertSubmenu" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="insertSubmenuLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom pb-4">
            <h5 class="modal-title" id="insertSubmenuLabel">Insert Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate id="insert">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Menu ID</label>
                        <div class="col-sm-9">
                          <select name="menu_id" class="form-control" required>
                              <option selected disabled>== pilih menu ==</option>
                              @foreach ($menu as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                              @endforeach
                          </select>
                          <div class="invalid-feedback">
                            What's Menu ID?
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="name" required="">
                          <div class="invalid-feedback">
                            What's Submenu name?
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Submenu Url</label>
                        <div class="col-sm-9">
                          <input required type="text" class="form-control" name="url">
                          <div class="invalid-feedback">
                            What's Submenu Type?
                          </div>
                        </div>
                      </div>
                      <div class="form-group mb-0 row">
                        <label class="col-sm-3 col-form-label">Comments</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="comments"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer ml-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
        </div>
        </div>
    </div>

  <!-- Modal Update Section -->
    <div class="modal fade" id="updateSubmenu" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateSubmenuLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom pb-4">
            <h5 class="modal-title" id="updateSubmenuLabel">Update Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate id="update">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Menu ID</label>
                        <div class="col-sm-9">
                          <select name="menu_id" class="form-control" required>
                              <option selected disabled>== pilih menu ==</option>
                              @foreach ($menu as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                              @endforeach
                          </select>
                          <div class="invalid-feedback">
                            What's Menu ID?
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="name" required="">
                          <div class="invalid-feedback">
                            What's Submenu name?
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Submenu Url</label>
                        <div class="col-sm-9">
                          <input required type="text" class="form-control" name="url">
                          <div class="invalid-feedback">
                            What's Submenu Type?
                          </div>
                        </div>
                      </div>
                      <div class="form-group mb-0 row">
                        <label class="col-sm-3 col-form-label">Comments</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="comments"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer ml-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
        </div>
        </div>
    </div>

@endsection
