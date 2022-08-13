<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'patient_age', 'hospital_name', 'hospital_address', 'bags_num', 'details', 'latitude', 'longitude', 'city_id', 'blood_type_id', 'client_id');

    public function bloodType()
    {
        return $this->belongsTo('App\models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\models\City');
    }

    public function client()
    {
        return $this->belongsTo('App\models\Client');
    }

    public function notifications()
    {
        return $this->hasMany('App\models\Notification');
    }

}