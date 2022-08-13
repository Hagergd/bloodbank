<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model 
{

    protected $table = 'roles';
    public $timestamps = true;
    protected $fillable = array('name', 'guard_name');

    public function users()
    {
        return $this->hasMany('App\models\User');
    }

}