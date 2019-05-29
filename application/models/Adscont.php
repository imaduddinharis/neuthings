<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Adscont extends Eloquent {

    protected $table = "ads_content"; // table name
    protected $fillable = ['id_ads_content', 
                            'id_ads_pref', 
                            'title',
                            'photo',
                            'adsclick'];
    public $timestamps = false;
}