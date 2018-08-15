<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    protected $table = "category";
    protected $fillable = ['title','name','description','slug','parent_id'];
    protected $dates = ['created_at','updated_at'];


    public function product(){
        return $this->belongsToMany(Product::class,'product_category','category_id','product_id');
    }

    public function categoryTree($categories,$pid,$slice="&nbsp"){
        $cat = $categories->where('parent_id','=',$pid);
        $slice=str_repeat ( $slice , 2 );
        foreach ($cat as $category){
            echo "<li>".$slice."<a href='".Route('catalog.index',['id'=>$category->slug])."'>".$category->name."</a></li>";
            $pid = $category->id;
            $this->categoryTree($categories,$pid,$slice);
        }
    }
}
