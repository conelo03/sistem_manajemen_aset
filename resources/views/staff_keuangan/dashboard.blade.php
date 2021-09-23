@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-12">
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-header">Pengeluaran Pengadaan</div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <div class="svg-item">
                    <svg width="350%" height="100%" viewBox="0 0 40 40" class="donut">
                      <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
                      <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
                      <circle class="donut-segment donut-segment-2" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="{{ $p_pengadaan . ' ' . (100 - $p_pengadaan) }}" stroke-dashoffset="25"></circle>
                      <g class="donut-text donut-text-1">
                        <text y="50%" transform="translate(0, 2)">
                          <tspan x="50%" text-anchor="middle" class="donut-percent">{{ round($p_pengadaan, 2) }}%</tspan>   
                        </text>
                        <text y="60%" transform="translate(0, 2)">
                          <tspan x="50%" text-anchor="middle" class="donut-data">% dari Anggaran Pengadaan</tspan>   
                        </text>
                      </g>
                    </svg>
                  </div>
                </div>
                <div class="col text-center">
                  <div class="row bg-secondary">
                    <div class="col border p-1">
                      <div>Realisasi</div>
                      <div><strong>{{ rupiah($p_realisasi) }}</strong></div>
                    </div>
                  </div>
                  <div class="row bg-secondary">
                    <div class="col border p-1">
                      <div>Anggaran</div>
                      <div><strong>{{ rupiah($p_anggaran) }}</strong></div>
                    </div>
                  </div>
                  <div class="row bg-secondary">
                    <div class="col border p-1">
                      <div>Selisih</div>
                      <div><strong>{{ rupiah($p_anggaran - $p_realisasi) }}</strong></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <div class="card-header">Pengeluaran Maintenance</div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <div class="svg-item">
                    <svg width="350%" height="100%" viewBox="0 0 40 40" class="donut">
                      <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
                      <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
                      <circle class="donut-segment donut-segment-2" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="{{ $m_maintenance . ' ' . (100 - $m_maintenance) }}" stroke-dashoffset="25"></circle>
                      <g class="donut-text donut-text-1">
                        <text y="50%" transform="translate(0, 2)">
                          <tspan x="50%" text-anchor="middle" class="donut-percent">{{ round($m_maintenance, 2) }}%</tspan>   
                        </text>
                        <text y="60%" transform="translate(0, 2)">
                          <tspan x="50%" text-anchor="middle" class="donut-data">% dari Anggaran Pengadaan</tspan>   
                        </text>
                      </g>
                    </svg>
                  </div>
                </div>
                <div class="col text-center">
                  <div class="row bg-secondary">
                    <div class="col border p-1">
                      <div>Realisasi</div>
                      <div><strong>{{ rupiah($m_realisasi) }}</strong></div>
                    </div>
                  </div>
                  <div class="row bg-secondary">
                    <div class="col border p-1">
                      <div>Anggaran</div>
                      <div><strong>{{ rupiah($m_anggaran) }}</strong></div>
                    </div>
                  </div>
                  <div class="row bg-secondary">
                    <div class="col border p-1">
                      <div>Selisih</div>
                      <div><strong>{{ rupiah($m_anggaran - $m_realisasi) }}</strong></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection