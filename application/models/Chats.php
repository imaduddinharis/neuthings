<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Chats extends Eloquent
{
    protected $table = 'chat';
    protected $fillable = ['chat_id', 
                            'sender', 
                            'receiver',
                            'message',
                            'cust'];
    public $timestamps = true;
}