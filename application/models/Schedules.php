<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Schedules extends Eloquent {

    protected $table = "schedulings"; // table name
    protected $fillable = ['id_schedule',
                            'schedule_name', 
                            'description'];
    public $timestamps = false;
}