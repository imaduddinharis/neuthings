<div class="container-fluid" style="margin-bottom:20px;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom:2px solid #CCC;">
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>ads/monitoring/<?=$Adspref[0]['id_ads_pref']?>">Monitoring</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?=base_url()?>ads/detail/<?=$Adspref[0]['id_ads_pref']?>">Ads Detail <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>ads/invoice/<?=$Adspref[0]['id_ads_pref']?>">Invoice</a>
        </li>
        </ul>
        <span class="navbar-text">
        <?php if($Adspref[0]['payment_status'] == 0){$status = 'Inactive';$statusColor = 'text-danger';}else if($Adspref[0]['payment_status'] == 1){$status = 'Active';$statusColor = 'text-primary';}else{$status = 'undefined';$statusColor = 'text-warning';}?>
        <b> Status : <span class="<?=$statusColor?>"><?=$status?></span> | <?=$Adscont[0]['title']?> </b>
        </span>
    </div>
    </nav>

    <label style="margin-top:20px;"> Title </label>
    <div class="card" >
    <div class="card-body">
        <?=$Adscont[0]['title']?>
    </div>
    </div>

    <label style="margin-top:20px;"> Languages </label>
    <div class="card" >
    <div class="card-body">
        <?=$Adspref[0]['languages']?>
    </div>
    </div>
    
    <?php 
        $schedule = Schedules::where('id_schedule', $Adspref[0]['scheduling'])->get();
        $platform = Platforms::where('id_platform', $Adspref[0]['platform'])->get();
        $budget = Budgets::where('id_budget', $Adspref[0]['budget'])->get();
    ?>
    <label style="margin-top:20px;"> Preference </label>
    <div class="card">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Location : <?=$Adspref[0]['city']?>, <?=$Adspref[0]['state']?>, <?=$Adspref[0]['country']?></li>
        <li class="list-group-item">Package : <?=$platform[0]['platform_name']?> - <?=$schedule[0]['schedule_name']?></li>
        <li class="list-group-item">Budget Ads : <?=$budget[0]['budget_name']?> - Rp. <?= number_format($Adspref[0]['price'])?></li> 
    </ul>
    </div>
    
    <?php 
        $adsclick = Adsclicks::where('id_ads_click', $Adscont[0]['adsclick'])->get();
    ?>
    <label style="margin-top:20px;"> Content </label>
    <div class="row">
        <div class="col">
            <div class="card">
            <div class="card-body text-center">
                <img src="<?=$Adscont[0]['photo']?>" alt="..." class="img-thumbnail"  style="height:250px" >
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Title : <?=$Adscont[0]['title']?></li>
                <li class="list-group-item">onClick Ads : <?=$adsclick[0]['ads_click_name']?></li>
                <li class="list-group-item">
                    <label><?=$adsclick[0]['ads_click_name']?></label>
                    <div class="card">
                        <?php if($Adscont[0]['adsclick']==1):?>
                        <ul class="list-group list-group-flush">
                            <?php $no=1?>
                            <?php $terms = Terms::where('id_ads_pref', $Adspref[0]['id_ads_pref'])->get();?>
                            <?php foreach($terms as $keyTerms=>$valueTerms):?>
                            <li class="list-group-item"><?=$no.'. '.$valueTerms->terms?></li>
                            <?php $no++;?>
                            <?php endforeach;?>
                        </ul>
                        <?php endif;?>
                    </div>
                </li>
            </ul>
            </div>
        </div>
    </div>
    
</div>