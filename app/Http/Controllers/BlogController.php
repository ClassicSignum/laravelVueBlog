<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; 
use App\Category; 
use Illuminate\Support\Facades\DB;
class BlogController extends Controller
{
    public function all_blog(Request $req)
    {
        $posts=Post::with('user','category')->get();
        return response()->json([
            'blogs'=>$posts
        ],200);
    }
    public function single_blog(Request $req,$id)
    {
        $post=Post::with('user','category')->where('id',$id)->first();
        return response()->json([
            'blog'=>$post
        ],200);
    }
    public function all_categories(Request $req)
    {
        $categories=Category::all();
        $postcount=DB::table('posts')->select('cat_id', DB::raw('count(*) as post_count'))
                    ->GroupBy('cat_id')
                    ->orderBy('cat_id','DESC')
                    ->get();
        
        return response()->json([
            'categories'=>$categories,
             'postcount'=>$postcount
        ],200);
    }
    public function blogs_by_category(Request $req,$id)
    {
        $posts=Post::with('user','category')->where('cat_id',$id)->get();
        return response()->json([
            'blogs'=>$posts
        ],200);
    }

    public function search_post(Request $req,$keyword)
    {
        $posts=Post::with('user','category')
                    ->where('title','LIKE',"%$keyword%")
                    ->orWhere('description','LIKE',"%$keyword%")
                    ->get();
                    // echo $posts;
        return response()->json([
            'posts'=>$posts
        ],200);
    }

}
