<div class="container-fluid" style="margin-bottom:20px;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom:2px solid #CCC;">
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="<?=base_url()?>ads/monitoring/<?=$Adspref[0]['id_ads_pref']?>">Monitoring <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>ads/detail/<?=$Adspref[0]['id_ads_pref']?>">Ads Detail</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>ads/invoice/<?=$Adspref[0]['id_ads_pref']?>">Invoice</a>
        </li>
        </ul>
        <span class="navbar-text">
        <?php if($Adspref[0]['payment_status'] == 0){$status = 'Inactive';$statusColor = 'text-danger';}else if($Adspref[0]['payment_status'] == 1){$status = 'Active';$statusColor = 'text-primary';}else{$status = 'undefined';$statusColor = 'text-warning';}?>
        <b> Status : <span class="<?=$statusColor?>"><?=$status?></span> | <?=$Adscont[0]['title']?> <a href="<?=base_url()?>ads/update/<?=$Adspref[0]['id_ads_pref']?>" style="color:cornflowerblue"><i class="fa fa-pen-square"></i></a></b>
        </span>
    </div>
    </nav>

    
    <!-- Content Row -->
    <div class="row" style="margin-top:25px;">

    <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-4 col-md-6 mb-4">
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
        </div> -->

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Impressions</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$ads->data->_impression?></div>
                </div>
                <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Clicks</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$ads->data->_click?></div>
                </div>
                <div class="col-auto">
                <i class="fas fa-mouse-pointer fa-2x text-gray-300"></i>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="col-xl-12 col-lg-7">
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

        <div class="col-xl-4 col-lg-5" style="display:none">
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

</div>