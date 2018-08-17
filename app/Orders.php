<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";
    protected $fillable = ['user_id','payment','sum','delivery','adress','phone'];
    protected $dates = ['created_at','updated_at'];
}
