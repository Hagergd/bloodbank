<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'password', 'd_o_b', 'email', 'last_donation_date', 'pin_code', 'blood_type_id', 'city_id','is_active');

    public function bloodType()
    {
        return $this->belongsTo('App\models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\models\City');
    }

    public function posts()
    {
        return $this->belongsToMany('App\models\Post');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\models\DonationRequest');
    }

    public function clientNotification()
    {
        return $this->belongsToMany('App\models\Notification');
    }

    public function bloodTypeClients()
    {
        return $this->belongsToMany('App\models\BloodType');
    }

    public function clientGovernorate()
    {
        return $this->belongsToMany('App\models\Governorate');
    }

    public function clientTokens()
    {
        return $this->hasMany('App\models\Token');
    }

    public function clientContacts()
    {
        return $this->hasMany('App\models\Contact');
    }

}