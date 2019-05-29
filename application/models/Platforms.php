<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Platforms extends Eloquent {

    protected $table = "platforms"; // table name
    protected $fillable = ['id_platform',
                            'platform_name', 
                            'description'];
    public $timestamps = false;
}