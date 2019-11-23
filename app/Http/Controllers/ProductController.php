<?php

namespace App\Http\Controllers;
use App\Product;
use App\Review;
use App\ProductTag;
use App\Tag;
use App\Reaction;
use App\ProductReview;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     public function all_product () {
        return Product::with('category','tags.tag','average')->get();
    }
    //where category is same
     public function all_product_groupedbycategory ($id) {
        return Product::where('category_id',$id)->with('tags.tag','average')->get();
    }
    

    public function show_product ($id) {

        return Product::where('id',$id)->with('review')->first();
    }

    //show product review and rating
    public function show_product_long ($id) {

        return Product::where('id',$id)->with('reviewAndRating','reviewAndRating.user','tags.tag','total_likes','total_dislikes','reaction')->first();
    }
    //Add a review
    public function add_review(Request $request){
        $data = $request->all();
        return Review::create($data);
    }
   

    //update a review
     public function update_review(Request $request){
        $data = $request->all();

        return Review::where('id',$data['id'])->update($data);
    }
     //add review and rating
    
     public function add_review_rating(Request $request){
        $data = $request->all();

        return ProductReview::create($data);
    }
    //update a review and rating 
     public function update_review_rating(Request $request){
        $data = $request->all();

        return ProductReview::where('id',$data['id'])->update($data);
    }
     //delete a review and a ratng
     public function delete_review_rating(Request $request){
        $data = $request->all();
        return ProductReview::where('id',$data['id'])->delete();
    }
    //delete a review
     public function delete_review(Request $request){
        $data = $request->all();
        return Review::where('id',$data['id'])->delete();
    }
    

    
    public function storeProduct(Request $request){
        $data = $request->all();
        $tags = $data['tags'];
        unset($data['tags']);
        $product =  Product::create($data);
        $product_tags = [];
        if(sizeof($tags)>0){
            foreach ($tags as  $value) {
                $ob = [];
                $ob['product_id'] = $product->id;
                $ob['tag_id'] = $value;
                array_push($product_tags,$ob);
            }
            ProductTag::insert($product_tags);
        }
        return $product;
    }
    public function updateProduct(Request $request){
        $data = $request->all();
        $tags = $data['tags'];
        unset($data['tags']);
        unset($data['total_likes']);
        unset($data['reaction']);
        unset($data['total_dislikes']);
        unset($data['review_and_rating']);
        \Log::info($data);
        
        $product = Product::where('id',$data['id'])->update($data);



         $product_tags = [];
        if(sizeof($tags)>0){
            foreach ($tags as  $value) {
                $ob = [];
                $ob['product_id'] = $data['id'];
                $ob['tag_id'] = $value;
                array_push($product_tags,$ob);
            }
            ProductTag::where('product_id',$data['id'])->delete();
            ProductTag::insert($product_tags);
        }
        return $product;
    }
    public function delete_Product(Request $request){
        $data = $request->all();
        return Product::where('id',$data['id'])->delete();
    }  
    public function test(){
       
        return Tag::firstOrCreate(['name' => 'newTag']);
    }
}
