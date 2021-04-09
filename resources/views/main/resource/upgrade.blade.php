@extends('templates.resource')

@section('main')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create New App</h4>
                </div>
                <div class="card-body">
                    <div class="row mt-4">
                        <div class="col-12 col-lg-8 offset-lg-2">
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
                                        Create an App
                                    </div>
                                </div>
                                <div style="cursor: pointer" data-id="wizard-form-3" class="wizard-step">
                                    <div class="wizard-step-icon">
                                        <i class="fas fa-server"></i>
                                    </div>
                                    <div class="wizard-step-label">
                                        Server Information
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form class="wizard-content mt-2">
                        <div class="wizard-pane" id="wizard-form-1">
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Name</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Email</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 text-md-right text-left mt-2">Address</label>
                                <div class="col-lg-4 col-md-6">
                                    <textarea class="form-control" name="address"
                                        style="margin-top: 0px; margin-bottom: 0px; height: 79px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 text-md-right text-left mt-2">Role</label>
                                <div class="col-lg-4 col-md-6">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="value" value="developer" class="selectgroup-input">
                                            <span class="selectgroup-button">Developer</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="value" value="ceo" class="selectgroup-input">
                                            <span class="selectgroup-button">CEO</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                        <label class="custom-control-label" for="agree">I agree with the terms and
                                            conditions</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-lg-4 col-md-6 text-right">
                                    <a href="#" class="btn btn-icon icon-right btn-primary wizard-next">Next <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>


                        <div class="wizard-pane" id="wizard-form-2" style="display: none">
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Name</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 text-md-right text-left">Email</label>
                                <div class="col-lg-4 col-md-6">
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 text-md-right text-left mt-2">Address</label>
                                <div class="col-lg-4 col-md-6">
                                    <textarea class="form-control" name="address"
                                        style="margin-top: 0px; margin-bottom: 0px; height: 79px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 text-md-right text-left mt-2">Role</label>
                                <div class="col-lg-4 col-md-6">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="value" value="developer" class="selectgroup-input">
                                            <span class="selectgroup-button">Developer</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="value" value="ceo" class="selectgroup-input">
                                            <span class="selectgroup-button">CEO</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                        <label class="custom-control-label" for="agree">I agree with the terms and
                                            conditions</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <a href="#" class="btn btn-icon icon-right btn-primary wizard-previous"><i
                                            class="fas fa-arrow-left"></i> Previous </a>
                                    <a href="#" class="btn float-right btn-icon icon-right btn-primary wizard-next">Next <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
