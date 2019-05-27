<div class="container-fluid" style="margin-bottom:20px;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom:2px solid #CCC;">
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>ads/monitoring/<?=$AdsPref[0]['id_ads_pref']?>">Monitoring</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>ads/detail/<?=$AdsPref[0]['id_ads_pref']?>">Ads Detail</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?=base_url()?>ads/invoice/<?=$AdsPref[0]['id_ads_pref']?>">Invoice <span class="sr-only">(current)</span></a>
        </li>
        </ul>
        <span class="navbar-text">
        Neuthings | <?=$AdsCont[0]['title']?>
        </span>
    </div>
    </nav>

    <div class="container" style="margin-top:20px;">
        <div class="row">
            <div class="col-md-12" style="margin-bottom:15px;">
                <ul class="list-group list-group-horizontal-md">
                    <li class="list-group-item list-group-item-primary">PAID <?=$paid?></li>
                    <li class="list-group-item list-group-item-warning">UNPAID <?=$unpaid?></li>
                    <li class="list-group-item list-group-item-danger">EXPIRED <?=$expired?></li>
                </ul>
            </div>
            <div class="col-md-12">
                <table id="table-invoice" class="table table-bordered table-striped table-hover tabledata" style="width:100% !important;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" >Invoice</th>
                            <th scope="col" >Invoice Date</th>
                            <th scope="col" >Due Date</th>
                            <th scope="col" >Total</th>
                            <th scope="col" >Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($payments as $key=>$value):?>
                        <?php if($value->status == '0'): ?>
                        <?php $status = 'unpaid' ;$style = 'class="table-warning"'?>
                        <?php elseif($value->status == '1'):?>
                        <?php $status = 'paid' ;$style='class="table-primary"'?>
                        <?php elseif($value->status == '2'):?>
                        <?php $status = 'expired' ;$style='class="table-danger"'?>
                        <?php endif; ?>
                        <tr <?= $style ?>>
                            <td>#<?= $value->id_ads_pref.$value->id_payments ?></td>
                            <td><?= date('d F Y', strtotime($value->created_at))?></td>
                            <td><?= date('d F Y', strtotime('+30 days', strtotime($value->created_at))) ?></td>
                            <td><?= $value->price?></td>
                            <td><?= $status ?> <a href="<?=base_url()?>ads/invoice/detail/<?=$value->id_ads_pref?>/<?=$value->id_payments?>"><span id="chevright"><i class="fa fa-chevron-right"></i></span></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>

</div>