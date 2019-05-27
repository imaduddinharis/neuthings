<div class="container-fluid" style="margin-bottom:20px;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom:2px solid #CCC;">
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>ads/monitoring/<?=$AdsPref[0]['id_ads_pref']?>">Monitoring</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?=base_url()?>ads/detail/<?=$AdsPref[0]['id_ads_pref']?>">Ads Detail <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>ads/invoice/<?=$AdsPref[0]['id_ads_pref']?>">Invoice</a>
        </li>
        </ul>
        <span class="navbar-text">
        Neuthings | <?=$AdsCont[0]['title']?>
        </span>
    </div>
    </nav>

    <label style="margin-top:20px;"> Title </label>
    <div class="card" >
    <div class="card-body">
        <?=$AdsCont[0]['title']?>
    </div>
    </div>

    <label style="margin-top:20px;"> Languages </label>
    <div class="card" >
    <div class="card-body">
        <?=$AdsPref[0]['languages']?>
    </div>
    </div>
    
    <?php 
        $schedule = Schedules::where('id_schedule', $AdsPref[0]['scheduling'])->get();
        $platform = Platforms::where('id_platform', $AdsPref[0]['platform'])->get();
        $budget = Budgets::where('id_budget', $AdsPref[0]['budget'])->get();
    ?>
    <label style="margin-top:20px;"> Preference </label>
    <div class="card">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Location : <?=$AdsPref[0]['city']?>, <?=$AdsPref[0]['state']?>, <?=$AdsPref[0]['country']?></li>
        <li class="list-group-item">Package : <?=$platform[0]['platform_name']?> - <?=$schedule[0]['schedule_name']?></li>
        <li class="list-group-item">Budget Ads : <?=$budget[0]['budget_name']?> - Rp. <?= number_format($AdsPref[0]['price'])?></li> 
    </ul>
    </div>
    
    <?php 
        $adsclick = AdsClicks::where('id_ads_click', $AdsCont[0]['adsclick'])->get();
    ?>
    <label style="margin-top:20px;"> Content </label>
    <div class="row">
        <div class="col">
            <div class="card">
            <div class="card-body text-center">
                <img src="<?=$AdsCont[0]['photo']?>" alt="..." class="img-thumbnail"  style="height:250px" >
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Title : <?=$AdsCont[0]['title']?></li>
                <li class="list-group-item">onClick Ads : <?=$adsclick[0]['ads_click_name']?></li>
                <li class="list-group-item">
                    <label><?=$adsclick[0]['ads_click_name']?></label>
                    <div class="card">
                        <?php if($AdsCont[0]['adsclick']==1):?>
                        <ul class="list-group list-group-flush">
                            <?php $no=1?>
                            <?php $terms = Terms::where('id_ads_pref', $AdsPref[0]['id_ads_pref'])->get();?>
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