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
}
