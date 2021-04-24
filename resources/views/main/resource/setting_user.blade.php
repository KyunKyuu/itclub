@extends('templates.resource')

@section('main')

    <div class="section-body">
        <h2 class="section-title">Overview</h2>
        <p class="section-lead">
            Organize and adjust all settings about this site.
        </p>

        <div class="row">
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-cog"></i>
                    </div>
                    <div class="card-body">
                        <h4>General</h4>
                        <p>General settings such as, site title, site description, address and so on.</p>
                        <a href="#" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="card-body">
                        <h4>Password</h4>
                        <p>You can change password in this setting.</p>
                        <a href="/members/admin/setting/changepassword" class="card-cta">Change Setting <i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="card-body">
                        <h4>User Guides</h4>
                        <p>Is manual book for user how can access and manage dashboard website.</p>
                        <a href="/members/admin/userguides" class="card-cta">Change Setting <i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="card-body">
                        <h4>Email</h4>
                        <p>Email SMTP settings, notifications and others related to email.</p>
                        <a href="#" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-power-off"></i>
                    </div>
                    <div class="card-body">
                        <h4>System</h4>
                        <p>PHP version settings, time zones and other environments.</p>
                        <a href="#" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-6">
        <div class="card card-large-icons">
          <div class="card-icon bg-primary text-white">
            <i class="fas fa-stopwatch"></i>
          </div>
          <div class="card-body">
            <h4>Automation</h4>
            <p>Settings about automation such as cron job, backup automation and so on.</p>
            <a href="#" class="card-cta text-primary">Change Setting <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div> --}}
        </div>
    </div>

@endsection
