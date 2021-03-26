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
                            <input type="text" class="form-control" disabled value="Suspended until {{Suspended($data['blog']->id)->suspended}}">
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
                        @if ($data['blog']->status == 400)
                        <button type="disabled" class="btn btn-secondary" disabled>Blocked</button>
                        @elseif ($data['blog']->status == 300)
                            <button type="disabled" class="btn btn-secondary" disabled value="">Suspended until {{Suspended($data['blog']->id)->suspended}}</button>
                        @else
                         <button class="btn btn-primary" type="submit">Save Post</button>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
        </form>
      </div>
    </div>
  </div>
  </div>

  <!-- Modal -->
  @if ($data['blog']->status > 200)
    <div class="modal fade" id="AlertModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="AlertModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="AlertModalLabel"><i class="fas fa-exclamation-triangle"></i> Caution {{$data['blog']->status}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="row text-center">
                <i class="fa fa-newspaper fa-5x mx-auto"></i>
            </div>
            <h3 class="mx-auto text-center">Your Post has been Takedown</h3>
            <p class="text-center">{{Suspended($data['blog']->id)->description}}</p>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>
    </div>
  @endif

@endsection
