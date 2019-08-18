<div class="container-fluid">

                <!-- Page Heading -->
                
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        
                        
                        <div class="card border-bottom-primary shadow h-100 py-2">
                            <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa fa-info-circle"></i> Failed to create the ads, please check your data then try again
                                <br> <small>If still failed to , so please call customer service</small>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div> -->
                            <div class="card-body">
                                <form method="post" action="<?=base_url()?>ads/put" enctype="multipart/form-data">

                                <!-- form preference -->
                                    <div class="row" id="form-preference">
                                        
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="Languages"><h3>Update Ads Preference</h3></label>
                                        </div>
                                        <!-- <div class="form-group col-md-12 col-sm-12">
                                            <label for="Languages">Languages</label>
                                            <input type="text" onInput="validationform1()"  class="form-control" name="languages" id="languages" value="<?=$formValue['languages']?>" required disabled>
                                        </div> -->
                                        <div class="form-group col-md-12 col-sm-12 mb-0">
                                            <label>Location Target</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <select class="form-control" id="city" onInput="validationform1()" name="city" required>
                                                <?php
                                                $kota = $kotas->data;
                                                foreach ($kota as $kts){
                                                    if($kts == $Adspref[0]['city']){
                                                        echo '<option value="'.$kts.'" selected>'.$kts.'</option>';
                                                    }else{
                                                        echo '<option value="'.$kts.'" >'.$kts.'</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <select class="form-control" id="state" onInput="validationform1()" name="state" required>
                                                <?php
                                                $witel = $witels->data;
                                                foreach ($witel as $wts){
                                                    if($wts == $Adspref[0]['state']){
                                                        echo '<option value="'.$wts.'" selected>'.$wts.'</option>';
                                                    }else{
                                                        echo '<option value="'.$wts.'" >'.$wts.'</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" onInput="validationform1()" id="country" class="form-control" name="country" placeholder="country" value="Indonesia" required disabled>
                                        </div>
                                        <div class="col-md-6 col-sm-12 form-group">
                                            <label for="scheduling">Scheduling</label>
                                            <select id="scheduling" class="form-control" name="scheduling" onInput="validationform1()" required>
                                                <option value="1">Daily Repeated</option>
                                                <option value="2">Weekly Repeated</option>
                                                <option value="3">Monthly Repeated</option>
                                            </select>
                                            <small class="form-text text-muted">define when you'd like your ads to appear</small>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="platform">Platform</label>
                                            <select id="platform" class="form-control" name="platform" onInput="validationform1()" required>
                                                <option value="1">@wifi.id Landing Page</option>
                                                <option value="2" disabled>MyIndihome (soon)</option>
                                                <option value="3" disabled>Blanja.com (soon)</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="title">Title</label>
                                            <input type="hidden" class="form-control" onInput="validationform2()" name="idads" id="idads" value="<?=$Adscont[0]['id_ads_pref']?>" required>
                                            <input type="text" class="form-control" onInput="validationform2()" name="title" id="title" placeholder="Product XYZ" value="<?=$Adscont[0]['title']?>" required>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="photo">Photo</label>
                                            <input type="file" class="form-control" name="photo" id="photo">
                                        </div>
                                        <div id="forminfo" class="form-group col-md-12 col-sm-12 hidden">
                                            <div class="col-md-12 col-sm-12">
                                                <!-- <input type="file" class="form-control" onInput="validationform2()" name="infographic" id="infographic"> -->
                                                <small class="form-text text-muted">under development</small>
                                                <small class="form-text text-muted">input file infographic</small>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-12 col-sm-12 text-left mt-3">
                                            <button class="btn btn-primary" name="update" id="update" style="float:right"> Update</button>
                                        </div>
                                    </div>

                                    <!-- end form content -->

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>