<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $category=Category::all();
        return view('home',[
          // 'category'=>$category ,
        ]);
    }

    public function  welcome(){
        $category=Category::all();
        $products=Product::get()->where('main','==',1);
        return view('welcome',[
            'category'=>$category ,
            'products'=>$products,
        ]);
    }

}
