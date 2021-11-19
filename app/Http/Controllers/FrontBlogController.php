<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;
class FrontBlogController extends Controller
{
    //
    public function show($id)
    {
        $blog = Blog::where('id',$id)->first();
        $categories = Category::all();
        return view('blog-single', compact('blog','categories'));

    }
    public function index(){
        $blogs = Blog::latest()->paginate(10);
        $categories = Category::all();
        return view('blogs', compact('blogs','categories'));
    }
    public function recommend(){
        $blogs = Blog::where('recommended_flag','LIKE','1');
        $categories = Category::all();
        return view('blogs', compact('blogs','categories'));
    }
    public function category($id){
        $blogs = Blog::where('category','LIKE',$id)->paginate(10);
        $categories = Category::all();
        return view('blogs', compact('blogs','categories'));
    }
}
