
<div class="main-content" style="min-height: 549px;">
    <section class="section">
      <div class="section-header">
        <h1 class="text-capitalize">{{request()->segment(2)}}</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item text-capitalize active"><a href="#">{{request()->segment(2)}}</a></div>
          <div class="breadcrumb-item text-capitalize">{{request()->segment(1)}}</div>
        </div>
      </div>
