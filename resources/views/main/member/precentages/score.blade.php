@extends('templates.dashboard')


@section('main')


    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4>Data Member</h4>
                    <div class="card-header-action dropdown">
                        <a href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle" aria-expanded="false"
                            id="selected">Pilih Divisi</a>
                        <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right" x-placement="bottom-end"
                            style="position: absolute; transform: translate3d(75px, 31px, 0px); top: 0px; left: 0px; will-change: transform;"
                            id="DivisionSelect">
                            <li class="dropdown-title">Pilih Divisi</li>
                            @foreach ($division as $item)
                                <li><a href="#" data-value="{{ $item->id }}" onclick="division(this)"
                                        class="dropdown-item">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th width="10px">

                                    </th>
                                    <th>Nama</th>
                                    <th width="70px">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4>Score Member</h4>

                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-striped" id="score">
                            <thead>
                                <tr>
                                    <th width="10px">

                                    </th>
                                    <th>Test</th>
                                    <th>Nilai</th>
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
    </section>



@endsection
