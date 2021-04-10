@extends('templates.resource')

@section('main')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Upgrade to Member</h4>
                </div>
                <div class="card-body">
                    <div class="row mt-4">
                        <div class="col-12 col-lg-8 offset-lg-2  x">
                            <div class="wizard-steps">
                                <div style="cursor: pointer" data-id="wizard-form-1" class="wizard-step wizard-step-active">
                                    <div class="wizard-step-icon">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="wizard-step-label">
                                        User Account
                                    </div>
                                </div>
                                <div style="cursor: pointer" data-id="wizard-form-2" class="wizard-step">
                                    <div class="wizard-step-icon">
                                        <i class="fas fa-box-open"></i>
                                    </div>
                                    <div class="wizard-step-label">
                                        Information Upgrade
                                    </div>
                                </div>
                                <div style="cursor: pointer" data-id="wizard-form-3" class="wizard-step">
                                    <div class="wizard-step-icon">
                                        <i class="fas fa-server"></i>
                                    </div>
                                    <div class="wizard-step-label">
                                        Optional Upgrade
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form class="wizard-content mt-2" id="upgrade">
                        <div class="wizard-pane" id="wizard-form-1">
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Nama Lengkap</label>
                                <div class="col-lg-6 col-md-8">
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Email</label>
                                <div class="col-lg-6 col-md-8">
                                    <input type="email" name="email" class="form-control" disabled
                                        value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 text-md-right text-left mt-2">Profile User</label>
                                <div class="col-lg-6 col-md-8">
                                    <input type="file" name="image" class="image-input-preview" data-id="gambar-preview">
                                    <img id="gambar-preview" class="img-fluid mt-3" src="" alt="" style="max-width: 250px;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-lg-6 col-md-8 text-right">
                                    <a href="#" class="btn btn-icon icon-right btn-primary wizard-next"
                                        data-id="wizard-form-2">Next <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>


                        <div class="wizard-pane" id="wizard-form-2" style="display: none">
                            <div class="form-group row">
                                <label class="col-md-4 text-md-right text-left mt-2">Divisi</label>
                                <div class="col-lg-6 col-md-8">
                                    <div class="selectgroup w-100">
                                        @foreach ($divisi as $item)
                                            <label class="selectgroup-item">
                                                <input type="radio" name="divisions" value="{{ $item->id }}"
                                                    class="selectgroup-input" required>
                                                <span class="selectgroup-button">{{ $item->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row align-items-center" id="divisionsPreview">

                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <a href="#" class="btn btn-icon icon-right btn-primary wizard-previous"
                                        data-id="wizard-form-1"><i class="fas fa-arrow-left"></i> Previous </a>
                                    <a href="#" class="btn float-right btn-icon icon-right btn-primary wizard-next"
                                        data-id="wizard-form-3">Next <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>


                        <div class="wizard-pane" id="wizard-form-3" style="display: none">
                            <div class="form-group row">
                                <label class="col-md-4 text-md-right text-left mt-2">Asal Pendaftar</label>
                                <div class="col-lg-6 col-md-8">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="asal_pendaftar" value="smkn5"
                                                class="selectgroup-input" required>
                                            <span class="selectgroup-button">SMKN 5</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="asal_pendaftar" value="lainnya"
                                                class="selectgroup-input" required>
                                            <span class="selectgroup-button">Lainnya</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="smkn5">


                            </div>
                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-lg-6 col-md-8">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" class="custom-control-input" id="agree"
                                            required>
                                        <label class="custom-control-label" for="agree">I agree with the terms and
                                            conditions</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-lg-6 col-md-8">
                                    <a href="#" class="btn btn-icon icon-right btn-primary wizard-previous"
                                        data-id="wizard-form-2"><i class="fas fa-arrow-left"></i> Previous </a>
                                    <button class="btn float-right btn-icon icon-right btn-primary" type="submit">Submit <i
                                            class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
