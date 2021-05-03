@extends('templates.resource')

@section('main')

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List User Guide</h4>
                        {{-- <div class="card-header-action">
                            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                        </div> --}}
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive ">
                            <table class="table table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="30">
                                            <i class="fas fa-th"></i>
                                        </th>
                                        <th>Title</th>
                                        <th width="80">Created By</th>
                                        <th width="100">Due Date</th>
                                        <th width="30">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
