<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product=Product::all();
        return view('admin.product.index',[
            'products'=>$product,
        ]);
    }
    /**
     * @param  Request  $request
     * @return Response
     */
    public function create(){
        $category=Category::all();
        return view('admin.product.create',[
            'category'=>$category
        ]);
    }

    public function createRequest(Request $request){
        try{
            $this->validate($request, [
                'title'=>'required|string|max:255',
                'name'=>'required|string|max:255',
                'description'=>'required',
                'price'=>'required|integer',
            ]);
            $product = new Product();
            $product = $product->create([
                'contentt'=>$request->contentt,
                'title'=>$request->title,
                'name'=>$request->name,
                'description'=>$request->description,
                'price'=>$request->price,
                'slug'=>$request->slug,
                'short_text'=>$request->short_text,
                'image'=>$request->image,
                'category'=>$request->category,

            ]);
            $product->main=isset($request->main)?1:0;
            $product->save();

            if($product){
                $productCategory = new ProductCategory();
                $productCategory->create([
                    'product_id'=>$product->id,
                    'category_id'=>$product->category,
                ]);
                return redirect('/admin/product');
            }
            return back();
        }catch(ValidationException $e){
            Log::error($e->getMessage());
            return back()->with('error',$e->getMessage());
        }

    }

    public function edit($id){
        $product = Product::find($id);
        $category=Category::all();
        if (!$product){
            return abort(404);
        }
        return view('admin.product.edit',[
            'product'=>$product,
            'category'=>$category,
        ]);
    }

    public function editRequest(Request $request,$id){
        try{
            $this->validate($request, [
                'title'=>'required|string|max:255',
                'name'=>'required|string|max:255',
                'description'=>'required',
                'price'=>'required|integer'
            ]);
            $product = Product::find($id);


            if (!$product){
                return abort(404);
            }

            $product->title = $request->title;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->slug = $request->slug;
            $product->short_text=$request->short_text;
            $product->image=$request->image;
            $product->contentt=$request->contentt;
            $product->category=$request->category;

            $product->main=isset($request->main)?1:0;

            $product->save();

            if($product){
                $productCategory = ProductCategory::where('product_id',$product->id)->delete();
                $category = $request->category;
                $productCategory = new ProductCategory();
                $productCategory->create([
                    'product_id'=>$product->id,
                    'category_id'=>$product->category,
                ]);
                return redirect('/admin/product');
            }
            return back();
        }catch(ValidationException $e){
            Log::error($e->getMessage());
            return back()->with('error',$e->getMessage());
        }

    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        $productCategory = new ProductCategory();
        $productCategory->where('product_id',$id)->delete();
        return back();
    }


}
