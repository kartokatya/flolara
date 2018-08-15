<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\ProductCategory;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('admin.category.index',[
            'categories'=>$categories,
        ]);
    }
    /**
     * @param  Request  $request
     * @return Response
     */
    public function create(){
        $category=Category::all();
        return view('admin.category.create',[
            'category'=>$category
        ]);
    }

    public function createRequest(Request $request){
        try{
           $this->validate($request, [
                'title'=>'required|string|max:255',
                'name'=>'required|string|max:255',
                'description'=>'required'
            ]);
            $category = new Category();
            $category = $category->create([
                'title'=>$request->title,
                'name'=>$request->name,
                'description'=>$request->description,
                'slug'=>$request->slug,
                'parent_id'=>$request->parent_id,
            ]);

            $category->save();

            if($category){
               return redirect('/admin/category');
            }
            return back();
        }catch(ValidationException $e){
            Log::error($e->getMessage());
            return back()->with('error',$e->getMessage());
        }

    }

    public function edit($id){
        $categories=Category::all();
        $category = Category::find($id);
        if (!$category){
            return abort(404);
        }
        return view('admin.category.edit',[
            'category'=>$category,
            'categories'=>$categories,
        ]);
    }

    public function editRequest(Request $request,$id){
        try{
            $this->validate($request, [
                'title'=>'required|string|max:255',
                'name'=>'required|string|max:255',
                'description'=>'required'
            ]);
            $category = Category::find($id);

            if (!$category){
                return abort(404);
            }

            $category->title = $request->title;
            $category->name = $request->name;
            $category->description = $request->description;
            $category->slug = $request->slug;
            $category->parent_id = $request->parent_id;

            $category->save();

            if($category){
                return redirect('/admin/category');
            }
            return back();
        }catch(ValidationException $e){
            Log::error($e->getMessage());
            return back()->with('error',$e->getMessage());
        }

    }

    public function delete($id){
            $category = Category::find($id);
            $category->delete();
        $productCategory = new ProductCategory();
        $productCategory->where('category_id',$id)->delete();
            return back();
    }


}
