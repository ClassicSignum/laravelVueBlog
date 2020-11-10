<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function add_category(Request $req){
            $this->validate($req,[
                'cat_name'=>'required|min:3|max:30'
            ]);
            $category = new Category();

            $category->cat_name=$req->cat_name;
            $category->save();
            return ['message'=>"ok"];
    }

    public function all_category(Request $req)
    {
        $categories = Category::all();
        return response()->json([
            "categories"=>$categories
        ],200);
    }
    public function delete_category(Request $req,$id)
    {
        $category= Category::find($id);
        $category->delete();
    }

    public function edit_category(Request $req,$id)
    {
        $category= Category::find($id);
        return response()->json([
            'category'=>$category
        ],200);
    }

    public function update_category(Request $req,$id)
    {    $this->validate($req,[
        'cat_name'=>'required|min:3|max:30'
        ]);
        $category= Category::find($id);
        $category->cat_name=$req->cat_name;
        $category->save();

    }
}
