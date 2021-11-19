<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        $count = Post::count();
        return view('admin.news.show',compact('posts','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }
    public function show(Request $request)
    {
        $search_word = $request->search_word;
        $posts;
        $count;
        if($request->state!="null"){
            if($request->search_word !="null"){
                $posts = Post::where([
                            ["title","LIKE","%$request->search_word%"],
                            ['state','=',$request->state]
                        ])->orwhere([
                            ["content","LIKE","%$request->search_word%"],
                            ['state','=',$request->state]
                        ])->paginate(5);
                $count = Post::where([
                            ["title","LIKE","%$request->search_word%"],
                            ['state','=',$request->state]
                        ])->orwhere([
                            ["content","LIKE","%$request->search_word%"],
                            ['state','=',$request->state]
                        ])->count();
            }
            else{
                $posts = Post::where('state',"=",$request->state)->latest()->paginate(5);
                $count = Post::where('state',"=",$request->state)->count();
            }
        }
        else{
            if($request->search_word !="null"){
                $posts = Post::where("title","LIKE","%$request->search_word%")
                        ->orwhere("content","LIKE","%$request->search_word%")->paginate(5);
                $count = Post::where("title","LIKE","%$request->search_word%")
                        ->orwhere("content","LIKE","%$request->search_word%")->count();
            }
            else{
                $posts = Post::latest()->paginate(5);
                $count = Post::count();
            }
        }
        return view('admin.news.pagination_data',compact('posts','count'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);
        $news = new Post;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->state = $request->state;
        if($file = $request->file('upload-image')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/');
            if($file->move($target_path, $name)) {
               $news->image_url = '/uploads/'.$name;//If image saved success, image_url is assigned
            }
        }
        else{
            $news->image_url = '/images/lineup01.png';
        }
        $news->save();
        $url = url('/news/'.$news->id);
        return response()->json(['success'=>true,'url'=>$url,'id'=>$news->id]);
    }
    public function search(Request $request){
        if($request->state!=null){
            if($request->search_word!=null){
                $posts = Post::where('title','LIKE','%'.$request->title.'%')->orwhere('content','LIKE','%'.$request->content.'%').paginate(5);
                dd($posts);
                return view('admin.news.show',compact('$posts'));
            }
            else{
                $posts = Post::latest()->paginate(5);
                return view('admin.news.show',compact('$posts'));
            }
        }
    }
    public function destroy($id){
        Post::find($id)->delete();
        return response()->json(['success'=>true]);
    }
    public function edit($id){
        $post = Post::where('id',$id)->first();
        $url = url('/news/'.$post->id);
        return view('admin.news.edit',['post'=>$post,'url'=>$url]);
    }
    public function update(Request $request,$id){
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->state = $request->state;
        if($file = $request->file('upload-image')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/');
            if($file->move($target_path, $name)) {
               $post->image_url = '/uploads/'.$name;
            }
        }
        $post->timestamps = true;
        $post->save();
        return response()->json(['success'=>true]);
    }
}