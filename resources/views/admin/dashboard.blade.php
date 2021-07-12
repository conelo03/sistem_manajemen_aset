@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-xl-8">
      <div class="card bg-default">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-light text-uppercase ls-1 mb-1">Total Pengadaan</h6>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <!-- Chart wrapper -->
            <canvas id="myBarChart" class="chart-canvas"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection