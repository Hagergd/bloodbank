<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model 
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('name');

    public function cities()
    {
        return $this->hasMany('App\models\City');
    }

    public function clientGovernorate()
    {
        return $this->belongsToMany('App\models\Client');
    }

}