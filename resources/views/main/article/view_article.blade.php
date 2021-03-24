@extends('templates.article')

@section('main')

<div class="section-body">
    <h2 class="section-title">Write Your Post</h2>
    <p class="section-lead">
      Title : {{$data['blog']->title}}
    </p>

    <div class="row">
      <div class="col-12">
        <form action id="savePost">
            <div class="card">
                <div class="card-body">
                  <div class="form-group row mb-4">
                    {{-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label> --}}
                    <div class="col-sm-12 col-md-7">
                      {{-- <input type="text" disabled value="{{$data['blog']->title}}" class="form-control"> --}}
                      <input type="hidden" name="id" value="{{$data['blog']->id}}">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    {{-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label> --}}
                    <div class="col-sm-12 col-md-12">
                        @if ($data['blog']->status == 400)
                            <input type="text" class="form-control" disabled value="Blocked">
                        @else
                            <textarea id="UseCkeditor" class="use-ckeditor">{{$data['blog']->content}}  </textarea>
                            <input data-editor="ckeditor" type="hidden" name="content" value="{{$data['blog']->content}}">
                        @endif
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                    <div class="col-sm-12 col-md-7">
                        @if ($data['blog']->status == 400)
                        <input type="text" class="form-control" disabled value="Blocked">
                        @elseif ($data['blog']->status == 300)
                            <input type="text" class="form-control" disabled value="Suspended until {{Suspended($data['blog']->id)}}">
                        @else
                        <select class="form-control selectric text-capitalize" name="status" {{$data['blog']->status == 500 ? 'disabled' : ''}}>
                            @foreach ($data['status'] as $status)
                            <option value="{{$status['id']}}" {{$data['blog']->status == $status['id'] ? 'selected' : ' '}} class="text-capitalize">{{$status['value']}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                      <button class="btn btn-primary" type="submit">Save Post</button>
                    </div>
                  </div>
                </div>
              </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal -->
  @if ($data['blog']->status > 200)
    <div class="modal fade show" id="AlertModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="AlertModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="AlertModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
        </div>
    </div>
  @endif

@endsection
