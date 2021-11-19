<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Housing;
class HousingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $housings = Housing::latest()->paginate(5);
        $row_count = Housing::count();
  
        return view('admin.housing.list',compact('housings','row_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.housing.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $this->validate($request, [
                'title' => 'required',
            ]);
            $video_url = '';
            $voice_url = '';
            $featured_image_url = '';
            if($video_file = $request->file('video_file')){
                $name = time().time().'.'.$video_file->getClientOriginalExtension();
                $target_path = public_path('/uploads/housings/videos/');
                if($video_file->move($target_path, $name)) {
                   $video_url = '/uploads/housings/videos/'.$name;//If image saved success, image_url is assigned
                }
            }
            else{
                $video_url = 'https://assets.codepen.io/6093409/river.mp4';
            }
            if($voice_file = $request->file('voice_file')){
                $name = time().time().'.'.$voice_file->getClientOriginalExtension();
                $target_path = public_path('/uploads/housings/voices/');
                if($voice_file->move($target_path, $name)) {
                   $voice_url = '/uploads/housings/voices/'.$name;//If image saved success, image_url is assigned
                }
            }
            else{
                $voice_url = 'https://assets.codepen.io/6093409/river.mp4';
            }
            if($featured_image_file = $request->file('featured_image')){
                $name = time().time().'.'.$featured_image_file->getClientOriginalExtension();
                $target_path = public_path('/uploads/housings/featured-images');
                if($featured_image_file->move($target_path, $name)) {
                   $featured_image_url = '/uploads/housings/featured-images/'.$name;//If image saved success, image_url is assigned
                }
            }
            else{
                $featured_image_url = '/images/lineup01.png';
            }
            $ow_image_urls = array();
            if($request->hasFile('ow_images'))
             {

                foreach($request->file('ow_images') as $file)
                {
                    $name = time().'.'.$file->extension();
                    $file->move(public_path().'/uploads/housings/ow-images/', $name);
                    array_push($ow_image_urls,'/uploads/housings/ow-images/'.$name);
                }
             }
             else{
                array_push($ow_image_urls,'images/works_single.png');
             }
             $gallery_image_urls = array();
             if($request->hasFile('gallery_images'))
             {
                foreach($request->file('gallery_images') as $file)
                {
                    $name = time().'.'.$file->extension();
                    $file->move(public_path().'/uploads/housings/gallery-images/', $name);
                    array_push($gallery_image_urls,'/uploads/housings/gallery-images/'.$name);
                }
             }
             else{
                array_push($gallery_image_urls,'images/top_support.png');
             }
            $ow_urls = implode(',',$ow_image_urls);
            $gallery_urls = implode(',',$gallery_image_urls);
            $housing = new Housing;
            $housing->title = $request->title;
            $housing->public_status = $request->public_status?:'0';
            $housing->video_url = $video_url;
            $housing->voice_url = $voice_url;
            $housing->featured_image_url = $featured_image_url;
            $housing->book = $request->book?:'';
            $housing->url = $request->url_input;
            $housing->ow_image_urls = $ow_urls;
            $housing->gallery_image_urls = $gallery_urls;
            $housing->save();
            $url = url('/house/'.$housing->id);
            return response()->json(['success'=>true,'url'=>$url,'id'=>$housing->id]);
        }
        catch(exception $e){
            return parent::report($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $housing = Housing::find($id);
        return view('/house', 'housing');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $housing = Housing::find($id);
        return view('admin.housing.edit',compact('housing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $housing = Housing::find($id);
        $video_url = '';
        $voice_url = '';
        $featured_image_url = '';
        if($video_file = $request->file('video_file')){
            $name = time().time().'.'.$video_file->getClientOriginalExtension();
            $target_path = public_path('/uploads/housings/videos/');
            if($video_file->move($target_path, $name)) {
                $video_url = '/uploads/housings/videos/'.$name;//If image saved success, image_url is assigned
            }
        }
        else{
            $video_url = $housing->video_url;
        }
        if($voice_file = $request->file('voice_file')){
            $name = time().time().'.'.$voice_file->getClientOriginalExtension();
            $target_path = public_path('/uploads/housings/voices/');
            if($voice_file->move($target_path, $name)) {
                $voice_url = '/uploads/housings/voices/'.$name;//If image saved success, image_url is assigned
            }
        }
        else{
            $voice_url = $housing->voice_url;
        }
        if($featured_image_file = $request->file('featured_image')){
            $name = time().time().'.'.$featured_image_file->getClientOriginalExtension();
            $target_path = public_path('/uploads/housings/featured-images');
            if($featured_image_file->move($target_path, $name)) {
                $featured_image_url = '/uploads/housings/featured-images/'.$name;//If image saved success, image_url is assigned
            }
        }
        else{
            $featured_image_url = $housing->featured_image_url;
        }
        $ow_image_urls = array();
        $ow_urls = '';
        if($request->hasFile('ow_images'))
        {
            foreach($request->file('ow_images') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path().'/uploads/housings/ow-images/', $name);
                array_push($ow_image_urls,'/uploads/housings/ow-images/'.$name);
            }
            $ow_urls = implode(',',$ow_image_urls);
        }
        else{
            $ow_urls = $housing->ow_image_urls;
        }
        $gallery_image_urls = array();
        $gallery_urls = '';
        if($request->hasfile('gallery_images'))
        {
            foreach($request->file('gallery_images') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path().'/uploads/housings/gallery-images/', $name);
                array_push($gallery_image_urls,'/uploads/housings/gallery-images/'.$name);
            }
            $gallery_urls = implode(',',$gallery_image_urls);
        }
        else{
            $gallery_urls = $housing->gallery_image_urls;
        }
        $housing->title = $request->title;
        $housing->public_status = $request->public_status?:'0';
        $housing->video_url = $video_url;
        $housing->voice_url = $voice_url;
        $housing->featured_image_url = $featured_image_url;
        $housing->book = $request->book?:'';
        $housing->url = $request->url_input;
        $housing->ow_image_urls = $ow_urls;
        $housing->gallery_image_urls = $gallery_urls;
        $housing->save();
        $url = url('/house/'.$housing->id);
        return response()->json(['success'=>true,'id'=>$housing->id,'url'=>$url]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Housing::find($id)->delete();
        return response()->json(['success'=>true]);
    }
    public function search(Request $request){
        $posts;
        $row_count;
        if($request->public_status!="null"){
            if($request->search_word !="null"){
                $posts = Housing::where([
                            ["title","LIKE","%$request->search_word%"],
                            ['public_status','=',$request->public_status]
                        ])->paginate(5);
                $row_count = Housing::where([
                            ["title","LIKE","%$request->search_word%"],
                            ['public_status','=',$request->public_status]
                        ])->count();
                $housings = Housing::where([
                    ["title","LIKE","%$request->search_word%"],
                    ['public_status','=',$request->public_status]
                ])->paginate(5);
            }
            else{
                $housings = Housing::where('public_status',"=",$request->public_status)->latest()->paginate(5);
                $row_count = Housing::where('public_status',"=",$request->public_status)->count();
            }
        }
        else{
            if($request->search_word !="null"){
                $housings = Housing::where("title","LIKE","%$request->search_word%")->paginate(5);
                $row_count = Housing::where("title","LIKE","%$request->search_word%")->count();
            }
            else{
                $housings = Housing::latest()->paginate(5);
                $row_count = Housing::count();
            }
        }
        return view('admin.housing.pagination_data',compact('housings','row_count'));
    }
}
