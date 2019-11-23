<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    
    protected $fillable=[
        'product_id','tag_id'
    ];
    public function tag(){
        return $this->belongsTo('App\Tag');
    }
     public function category(){
        return $this->belongsTo('App\Category');
    }

   
    
    //  public function products(){
    //     return $this->hasMany('App\Product','id','product_id');
    // }
    public function products(){
        return $this->belongsTo('App\Product','product_id','id');
    }
    public function average(){
        return $this->hasOne('App\ProductReview')->select('product_id',DB::raw('avg(rating) as averageRating'))->groupBy('product_id');
    }
}
