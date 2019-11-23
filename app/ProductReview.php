<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
     protected $fillable =['comment','product_id','user_id','rating'];
     public function user(){
        return $this->belongsTo('App\User');
    }
}

