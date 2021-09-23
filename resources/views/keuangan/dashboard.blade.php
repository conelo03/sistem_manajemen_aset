@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-xl-6">
      <div class="card">
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
    <div class="col-xl-6">
      <div class="card">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-light text-uppercase ls-1 mb-1">Total Maintenance</h6>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <!-- Chart wrapper -->
            <canvas id="myBarChartMaintenance" class="chart-canvas"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          Total Biaya Pengadaan
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="biayaPengadaan"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <!-- <div class="card">
        <div class="card-header">
          Total Biaya Maintenance
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="biayaMaintenance"></canvas>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</div>
@endsection