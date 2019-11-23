<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','price','category_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function tags(){
        return $this->hasMany('App\ProductTag');
    }
    public function review(){
        return $this->hasMany('App\Review');
    }
    public function reaction(){
        return $this->hasMany('App\Reaction');
    }
     public function reviewAndRating(){
        return $this->hasMany('App\ProductReview');
    }
    public function average(){
        return $this->hasOne('App\ProductReview')->select('product_id',DB::raw('avg(rating) as averageRating'))->groupBy('product_id');
    }
     public function total_likes(){
        return $this->hasOne('App\Reaction')->select('product_id',DB::raw('sum(likes) as totalLikes'))->groupBy('product_id');
    }
    public function total_dislikes(){
        return $this->hasOne('App\Reaction')->select('product_id',DB::raw('sum(dislikes) as totalDislikes'))->groupBy('product_id');
    }
    
}
