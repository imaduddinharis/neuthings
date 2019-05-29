<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Payments extends Eloquent {

    protected $table = "payments"; // table name
    protected $fillable = ['id_payments',
                            'id_ads_pref', 
                            'price',
                            'status'];
    public $timestamps = false;
}