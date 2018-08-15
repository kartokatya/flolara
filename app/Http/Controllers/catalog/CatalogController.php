<?php

namespace App\Http\Controllers\catalog;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class catalogController extends Controller
{
    public function index($slug){
        $category = Category::all();
        $thisCat = Category::where('slug','=',$slug)->first();
        return view('catalog.index',[
            'category'=>$category,
            'thisCat'=>$thisCat,
        ]);
    }

    public function good($slug){
        $category = Category::all();
        $product = Product::where('slug','=',$slug)->first();
        return view('catalog.good',[
            'category'=>$category,
            'product'=>$product,
        ]);
    }
}

