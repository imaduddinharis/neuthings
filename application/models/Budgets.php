<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Budgets extends Eloquent {

    protected $table = "budgets"; // table name
    protected $fillable = ['id_budget',
                            'budget_name', 
                            'description'];
    public $timestamps = false;
}