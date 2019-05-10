<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-bottom-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Estimated Earnings</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-bottom-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Impressions</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">215,000</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-bottom-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Clicks</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">13,650</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-mouse-pointer fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Click Per Day</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-area">
          <canvas id="myAreaChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- Pie Chart -->
  <div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Gender</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-pie pt-4 pb-2">
          <canvas id="myPieChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">View Per Day</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-area">
          <canvas id="viewperday"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- Pie Chart -->
  <div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Age</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-pie pt-4 pb-2">
          <canvas id="age"></canvas>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="row">
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Ads Teratas</h6>  
        <small>Waktu menonton(menit) 28 hari terakhir</small>
      </div>
      <!-- Card Body -->
      <div class="card-body">

        <h4 class="small font-weight-bold">Nasionalisme dimata generasi muda<span class="float-right">27</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <h4 class="small font-weight-bold">Infinity Power Charger<span class="float-right">4</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <h4 class="small font-weight-bold">Iseoo.id - All event needs in one<span class="float-right">3</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 8%" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <h4 class="small font-weight-bold">[TECHNOCORNER2017] - Digital Art<span class="float-right">1</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 3%" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <a href="#">Lihat Lainnya</a>
      </div>
    </div>
  </div>
</div>



</div>
<!-- /.container-fluid -->

