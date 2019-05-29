<?php if($payments[0]['status'] == '0'): ?>
<?php $status = 'UNPAID' ;$color = 'crimson'; $button='<button type="submit" class="btn btn-info float-right" style="transform:translateY(50%)"> PAY <i class="fa fa-chevron-right" style="margin-left:10px;"></i></button>'?>
<?php elseif($payments[0]['status'] == '1'):?>
<?php $status = 'PAID' ;$color='cornflowerblue'; $button=''?>
<?php elseif($payments[0]['status'] == '2'):?>
<?php $status = 'EXPIRED' ;$color='crimson'; $button='<button type="submit" class="btn btn-info float-right" style="transform:translateY(50%)"> PAY <i class="fa fa-chevron-right" style="margin-left:10px;"></i></button>'?>
<?php endif; ?>
                        
<div class="container-fluid" style="color:#333 !important">
    <div class="container" style="border-top:5px solid <?=$color?>;"></div>
    <br>
    <div id="printarea" class="container" style="background:#FFF;padding-bottom:20px; border-radius:5px;font-family:'Source Sans Pro', sans-serif !important;font-size:14px !important;">
        <div class="row" style="margin-bottom:10px; padding-bottom:30px; border-bottom:1px solid #ccc">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <img src="<?=base_url()?>assets/landing-page/img/logoN.png" class="rounded float-left" alt="Logo Neuthings" style="width:30%">
                    </div>
                    <div class="col-md-12">
                        <h4 style="font-weight:bold">Invoice #<?=$payments[0]['id_ads_pref']?><?=$payments[0]['id_payments']?></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12" style="margin-bottom:20px;">
                        <div class="col-md-3 float-right text-center" style="border:1px solid <?=$color?>; transform:translateY(50%);padding-top:10px">
                            <h3><?=$status?></h3>
                        </div>
                    </div>
                    <div class="col-md-12 float-right">
                        <form method="post" action="<?=base_url()?>pay" id="payment-form">
                            <input type="hidden" name="id_ads_pref" value="<?= $payments[0]['id_ads_pref']?>">
                            <input type="hidden" name="id_payments" value="<?= $payments[0]['id_payments']?>">
                            <?= $button ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom:30px; padding-bottom:30px;">
            <div class="col-md-4">
                Invoice To:
                <br><br>
                <p>
                    <?=
                    $userData['first_name'].' '.
                    $userData['last_name'].',<br>'.
                    $Adspref[0]['city'].', '.
                    $Adspref[0]['state'].'<br>'.
                    $Adspref[0]['country']
                    ?>
                </p>
            </div>
            <div class="col-md-4">
                Pay To:
                <br><br>
                <p>
                    Neuthings ID <br>
                    NPWP : 83.173.419.9-522.000 <br>
                    Telkom Regional I Sumatera <br>
                    Jl. Prof. HM. Yamin Sh No.2, Kesawan, Kec. Medan Bar., Kota Medan, Sumatera Utara 20236
                </p>               
            </div>
            <div class="col-md-4">
                Invoice Date:
                <br><br>
                <p>
                    <?= date('l, d F Y', strtotime($payments[0]['created_at']))?>
                </p>
                Due Date:
                <br><br>
                <p>
                    <?= date('l, d F Y', strtotime('+2 days', strtotime($payments[0]['created_at']))) ?>
                </p>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px; padding-bottom:30px;">
        <?php 
        $schedule = Schedules::where('id_schedule', $Adspref[0]['scheduling'])->get();
        $platform = Platforms::where('id_platform', $Adspref[0]['platform'])->get();
        $budget = Budgets::where('id_budget', $Adspref[0]['budget'])->get();
        ?>
            <table class="table" style="color:#333 !important;background:#FFF;padding-bottom:20px; border-radius:5px;font-family:'Source Sans Pro', sans-serif !important;font-size:14px !important;">
                <thead>
                    <tr>
                    <th scope="col" class="text-left">DESCRIPTION</th>
                    <th scope="col" class="text-right">AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">
                            <b>Title</b>: <?= $Adscont[0]['title'] ?> <br>
                            <b>Package</b>: <?= $budget[0]['budget_name']?><br>
                            <b>Schedule</b>: <?= $schedule[0]['schedule_name']?><br>
                            <b>Platform</b>: <?= $platform[0]['platform_name']?><br>
                            <b>Location</b>: <?= $Adspref[0]['city']?>, <?= $Adspref[0]['state']?>, <?= $Adspref[0]['country']?><br>
                        </td>
                        <td class="text-right" style="vertical-align:middle">Rp. <?= number_format($payments[0]['price'],0)?></td>
                    </tr>
                    <tr class="table-secondary">
                        <td class="text-left">
                            TOTAL
                        </td>
                        <td class="text-right" style="vertical-align:middle">Rp. <?= number_format($payments[0]['price'],0)?></td>
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