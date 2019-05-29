<div class="container-fluid" style="color:#333 !important">
    <div class="container" style="border-top:5px solid cornflowerblue;"></div>
    <br>
    <div id="printarea" class="container" style="background:#FFF;padding-bottom:20px; border-radius:5px;font-family:'Source Sans Pro', sans-serif !important;font-size:14px !important;">
    <img src="<?=base_url()?>assets/landing-page/img/dap.png" style="position:absolute;height:400px;right:150px;">
        <div class="row" style="margin-bottom:10px; padding-bottom:20px; padding-top:20px; border-bottom:1px solid #ccc">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <img src="<?=base_url()?>assets/landing-page/img/dap.png" class="rounded float-left" alt="Logo Neuthings" style="width:30%"> -->
                    </div>
                    <div class="col-md-12">
                        <h4 style="font-weight:bold">Invoice #110419</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12" style="margin-bottom:20px;">
                        <!-- <div class="col-md-3 float-right text-center" style="border:1px solid cornflowerblue; transform:translateY(50%);padding-top:10px">
                            <h3><?=$status?></h3>
                        </div> -->
                    </div>
                    <div class="col-md-12 float-right">
                        <!-- <form method="post" action="<?=base_url()?>pay" id="payment-form">
                            <input type="hidden" name="id_ads_pref" value="<?= $payments[0]['id_ads_pref']?>">
                            <input type="hidden" name="id_payments" value="<?= $payments[0]['id_payments']?>">
                            <?= $button ?>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom:30px; padding-bottom:30px;">
            <div class="col-md-3 text-left">
                Invoice To:
                <br><br>
                <p>
                    Neuthings ID <br>
                    Telkom Regional I Sumatera <br>
                    Jl. Prof. HM. Yamin Sh No.2, Kesawan, Kec. Medan Bar., Kota Medan, Sumatera Utara 20236
                </p>
            </div>
            <div class="col-md-3 text-left">
                Pay To:
                <br><br>
                <p>
                    Digital Art Project <br>
                    Jl. Sukabirus Universitas Telkom RT. 06 RW. 15, Desa Citereup, Kecamatan Dayeuhkolot, Bandung 40257
                </p>               
            </div>
            <div class="col-md-4">
                <!-- Invoice Date:
                <br><br>
                <p>
                    <?= date('l, d F Y', strtotime($payments[0]['created_at']))?>
                </p>
                Due Date:
                <br><br>
                <p>
                    <?= date('l, d F Y', strtotime('+2 days', strtotime($payments[0]['created_at']))) ?>
                </p> -->
            </div>
        </div>
        <div class="row" style="margin-bottom:10px; padding-bottom:30px;">
        <?php 
        $schedule = Schedules::where('id_schedule', $Adspref[0]['scheduling'])->get();
        $platform = Platforms::where('id_platform', $Adspref[0]['platform'])->get();
        $budget = Budgets::where('id_budget', $Adspref[0]['budget'])->get();
        ?>
            <table class="table" style="color:#333 !important;background:transparent !important;padding-bottom:20px; border-radius:5px;font-family:'Source Sans Pro', sans-serif !important;font-size:14px !important;">
                <thead>
                    <tr>
                    <th scope="col" class="text-left">DESCRIPTION</th>
                    <th scope="col" class="text-right">AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">
                            Web-Based Application (neuthings.id)
                        </td>
                        <td class="text-right" style="vertical-align:middle">Rp. <?= number_format('20000000',0)?></td>
                    </tr>
                    <tr class="table-secondary">
                        <td class="text-left">
                            TOTAL
                        </td>
                        <td class="text-right" style="vertical-align:middle">Rp. <?= number_format('20000000',0)?></td>
                    </tr>
                </tbody>
            </table>
            <table class="table" style="color:#333 !important;background:transparent !important;padding-bottom:20px; border-radius:5px;font-family:'Source Sans Pro', sans-serif !important;font-size:14px !important;">
                <thead>
                    <tr>
                    <th scope="col" class="text-left">PAID</th>
                    <th scope="col" class="text-left">DATE</th>
                    <th scope="col" class="text-right">AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">
                            DP
                        </td>
                        <td class="text-left">
                            11 April 2019
                        </td>
                        <td class="text-right" style="vertical-align:middle">Rp. <?= number_format('5000000',0)?></td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            DP
                        </td>
                        <td class="text-left">
                            29 April 2019
                        </td>
                        <td class="text-right" style="vertical-align:middle">Rp. <?= number_format('5000000',0)?></td>
                    </tr>
                    <tr class="table-secondary">
                        <td class="text-left" colspan="2">
                            TOTAL
                        </td>
                        <td class="text-right" style="vertical-align:middle">Rp. <?= number_format('10000000',0)?></td>
                    </tr>
                    <tr class="table-secondary">
                        <td class="text-left" colspan="2">
                            UNPAID
                        </td>
                        <td class="text-right" style="vertical-align:middle">- Rp. <?= number_format('10000000',0)?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container" style="margin-bottom:30px; padding-bottom:10px; padding-top:10px;">
        <div class="col-md-12 text-center">
            <a href="<?=base_url()?>ads/detail/<?=$payments[0]['id_ads_pref']?>" style="margin-right:20px;"><i class="fa fa-chevron-left"></i> Back to Ads </a>
            <a href="#" id="printbtn"><i class="fa fa-print"></i> Print </a>
        </div>
    </div>
</div>