
<div class="main-content" style="min-height: 549px;">
    <section class="section">
      <div class="section-header">
        <h1>Preferences Web</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item text-capitalize active"><a href="#">{{request()->segment(1)}}</a></div>
          @if (request()->segment(3))
            <div class="breadcrumb-item text-capitalize"><a href="#">{{request()->segment(2)}}</a></div>
            <div class="breadcrumb-item text-capitalize">{{request()->segment(3)}}</div>
          @else
            <div class="breadcrumb-item text-capitalize">{{request()->segment(2)}}</div>
          @endif
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Menu</h2>
        <p class="section-lead">Example of some Bootstrap table components.</p>
