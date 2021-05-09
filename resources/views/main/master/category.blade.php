@extends('templates.dashboard')

@section('main')

        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h4>Data Category</h4>
              </div>
              <div class="card-body p-3">
                <div class="table-responsive">
                  <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th width="10px">
                                <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                </div>
                            </th>
                            <th>Category Name</th>
                            <th>Created at</th>
                            <th width="70px">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>

           <div class="col-12 col-md-12 col-lg-5">
            <div class="card">
              <form id="insert" class="needs-validation" novalidate="" >
                <div class="card-header">
                  <h4>Add Category </div>
                <div class="card-body">
                    
                  <div class="row">
                      <div class="form-group col-md col-12">
                        <label>Category Name</label>
                         <input type="text" class="form-control" name="name" required="">
                          <div class="invalid-feedback">
                            What's Category name?
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

  <!-- Modal Update -->
    <div class="modal fade" id="updateCategory" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateCategoryLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom pb-4">
            <h5 class="modal-title" id="updateCategoryLabel">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate id="update">
                      <div class="form-group row">
                        <div class="form-group col-12">
                        <label>Category Name</label>
                          <input type="text" class="form-control" name="name" required="">
                          <div class="invalid-feedback">
                            What's Category name?
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
