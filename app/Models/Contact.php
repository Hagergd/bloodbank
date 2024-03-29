<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model 
{

    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'email', 'subject', 'message', 'client_id');

    public function clients()
    {
        return $this->belongsTo('App\models\Client');
    }

}