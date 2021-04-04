@extends('templates.dashboard')

@section('main')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Master Data Section</h4>
                    <div class="ml-auto">
                        <a href="#" class="btn btn-primary rounded" data-target="#insertSection" data-toggle="modal"><i
                                class="fas fa-plus"></i> Tambah</a>
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
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                                class="custom-control-input" id="checkbox-all"
                                                onchange="checkbox_all(this )">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th width="80px">Section Name</th>
                                    <th width="70px">Created By</th>
                                    <th>Comments</th>
                                    <th width="50px">Status</th>
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


    {{-- !NOTE Data Modal here --}}

    <!-- Modal Insert Section -->
    <div class="modal fade" id="insertSection" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="insertSectionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom pb-4">
                    <h5 class="modal-title" id="insertSectionLabel">Insert Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate id="insert">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Section Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" required="">
                                <div class="invalid-feedback">
                                    What's section name?
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 row">
                            <label class="col-sm-3 col-form-label">Comments</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="comments" required=""></textarea>
                                <div class="invalid-feedback">
                                    What do you wanna say?
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

    <!-- Modal Update Section -->
    <div class="modal fade" id="updateSection" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="updateSectionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom pb-4">
                    <h5 class="modal-title" id="updateSectionLabel">Update Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate id="update">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Section Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="update_name" name="name" required="">
                                <div class="invalid-feedback">
                                    What's section name?
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 row">
                            <label class="col-sm-3 col-form-label">Comments</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="update_comments" name="comments" required=""></textarea>
                                <div class="invalid-feedback">
                                    What do you wanna say?
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
