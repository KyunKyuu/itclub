@extends('templates.dashboard')

@section('main')

        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h4>Data images Gallery</h4>
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
                            <th>Gallery Name</th>
                            <th>Image</th>
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
                  <h4>Add images Gallery </div>
                <div class="card-body">
                    
                  <div class="row">
                      <div class="form-group col-md col-12">
                        <label>Gallery Name</label>
                          <select required name="gallery_id" class="form-control">
                              <option selected disabled>== Pilih Gallery ==</option>
                              @foreach ($gallery as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                              @endforeach
                          </select>
                          <div class="invalid-feedback">
                            What's Gallery ID?
                        </div>
                  </div>

                 <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label>Thumbnail</label>
                        <input type="file" class="form-control image-input-preview"  value="" name="image" placeholder="Pelajar" data-id="img-thumbnail" required>
                      </div>
                      <div class="form-group col-md-6 col-12">
                          <img src="/public_file/assets/img/news/img08.jpg" id="img-thumbnail" alt="" class="img-fluid" style="max-width: 150px"><br>
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
