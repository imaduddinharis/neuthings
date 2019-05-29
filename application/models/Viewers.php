<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Viewers extends Eloquent {

    protected $table = "viewers_estimation"; // table name
    protected $fillable = ['id_viewers_estimation',
                            'price_start', 
                            'price_max',
                            'budget',
                            'estimation'];
    public $timestamps = false;
}