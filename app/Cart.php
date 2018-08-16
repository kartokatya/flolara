<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
protected $table = "cart";
    protected $fillable = ['product_id','user_id','quantity'];
    protected $dates = ['created_at','updated_at'];

    public function product($id){
        $product = Product::find($id);
        return ($product);
    }


}
