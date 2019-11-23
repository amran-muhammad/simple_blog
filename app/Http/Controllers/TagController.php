<?php

namespace App\Http\Controllers;
use App\Tag;
use App\ProductTag;
use Illuminate\Http\Request;

class TagController extends Controller
{
   public function allTag(){
        return Tag::all();
    }
    //where tag  is same
     public function all_product_groupedbytag ($id) {
        return ProductTag::where('tag_id',$id)->with('products.average','products.category')->get();
        // return ProductTag::where('tag_id',$id)->get();
    }
    public function storeTag(Request $request){
        $data = $request->all();
        return Tag::create($data);
    }
    public function updateTag(Request $request){
        $data = $request->all();
        \Log::info($data);
        return Tag::where('id',$data['id'])->update($data);
    }
    public function deleteTag(Request $request){
        $data = $request->all();
        return Tag::where('id',$data['id'])->delete();
    }
}
