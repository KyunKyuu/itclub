
<div class="main-content" style="min-height: 549px;">
    <section class="section">
        <div class="section-header">
          <div class="section-header-back">
              <a href="/{{request()->segment(1)}}/{{request()->segment(2)}}/list_{{request()->segment(2)}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
        <h1 class="text-capitalize">{{request()->segment(2)}}</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item text-capitalize active"><a href="#">{{request()->segment(1)}}</a></div>
          <div class="breadcrumb-item text-capitalize active"><a href="#">{{request()->segment(2)}}</a></div>
          <div class="breadcrumb-item text-capitalize">{{request()->segment(5)}}</div>
        </div>
      </div>
