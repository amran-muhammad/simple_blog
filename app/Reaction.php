<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    protected $fillable =['product_id','user_id','likes','dislikes'];
     public function user(){
        return $this->belongsTo('App\User');
    }
    public function products(){
        return $this->belongsTo('App\Product','product_id','id');
    }
}
