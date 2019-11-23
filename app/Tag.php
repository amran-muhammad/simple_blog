<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    public function products(){
        return $this->hasMany('App\Product');
    }
}
