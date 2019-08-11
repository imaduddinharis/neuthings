<div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">List Ads</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">View Ads</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="row">
                                    <?php 
                                    if(count($Adspref)>0){
                                    foreach($Adspref as $key=>$val):
                                        $content = Adscont::where('id_ads_pref',$val->id_ads_pref)->get();
                                        $CI =& get_instance();
                                        $gets = $CI->getAdsApi($val->id_ads_pref);
                                        $getAdsApi = json_decode($gets);
                                        $status = 'Inactive';
                                        if($getAdsApi->data->isActive != 0){
                                            $status = 'Active';
                                        }
                                        ?>
                                    <div class="col-md-12 mb-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="<?= $content[0]['photo'] ?>" class="img-fluid" alt="" style="width:200px !important;height:130px !important;">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <h4><a href="<?=base_url()?>ads/detail/<?=$val->id_ads_pref?>"><?= $content[0]['title'] ?></a></h4>
                                                        <hr>
                                                        <p><i class="fa fa-eye"></i> <?=$getAdsApi->data->_view?> &emsp;<i class="fa fa-mouse-pointer"></i></i> <?=$getAdsApi->data->_click?>&emsp; Status: <?=$status?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; }else{?>
                                    <div class="col-md-12 text-center">
                                        <h6>No Ads Available</h6>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>