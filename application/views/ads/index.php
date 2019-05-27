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
                                    <?php foreach($AdsPref as $key=>$val):
                                        $content = AdsCont::where('id_ads_pref',$val->id_ads_pref)->get();
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
                                                        <p><i class="fa fa-eye"></i> 156.000 &emsp;<i class="fa fa-mouse-pointer"></i></i> 50&emsp;</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                    <div class="col-md-12 text-center mt-5">
                                        <a href="#">See more..</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>