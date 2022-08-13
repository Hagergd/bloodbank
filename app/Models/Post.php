<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'content', 'category_id','is_favourite');

    public function category()
    {
        return $this->belongsTo('App\models\Category');
    }

    public function clients()
    {
        return $this->belongsToMany('App\models\Client');
    }

}