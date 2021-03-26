@extends('templates.dashboard')

@section('main')

<div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4>Data Page</h4>
          <div class="buttons ml-auto">
            <a href="#" class="btn btn-primary btn-lg shadow mt-2" style="border-radius: 5px;">
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

@endsection
