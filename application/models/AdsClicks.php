<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class AdsClicks extends Eloquent {

    protected $table = "ads_clicks"; // table name
    protected $fillable = ['id_ads_click',
                            'ads_click_name', 
                            'description'];
    public $timestamps = false;
}