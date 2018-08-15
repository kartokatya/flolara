<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $fillable = ['title','name','image','description','slug','price','short_text','contentt','category','main'];
    protected $dates = ['created_at','updated_at'];



}
