@extends('templates.dashboard')

@section('main')

<div class="row">
    <div class="col-12">
      <div class="card mb-0">
        <div class="card-body">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link active" href="#">All <span class="badge badge-white">5</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Draft <span class="badge badge-primary">1</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pending <span class="badge badge-primary">1</span></a>
            </li>
            @if (auth()->user()->role_id == 1)
                <li class="nav-item">
                    <a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a>
                </li>
            @endif
            <li class="nav-item ml-auto">
                <a href="#" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>All Posts</h4>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                        <th class="text-center pt-2">
                          <div class="custom-checkbox custom-checkbox-table custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                          </div>
                        </th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Created At</th>
                        <th>Status</th>
                      </tr>
                </thead>
              <tbody>

              <tr>
                <td>
                  <div class="custom-checkbox custom-control">
                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                    <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                  </div>
                </td>
                <td>Laravel 5 Tutorial: Introduction
                  <div class="table-links">
                    <a href="#">View</a>
                    <div class="bullet"></div>
                    <a href="#">Edit</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">Trash</a>
                  </div>
                </td>
                <td>
                  <a href="#">Web Developer</a>,
                  <a href="#">Tutorial</a>
                </td>
                <td>
                  <a href="#">
                    <img alt="image" src="/public_file/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">Rizal Fakhri</div>
                  </a>
                </td>
                <td>2018-01-20</td>
                <td><div class="badge badge-primary">Published</div></td>
              </tr>

            </tbody></table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
