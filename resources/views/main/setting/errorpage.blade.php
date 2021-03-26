@extends('templates.dashboard')

@section('main')

<div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4>Data Page</h4>
          <div class="buttons ml-auto">
            <a href="#" class="btn btn-primary btn-lg shadow mt-2" id="insertModal" style="border-radius: 5px;">
                <i class="fas fa-plus"></i> Add
            </a>
        </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-md" id="dataPage">
                    <thead>
                        <tr>
                            <th style="width: 10px">Code</th>
                            <th>Title</th>
                            <th>Action</th>
                          </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
              </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <form id="setting-role">
        <div class="card" id="settings-card">
          <div class="card-header">
            <h4>Page Preview</h4>
            <div class="card-header-action">
              </div>
          </div>
          <div class="card-body" id="pagePreview">

          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
  </div>



  <!-- Modal Insert Page -->
  <div class="modal fade" id="insertPage" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="insertPageLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header border-bottom pb-4">
        <h5 class="modal-title" id="insertPageLabel">Insert Page</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" >
            <form class="needs-validation" novalidate>
                <div class="form-group row justify-content-center">
                    <img class="img-fluid " src="" style="max-height: 150px;width:200px;" id="image-preview">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Thumbnail</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control image-input-preview" data-id="image-preview"  name="image" required="">
                        <div class="invalid-feedback">
                            What's Image Page?
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Code Page</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="error_code" required="">
                            <div class="invalid-feedback">
                                What's Code Page?
                            </div>
                        </div>
                    </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-9">
                      <textarea name="title" id="title" cols="30" rows="10" class="form-control" style="min-height: 70px;" required></textarea>
                      <div class="invalid-feedback">
                        What's title Page?
                      </div>
                    </div>
                  </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                      <textarea name="description" class="form-control" cols="30" rows="10" required style="min-height: 70px;"></textarea>
                      <div class="invalid-feedback">
                        What's Description Page?
                      </div>
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
