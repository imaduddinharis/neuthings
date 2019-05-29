<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Terms extends Eloquent {

    protected $table = "terms"; // table name
    protected $fillable = ['id_terms',
                            'id_ads_pref', 
                            'terms'];
    public $timestamps = false;
}