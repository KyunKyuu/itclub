@extends('templates.userguides')

@section('main')

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card p-4">
                    <div id="Step" data-id="{{ $_GET['uid'] }}">
                        <div class="card-body">
                            <h3 class="text-center">{{ $_GET['slug'] }}</h3>
                            <hr>
                            <div class="list-unstyled list-unstyled-border mt-4" id="detail">
                                <div class="media">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
