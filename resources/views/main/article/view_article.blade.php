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
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" disabled value="{{$data['blog']->title}}" class="form-control">
                      <input type="hidden" name="id" value="{{$data['blog']->id}}">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    {{-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label> --}}
                    <div class="col-sm-12 col-md-12">
                        <textarea id="UseCkeditor" class="use-ckeditor">{{$data['blog']->content}}  </textarea>
                      <input data-editor="ckeditor" type="hidden" name="content" value="{{$data['blog']->content}}">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                    <div class="col-sm-12 col-md-7">
                        @if ($data['blog']->status > 200)
                        <input type="text" class="form-control" disabled value="{{$data['blog']->status == 300 ? 'Pending' : 'Error'}}">
                        @else
                        <select class="form-control selectric text-capitalize" name="status" >
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

@endsection
