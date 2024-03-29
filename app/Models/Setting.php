<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('notification_setting_text', 'about_app', 'phone', 'email', 'fb_link', 'tw_link', 'insta_link', 'whats_link', 'g_link');

}