<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class AdsCont extends Eloquent {

    protected $table = "ads_content"; // table name
    protected $fillable = ['id_ads_content', 
                            'id_ads_pref', 
                            'title',
                            'photo',
                            'adsclick'];
    public $timestamps = false;
}