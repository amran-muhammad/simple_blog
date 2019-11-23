<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['name'];
     public function tags(){
        return $this->hasMany('App\ProductTag');
    }
   
}

