<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Users extends Eloquent {

    protected $table = "users"; // table name
    protected $fillable = ['oauth_provider',
                            'oauth_uid', 
                            'first_name',
                            'last_name',
                            'email',
                            'password',
                            'gender',
                            'picture',
                            'link',
                            'privillege'
                        ];
    public $timestamps = false;
}