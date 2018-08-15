<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = "product_category";
    protected $fillable = ['product_id','category_id'];
    protected $dates = ['created_at','updated_at'];
}
