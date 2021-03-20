@extends('templates.dashboard')

@section('main')

<div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h4>Data Role</h4>
        </div>
        <div class="card-body">
          <ul class="nav nav-pills flex-column" id="dataRole">

          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <form id="setting-role">
        <div class="card" id="settings-card">
          <div class="card-header">
            <h4>Role Access</h4>
            <div class="card-header-action">
                <div class="btn-group">
                  <a href="#" class="btn btn-outline-primary text-capitalize" id="sectionRole">section</a>
                  <a href="#" class="btn btn-outline-primary text-capitalize" id="menuRole">menu</a>
                  <a href="#" class="btn btn-outline-primary text-capitalize" id="submenuRole">submenu</a>
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
