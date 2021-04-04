@extends('templates.dashboard')

@section('main')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Master Data Menu</h4>
                    <div class="ml-auto">
                        <a href="#" class="btn btn-primary rounded" data-target="#insertMenu" data-toggle="modal"><i
                                class="fas fa-plus"></i> Tambah</a>
                        <a href="#" class="btn btn-danger rounded" id="deleteArray"><i class="far fa-trash-alt"></i>
                            Hapus</a>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table">
                            <thead>
                                <tr>
                                    <th width="20px">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                                class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th width="50px">Section</th>
                                    <th width="100px">Menu Name</th>
                                    <th width="10px">Icon</th>
                                    <th width="30px">Type</th>
                                    <th>Comments</th>
                                    <th width="30px">Status</th>
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


    {{-- !NOTE Data Modal here --}}

    <!-- Modal Insert Menu -->
    <div class="modal fade" id="insertMenu" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="insertMenuLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom pb-4">
                    <h5 class="modal-title" id="insertMenuLabel">Insert Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate id="insert">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Section ID</label>
                            <div class="col-sm-9">
                                <select required name="section_id" class="form-control">
                                    <option selected disabled>== pilih section ==</option>
                                    @foreach ($section as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    What's Section ID?
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Menu Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" required="">
                                <div class="invalid-feedback">
                                    What's Menu name?
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Menu Type</label>
                            <div class="col-sm-9">
                                <select required name="type" class="form-control">
                                    <option value selected disabled>== pilih type ==</option>
                                    <option value="static">static</option>
                                    <option value="dynamic">dynamic</option>
                                </select>
                                <div class="invalid-feedback">
                                    What's Menu Type?
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Menu Icon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="icon" required="">
                                <div class="invalid-feedback">
                                    What's Menu icon?
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Menu Url</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="url">
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
    <div class="modal fade" id="updateMenu" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="updateMenuLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom pb-4">
                    <h5 class="modal-title" id="updateMenuLabel">Update Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate id="update">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Section ID</label>
                            <div class="col-sm-9">
                                <select required name="section_id" class="form-control">
                                    <option selected disabled>== pilih section ==</option>
                                    @foreach ($section as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    What's Section ID?
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Menu Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" required="">
                                <div class="invalid-feedback">
                                    What's Menu name?
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Menu Type</label>
                            <div class="col-sm-9">
                                <select required name="type" class="form-control">
                                    <option value selected disabled>== pilih type ==</option>
                                    <option value="static">static</option>
                                    <option value="dynamic">dynamic</option>
                                </select>
                                <div class="invalid-feedback">
                                    What's Menu Type?
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Menu Icon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="icon" required="">
                                <div class="invalid-feedback">
                                    What's Menu icon?
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Menu Url</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="url">
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
