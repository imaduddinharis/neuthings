<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class AdsPref extends Eloquent {

    protected $table = "ads_preference"; // table name
    protected $fillable = ['id_ads_pref',
                            'email', 
                            'city', 
                            'state',
                            'country',
                            'budget',
                            'price',
                            'scheduling',
                            'active_package',
                            'platform',
                            'active_ads_package',
                            'payment_status',
                            'languages'];
    public $timestamps = false;
}