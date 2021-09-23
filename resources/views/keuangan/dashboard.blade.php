@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-xl-6">
      <div class="card">
        <div class="card-body">
          <canvas id="myBarChart" class="chart-canvas"></canvas>
        </div>
      </div>
    </div>
    <div class="col-xl-6">
      <div class="card">
        <div class="card-body">
          <canvas id="myBarChartMaintenance" class="chart-canvas"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <canvas id="biayaPengadaan"></canvas>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">
          <canvas id="biayaMaintenance"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection