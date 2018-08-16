<?php

namespace App\Http\Controllers\cart;

use App\Cart;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $categories=Category::all();
        $user = Auth::user()->id;
        $cart=Cart::where('user_id','=',$user)->get();
        $product = Product::all();
        return view('cart.index',[
            'cart'=>$cart,
            'product'=>$product,
            'categories'=>$categories,
        ]);
    }


    public function indexRequest(Request $request){

        $user = Auth::user()->id;
        $cart = Cart::where('user_id','=',$user)
            ->where('product_id','=',$request->id)->first();

        if(empty($cart)){
            $cart = new Cart();
            $cart = $cart->create([
                'product_id'=>$request->id,
                'user_id'=>$user,
                'quantity'=>1
            ]);
            $cart->save();
        }else{
            $cart->quantity++;
            $cart->save();
        }

    }
}


