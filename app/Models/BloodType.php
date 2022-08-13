<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model 
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');

    public function clients()
    {
        return $this->hasMany('App\models\Client');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\models\DonationRequest');
    }

    public function bloodTypeClients()
    {
        return $this->belongsToMany('App\models\Client');
    }

}