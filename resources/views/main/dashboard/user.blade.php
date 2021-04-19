@extends('templates.dashboard')

@section('main')

    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Data Aktivitas -
                            {{-- <div class="dropdown d-inline">
                                <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#"
                                    id="orders-month">August</a>
                                <ul class="dropdown-menu dropdown-menu-sm">
                                    <li class="dropdown-title">Select Month</li>
                                    <li><a href="#" class="dropdown-item">January</a></li>
                                    <li><a href="#" class="dropdown-item">February</a></li>
                                    <li><a href="#" class="dropdown-item">March</a></li>
                                    <li><a href="#" class="dropdown-item">April</a></li>
                                    <li><a href="#" class="dropdown-item">May</a></li>
                                    <li><a href="#" class="dropdown-item">June</a></li>
                                    <li><a href="#" class="dropdown-item">July</a></li>
                                    <li><a href="#" class="dropdown-item">August</a></li>
                                    <li><a href="#" class="dropdown-item">September</a></li>
                                    <li><a href="#" class="dropdown-item">October</a></li>
                                    <li><a href="#" class="dropdown-item">November</a></li>
                                    <li><a href="#" class="dropdown-item">December</a></li>
                                </ul>
                            </div> --}}
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="activityInsert">-</div>
                                <div class="card-stats-item-label text-success">Insert</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="activityUpdate">-</div>
                                <div class="card-stats-item-label text-warning">Update</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="activityDelete">-</div>
                                <div class="card-stats-item-label text-danger">Delete</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="activityRecovery">-</div>
                                <div class="card-stats-item-label text-info">Recovery</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="activityUnknown">-</div>
                                <div class="card-stats-item-label">Unknown</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Activity</h4>
                        </div>
                        <div class="card-body" id="activityTotal">
                            -
                        </div>
                    </div>
                </div>
            </div>

            @if ($member > 0 || auth()->user()->role_id <= 2)
                <div class="col">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">Nama Anggota : <span id="namaAnggota"
                                    class="text-capitalize">-</span>
                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count" style="font-size: 16px" id="divisiAnggota">-</div>
                                    <div class="card-stats-item-label text-success">Divisi</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count" style="font-size: 16px" id="jabatanAnggota">-</div>
                                    <div class="card-stats-item-label text-warning">Jabatan</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count" style="font-size: 16px" id="kelasAnggota">-</div>
                                    <div class="card-stats-item-label text-info">Kelas</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count" style="font-size: 16px" id="jurusanAnggota">-</div>
                                    <div class="card-stats-item-label text-danger">Jurusan</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jadwal</h4>
                            </div>
                            <div class="card-body">
                                <h3 id="jadwalMember" class="mt-2" style="font-size: 21px">-</h3>
                            </div>
                        </div>

                    </div>
                </div>
            @endif

            <div class="col-lg-8">
                <div class="card gradient-bottom">
                    <div class="card-header">
                        <h4>Data Jadwal</h4>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-hover" id="schedule">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Masuk</th>
                                        <th>Selesai</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistik Nilai</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border" id="StatsNilaiSiswa">
                            @foreach ($nilai as $item)
                                <li class="media">
                                    <div class="media-body">
                                        <div
                                            class="float-right text-{{ nilai_minimum_test($item->test->value, $item->score) }}">
                                            {{ $item->score }}</div>
                                        <div class="media-title">{{ $item->test->name }}</div>
                                        <span class="text-small text-muted">{{ $item->test->deskripsi }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        @if (auth()->user()->role_id < 3)
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistik Aktivitas</h4>
                        </div>
                        <div class="card-body">
                            <div class="chartjs-size-monitor"
                                style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <canvas id="myChart" height="374" width="711" class="chartjs-render-monitor"
                                style="display: block; width: 711px; height: 374px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card gradient-bottom">
                        <div class="card-header">
                            <h4>Top Browser User</h4>
                        </div>
                        <div class="card-body" id="top-5-scroll" tabindex="2"
                            style="height: 315px; overflow: hidden; outline: none; touch-action: none;">
                            <ul class="list-unstyled list-unstyled-border" id="BrowserUser">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection
