<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; 
class BlogController extends Controller
{
    public function all_blog(Request $req)
    {
        $posts=Post::with('user','category')->get();
        return response()->json([
            'blogs'=>$posts
        ],200);
    }
}
