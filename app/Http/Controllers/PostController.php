<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    //
    public function index(Request $req){

    }
    public function all_post(Request $req){
        $posts=Post::with('category','user')->get();
        return $posts;
    }
}
