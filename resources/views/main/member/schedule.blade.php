@extends('templates.dashboard')


@section('main')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Data Schedule Member</h4>
                    <div class="ml-auto">
                        <a href="#" class="btn btn-primary rounded" id="TambahData"><i class="fas fa-plus"></i> Tambah</a>
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
                                                class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Divisi</th>
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Keterangan</th>
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


    <!-- Modal Insert Schedule -->
    <div class="modal fade" id="insertSchedule" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="insertScheduleLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom pb-4">
                    <h5 class="modal-title" id="insertScheduleLabel">Insert Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Divisi</label>
                            <div class="col-sm-9">
                                <select name="division" id="division" class="form-control" required>
                                    <option value selected disabled>== pilih divisi ==</option>
                                    <option value="all">All</option>
                                    @foreach ($divisi as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select divisi schedule?
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jam Masuk</label>
                            <div class="col-sm-9">
                                <input type="time" name="come_in" id="come_in" class="form-control">
                                <div class="invalid-feedback">
                                    Please input Jam Masuk?
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jam Keluar</label>
                            <div class="col-sm-9">
                                <input type="time" name="come_out" id="come_out" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please input Jam Keluar?
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" name="date" id="date" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please input Jam Keluar?
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea name="desc" id="desc" cols="30" rows="10" class="form-control"></textarea>
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
