
<div class="main-content" style="min-height: 549px;">
    <section class="section">
      <div class="section-header">
        <h1 class="text-capitalize">{{request()->segment(3)}}</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item text-capitalize active"><a href="#">{{request()->segment(1)}}</a></div>
          <div class="breadcrumb-item text-capitalize active"><a href="#">{{request()->segment(3)}}</a></div>
          <div class="breadcrumb-item text-capitalize">{{request()->segment(2)}}</div>
        </div>
      </div>
