ia<div class="main-content" style="min-height: 549px;">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="/members/{{ auth()->user()->name }}/userguides" class="btn btn-icon"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1 class="text-capitalize">{{ $_GET['slug'] }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item text-capitalize active"><a
                        href="/members/{{ auth()->user()->name }}/profile">{{ request()->segment(1) }}</a></div>
                <div class="breadcrumb-item text-capitalize active"><a
                        href="/members/{{ auth()->user()->name }}/userguides">{{ request()->segment(2) }}</a></div>
                <div class="breadcrumb-item text-capitalize">{{ $_GET['slug'] }}</div>
            </div>
        </div>
