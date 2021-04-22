@extends('templates.dashboard')

@section('main')

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h4>List User Guide</h4>
                    <div class="ml-auto">
                        <a href="#" class="btn btn-primary rounded" id="modalUserGuides"><i class="fas fa-plus"></i>
                            Tambah</a>
                        <a href="#" class="btn btn-danger rounded" id="deleteArray"><i class="far fa-trash-alt"></i>
                            Hapus</a>
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
                                    <th>Title</th>
                                    <th width="50px">Created By</th>
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
                <div class="card-header">
                    <h4>Step User Guide</h4>
                    <div id="btnAccordion" class="ml-auto"></div>
                </div>
                <div class="card-body" id="">
                    <div id="headerAccordion"></div>

                    <hr>
                    <div id="accordion">

                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>
    </div>

    <!-- Modal User Guides -->
    <div class="modal fade" id="userGuidesModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="userGuidesModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom pb-4">
                    <h5 class="modal-title" id="userGuidesModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate id="">
                        <div class="form-group row">
                            <div class="form-group col-12">
                                <label>Title User Guides</label>
                                <input type="text" class="form-control" name="title" required="">
                                <div class="invalid-feedback">
                                    What's Title User Guides?
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer ml-3" style="margin-top: -30px">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal List Guides -->
    <div class="modal fade" id="listGuidesModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="listGuidesModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom pb-4">
                    <h5 class="modal-title" id="listGuidesModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate id="">
                        <div class="text-center">
                            <img src="" alt="image thumbnail" class="img-fluid" style="max-height: 150px"
                                id="imageThumbnail">
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label>Thumbnail Guides</label>
                                <input type="file" class="form-control image-input-preview" data-id="imageThumbnail"
                                    name="thumbnail">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label>Description User Guides</label>
                                <input type="text" class="form-control use-ckeditor" name="description">
                                <input type="text" data-editor="ckeditor" style="display: none" required>
                                <div class="invalid-feedback">
                                    What's Description User Guides?
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer ml-3" style="margin-top: -30px">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
