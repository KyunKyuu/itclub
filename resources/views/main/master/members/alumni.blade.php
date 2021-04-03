@extends('templates.dashboard')

@section('main')

        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Alumni</h4>
                <div class="ml-auto">
                    <a href="#" class="btn btn-primary rounded" data-target="#insertAlumni" data-toggle="modal"><i class="fas fa-plus"></i> Tambah</a>
                    <a href="#" class="btn btn-danger rounded"><i class="far fa-trash-alt"></i> Hapus</a>
                </div>
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
                            <th>Name</th>
                            <th>Work</th>
                            <th>Study</th>
                            <th>Place</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th width="70px">Action</th>
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

  <!-- Modal Insert -->
    <div class="modal fade" id="updateAlumni" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateAlumniLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom pb-4">
            <h5 class="modal-title" id="updateAlumniLabel">Apdate Alumni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate id="update">
                      <div class="form-group row">
                        <div class="form-group col-12">
                        <label>Alumni Name</label>
                         <select required name="member_id" class="form-control">
                              <option selected disabled>== Name ID dari table Member ==</option>
                              @foreach ($members as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                              @endforeach
                          </select>
                          <div class="invalid-feedback">
                            What's Alumni name?
                          </div>
                        </div>
                      </div>
                       <div class="form-group row">
                        <div class="form-group col-12">
                        <label>Bekerja Sebagai</label>
                          <input type="text" class="form-control" name="work" placeholder="Bekerja sebagai"  >
                          <div class="invalid-feedback">
                            Bekerja Sebagai apa?
                          </div>
                        </div>
                      </div>

                       <div class="form-group row">
                        <div class="form-group col-12">
                        <label>Jurusan Kuliah</label>
                          <input type="text" class="form-control" name="study"  placeholder="Jurusan Kuliah"  >
                          <div class="invalid-feedback">
                            Kuliah Jurusan apa?
                          </div>
                        </div>
                      </div>
                      
                       <div class="form-group row">
                        <div class="form-group col-12">
                        <label>Nama Kantor / Univ</label>
                          <input type="text" class="form-control" name="place" required="" placeholder="Nama Kantor / Univ">
                          <div class="invalid-feedback">
                           Nama Kantor / Univ?
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

  <!-- Modal Update -->
        <div class="modal fade" id="insertAlumni" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="insertAlumniLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom pb-4">
            <h5 class="modal-title" id="insertAlumniLabel">Insert Alumni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate id="insert">
                      <div class="form-group row">
                        <div class="form-group col-12">
                        <label>Alumni Name</label>
                         <select required name="member_id" class="form-control">
                              <option selected disabled>== Name ID dari table Member ==</option>
                              @foreach ($members as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                              @endforeach
                          </select>
                          <div class="invalid-feedback">
                            What's Alumni name?
                          </div>
                        </div>
                      </div>
                       <div class="form-group row">
                        <div class="form-group col-12">
                        <label>Bekerja Sebagai</label>
                          <input type="text" class="form-control" name="work" placeholder="Bekerja sebagai"  >
                          <div class="invalid-feedback">
                            Bekerja Sebagai apa?
                          </div>
                        </div>
                      </div>

                       <div class="form-group row">
                        <div class="form-group col-12">
                        <label>Jurusan Kuliah</label>
                          <input type="text" class="form-control" name="study"  placeholder="Jurusan Kuliah"  >
                          <div class="invalid-feedback">
                            Kuliah Jurusan apa?
                          </div>
                        </div>
                      </div>
                      
                       <div class="form-group row">
                        <div class="form-group col-12">
                        <label>Nama Kantor / Univ</label>
                          <input type="text" class="form-control" name="place" required="" placeholder="Nama Kantor / Univ">
                          <div class="invalid-feedback">
                           Nama Kantor / Univ?
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
