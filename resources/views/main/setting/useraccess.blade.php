@extends('templates.dashboard')

@section('main')

<div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4>Data Users</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-md" id="dataUsers">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
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
            <h4>Role Access</h4>
            <div class="card-header-action">
                <div class="btn-group" id="btnGroup">

                </div>
              </div>
          </div>
          <div class="card-body">
            <p class="text-muted">General Setting Access Role.</p>

            <div id="formTable"></div>

          </div>
        </div>
      </form>
    </div>
  </div>

@endsection
