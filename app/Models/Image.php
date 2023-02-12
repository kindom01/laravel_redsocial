<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    /* relacion one to many */
    public function commments(){
        return $this->hasMany('App\Comment');
    }

    /* one to many */
    public function likes(){
        return $this->hasMany('App\Like');
    }

    /* relacion many to one */
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
