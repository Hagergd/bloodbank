<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'donation_request_id');

    public function donationRequest()
    {
        return $this->belongsTo('App\models\DonationRequest');
    }

    public function clientNotifications()
    {
        return $this->belongsToMany('App\models\Client');
    }

}