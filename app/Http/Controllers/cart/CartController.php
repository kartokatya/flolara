<?php

namespace App\Http\Controllers\cart;

use App\Cart;
use App\Category;
use App\Mail\Order;
use App\Orders;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function delete($id){
        $cart = Cart::find($id);
        $cart->delete();
        return back();
    }


    public function checkout(){
        $categories=Category::all();
        return view('cart/checkout',[
            'categories'=>$categories,
        ]);
    }


    public function checkoutRequest(Request $request){
        try{
        $user = Auth::user()->id;

        $this->validate($request, [
            'payment'=>'required|string|max:255',
            'delivery'=>'required|string|max:255',
            'adress'=>'required|string|max:255',
            'phone'=>'required|string|max:255',
        ]);

        $order = new Orders();
        $order = $order->create([
            'payment'=>$request->payment,
            'delivery'=>$request->delivery,
            'user_id'=>$user,
            'adress'=>$request->adress,
            'phone'=>$request->phone,
            'sum'=>1000,
        ]);

        $order->save();

        $cart = Cart::where('user_id','=',$user);
        $cart_send=Cart::where('user_id','=',$user)->get();
            \Mail::to('kartokatya@gmail.com')->send(new Order(Auth::user(), $order, $cart_send));
        $cart->delete();
        return redirect('/cart');
        }catch (ValidationException $e){
           Log::error($e->getMessage());
            return back()->with('error',$e->getMessage());
        }

    }
}


