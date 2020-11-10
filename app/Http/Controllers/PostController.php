<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;
use Image;

class PostController extends Controller
{
    //
    public function index(Request $req){

    }
    public function all_post(Request $req){
        $posts=Post::with('user','category')->get();
        return response()->json([
            'posts'=>$posts
        ],200);
    }
    public function add_post(Request $req)
    {
        $this->validate($req,[
            'title'=>'required|min:3|max:30',
            'description'=>'required|min:10|max:200',
            
            ]);
            
            $strpos=strpos($req->photo,';');
            $sub = substr($req->photo,0,$strpos);
            $ex = explode("/",$sub)[1];
            $name=time().".".$ex;
            $img = Image::make($req->photo)->resize(300, 200);

            $uploadpath = public_path()."/images/";
            $img->save($uploadpath.$name);

            $post = new Post();
            $post->title=$req->title;
            $post->description=$req->description;
            $post->cat_id=$req->cat_id;
            $post->user_id='9';
            $post->photo=$name;
            $post->save();
        


    }

    public function delete_post(Request $req,$id)
    {
        $post = Post::find($id);
        $image_path = public_path()."/images/";
        $image = $image_path.$post->photo;
        if(file_exists($image)){
            @unlink($image);
        }
        $post->delete();

    }

    public function edit_post(Request $req,$id)
    {
        $post=Post::find($id);

        return response()->json([
            'post'=>$post
        ],200);
    }

    public function update_post(Request $req,$id)
    {
        $this->validate($req,[
            'title'=>'required|min:3|max:30',
            'description'=>'required|min:10|max:200',
            
            ]);
            
            $post = Post::find($id);
            if($req->photo!=$post->photo){

                $image_path = public_path()."/images/";
                $image = $image_path.$post->photo;
                if(file_exists($image)){
                    @unlink($image);
                }
                $strpos=strpos($req->photo,';');
                $sub = substr($req->photo,0,$strpos);
                $ex = explode("/",$sub)[1];
                $name=time().".".$ex;
                $img = Image::make($req->photo)->resize(300, 200);
    
                $uploadpath = public_path()."/images/";
                $img->save($uploadpath.$name);
            }
            else{
                $name=$post->photo;
            }



       

        $post->title=$req->title;
        $post->description=$req->description;
        $post->cat_id=$req->cat_id;
        $post->user_id='9';
        $post->photo=$name;
        $post->save();


    }




}
