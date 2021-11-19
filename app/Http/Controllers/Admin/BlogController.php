<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Blog;
use App\Category;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        $blogs = Blog::latest()->paginate(5);
        $count = Blog::count();
        $categories = Category::all();
        return view('admin.blog.list',compact(['blogs','count','categories']));
    }
    public function updateOrder(Request $request){
        $datas = $request->order_list;
        foreach ($datas as $data){
            $id = $data["id"];
            $row = Category::find($id);
            $order_index = $data["order_index"];
            $row->order_index = $order_index;
            $row->save();
        }
        return response()->json(['success'=>true]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.blog.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            // 'author_name' => 'required'
        ]);
        //  request()->validate([
        //     'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        //  ]);
        //  request()->validate([
        //     'author_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        //  ]);
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->public_status = $request->public_status;
        $blog->author_name = $request->author_name;
        $blog->author_profile = $request->author_profile;
        $blog->category = $request->category;
        if($request->recommended_flag=='on'){
            $blog->recommended_flag = true;
        }
        else{
            $blog->recommended_flag = false;
        }
        if($file = $request->file('featured_image')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/blog/featured-image');
            if($file->move($target_path, $name)) {
               $blog->featured_image_url = '/uploads/blog/featured-image/'.$name;//If image saved success, image_url is assigned
            }
        }
        else{
            $blog->featured_image_url = '/uploads/no_image.png';
        }
        if($file = $request->file('author_image')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/blog/author-image');
            if($file->move($target_path, $name)) {
               $blog->author_image_url = '/uploads/blog/author-image/'.$name;//If image saved success, image_url is assigned
            }
        }
        else {
            $blog->author_image_url = '/uploads/no_image.png';
        }
        $blog->save();
        $url = url('/blog/'.$blog->id);
        return response()->json(['success'=>true,'url'=>$url,'id'=>$blog->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request){
        $blogs = Blog::latest()->paginate(5);
        $count = Blog::count();
        $categories = Category::all();
        return view('admin.blog.list',compact(['blogs','count','categories']));
    }
    public function search(Request $request)
    {
        $blogs = null;
        $count = 0;
        $category_lists = [];
        if($request->category_query!="null"){
            $category_lists = explode(',',$request->category_query);
        }
        if( $request->search_word!="null" ){
            $blogs = Blog::where("title","LIKE","%$request->search_word%");
        }
        if( $request->author_name!="null" ){
            if( $blogs == null ) {
                $blogs = Blog::where('author_name',"LIKE","%$request->author_name%");
            }
            else{
                $blogs = $blogs->where('author_name',"LIKE","%$request->author_name%");
            }
        }
        if(count($category_lists)>0){
            if($blogs == null){
                $blogs = Blog::whereIn('category',$category_lists);
            }
            else{
                $blogs = $blogs->whereIn('category',$category_lists);
            }
        }
        if( $request->recommended_flag!="null" ){
            if( $blogs == null ) {
                $blogs = Blog::where('recommended_flag',"=",$request->recommended_flag);
            }
            else{
                $blogs = $blogs->where('recommended_flag',"=",$request->recommended_flag);
            }
        }
        
        if($request->public_status!="null"){
            if( $blogs == null ){
                $blogs = Blog::where('public_status',"=",$request->public_status);
            }
            else{
                $blogs = $blogs->where('public_status',"=",$request->public_status);
            }
        }
        if( $blogs == null ){
            $count = Blog::count();
            $blogs = Blog::latest()->paginate(5);
        }
        else{
            $count = $blogs->count();
            $blogs = $blogs->latest()->paginate(5);
        }
        // $blogs = Blog::latest()->paginate(5);
        $categories = Category::all();
        return view('admin.blog.pagination_data',compact('blogs','categories','count'));
    }
    public function category(Request $request){
        $categories = Category::orderBy('order_index','ASC')->get();
        return view('admin.blog.category',compact('categories'));
    }
    public function categoryAdd(Request $request){
        $this->validate($request,[
            'name_input'=>'required'
        ]);
        $category  = new Category;
        $max_order = Category::max('order_index');
        $category->order_index = $max_order + 1;
        $category->name = $request->name_input;
        $category->save();
        return redirect('/admin/blog_category');
    }
    public function categoryUpdate(Request $request,$id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return response()->json(['success'=>true,'name'=>$category->name]);
    }
    public function categoryDelete(Request $request,$id){
        Category::find($id)->delete();
        return response()->json(['success'=>true]);
    }
    public function categoryEdit(Request $request,$id){
        $category = Category::where('id',$id)->first();
        return view('admin.blog.category-edit',compact('category'));
    }
        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = Blog::where('id',$id)->first();
        $categories = Category::all();
        return view('admin.blog.edit',compact('blog','categories'));
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
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->public_status = $request->public_status;
        $blog->author_name = $request->author_name;
        $blog->author_profile = $request->author_profile;
        $blog->category = $request->category;
        if($request->recommended_flag=='on'){
            $blog->recommended_flag = '1';
        }
        else{
            $blog->recommended_flag = '0';
        }
        if($file = $request->file('featured_image')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/blog/featured-image');
            if($file->move($target_path, $name)) {
               $blog->featured_image_url = '/uploads/blog/featured-image/'.$name;//If image saved success, image_url is assigned
            }
        }
        else{
            $blog->featured_image_url = $blog->featured_image_url;
        }
        if($file = $request->file('author_image')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/blog/author-image');
            if($file->move($target_path, $name)) {
               $blog->author_image_url = '/uploads/blog/author-image/'.$name;//If image saved success, image_url is assigned
            }
        }
        else{
            $blog->author_image_url = $blog->author_image_url;
        }
        $blog->save();
        return response()->json(['success'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        return response()->json(['success'=>true]);
    }
}
