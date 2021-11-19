<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Area;
use App\HouseType;
use App\Amount;
use App\Result;
class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $areas = Area::all();
        $amounts = Amount::all();
        $housetypes = HouseType::all();
        $count = Result::count();
        $results = DB::table('results')
            ->join('areas','results.area_id','=','areas.id')
            ->join('amounts','results.amount_id','=','amounts.id')
            ->join('house_types','results.housetype_id','=','house_types.id')
            ->select('results.id','areas.name','house_types.type','amounts.type','results.title','results.public_status')
            ->paginate(5);
        return view('admin.results.list',compact('results','amounts','areas','housetypes','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $amounts = Amount::all();
        $areas = Area::all();
        $housetypes = HouseType::all();
        return view('admin.results.create',compact('areas','housetypes','amounts'));
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
            'title' => 'required'
        ]);
         request()->validate([
            'firstview' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);
        $result = new Result;
        $result->title = $request->title;
        $result->public_status = $request->public_status;
        $result->area_id = $request->area;
        $result->amount_id=$request->amount;
        $result->housetype_id = $request->housetype;
        $result->instructor_name = $request->instructor_name;
        $result->instruction_summary = $request->instruction_summary;
        $result->instruction_effects = $request->instruction_effects;
        $result->instruction_details = $request->instruction_details;
        $result->choosing_reason = $request->choosing_reason;
        $result->post_introduction_details = $request->post_introduction_details;
        $result->future_outlook_details = $request->future_outlook_details;
        $result->url = $request->url;
        
        if($file = $request->file('eyecatch_image')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/results/eyecatch_images');
            if($file->move($target_path, $name)) {
               $result->eyecatch_image_url = '/uploads/results/eyecatch_images/'.$name;//If image saved success, image_url is assigned
            }
        }
        if($file = $request->file('firstview')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/results/firstviews');
            if($file->move($target_path, $name)) {
               $result->firstview_url = '/uploads/results/firstviews/'.$name;//If image saved success, image_url is assigned
            }
        }
        if($file = $request->file('instruction_bg')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/results/instruction_backgrounds');
            if($file->move($target_path, $name)) {
               $result->instruction_bg_url = '/uploads/results/instruction_backgrounds/'.$name;//If image saved success, image_url is assigned
            }
        }
        if($file = $request->file('choosing_reason_file')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/results/choosing_reason_images');
            if($file->move($target_path, $name)) {
               $result->choosing_reason_url = '/uploads/results/choosing_reason_images/'.$name;//If image saved success, image_url is assigned
            }
        }
        if($file = $request->file('pi_image')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/results/post_introduction_images');
            if($file->move($target_path, $name)) {
               $result->post_introduction_url = '/uploads/results/post_introduction_images/'.$name;//If image saved success, image_url is assigned
            }
        }
        if($file = $request->file('download_material')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/results/download_materials');
            if($file->move($target_path, $name)) {
               $result->download_material_url = '/uploads/results/download_materials/'.$name;//If image saved success, image_url is assigned
            }
        }
        $result->save();
        $url = url('/case_study/'.$result->id);
        return response()->json(['success'=>true,'id'=>$result->id,'url'=>$url]);
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
        $result = Result::where('id',$id)->first();
        $amounts = Amount::all();
        $areas = Area::all();
        $housetypes = HouseType::all();
        return view('admin.results.edit',compact('result','amounts','areas','housetypes'));
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
        $this->validate($request, [
            'title' => 'required'
        ]);
         request()->validate([
            'firstview' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);
        $result = Result::find($id);
        $result->title = $request->title;
        $result->public_status = $request->public_status;
        $result->area_id = $request->area;
        $result->amount_id=$request->amount;
        $result->housetype_id = $request->housetype;
        $result->instructor_name = $request->instructor_name;
        $result->instruction_summary = $request->instruction_summary;
        $result->instruction_effects = $request->instruction_effects;
        $result->instruction_details = $request->instruction_details;
        $result->choosing_reason = $request->choosing_reason;
        $result->post_introduction_details = $request->post_introduction_details;
        $result->future_outlook_details = $request->future_outlook_details;
        $result->url = $request->url;
        
        if($file = $request->file('eyecatch_image')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/results/eyecatch_images');
            if($file->move($target_path, $name)) {
               $result->eyecatch_image_url = '/uploads/results/eyecatch_images/'.$name;//If image saved success, image_url is assigned
            }
        }
        if($file = $request->file('firstview')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/results/firstviews');
            if($file->move($target_path, $name)) {
               $result->firstview_url = '/uploads/results/firstviews/'.$name;//If image saved success, image_url is assigned
            }
        }
        if($file = $request->file('instruction_bg')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/results/instruction_backgrounds');
            if($file->move($target_path, $name)) {
               $result->instruction_bg_url = '/uploads/results/instruction_backgrounds/'.$name;//If image saved success, image_url is assigned
            }
        }
        if($file = $request->file('choosing_reason_file')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/results/choosing_reason_images');
            if($file->move($target_path, $name)) {
               $result->choosing_reason_url = '/uploads/results/choosing_reason_images/'.$name;//If image saved success, image_url is assigned
            }
        }
        if($file = $request->file('pi_image')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/results/post_introduction_images');
            if($file->move($target_path, $name)) {
               $result->post_introduction_url = '/uploads/results/post_introduction_images/'.$name;//If image saved success, image_url is assigned
            }
        }
        if($file = $request->file('download_material')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/results/download_materials');
            if($file->move($target_path, $name)) {
               $result->download_material_url = '/uploads/results/download_materials/'.$name;//If image saved success, image_url is assigned
            }
        }
        $result->save();
        return response()->json(['success'=>true,'id'=>$result->id]);
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
        Result::find($id)->delete();
        return response()->json(['success'=>true]);
    }
    public function search(Request $request){
        $results = null;
        $count = 0;
        $areas = [];
        $amounts = [];
        $housetypes = [];
        if($request->areas_query!="null"){
            $areas = explode(',',$request->areas_query);
        }
        if($request->amounts_query!="null"){
            $amounts = explode(',',$request->amounts_query);
        }
        if($request->housetypes_query!="null"){
            $housetypes = explode(',',$request->housetypes_query);
        }
        if( $request->search_word!="null" ){
            $results = Result::where("title","LIKE","%$request->search_word%");
        }
        if( $request->instructor_name!="null" ){
            if( $results == null ) {
                $results = Result::where('instructor_name',"LIKE","%$request->instructor_name%");
            }
            else{
                $results = $results->where('instructor_name',"LIKE","%$request->instructor_name%");
            }
        }
        if(count($areas)>0){
            if($results == null){
                $results = Result::whereIn('area_id',$areas);
            }
            else{
                $results = $results->whereIn('area_id',$areas);
            }
        }
        if(count($amounts)>0){
            if($results == null){
                $results = Result::whereIn('amount_id',$amounts);
            }
            else{
                $results = $results->whereIn('amount_id',$amounts);
            }
        }
        if(count($housetypes)>0){
            if($results == null){
                $results = Result::whereIn('housetype_id',$housetypes);
            }
            else{
                $results = $results->whereIn('housetype_id',$housetypes);
            }
        }
        if($request->public_status!="null"){
            if( $results == null ){
                $results = Result::where('public_status',"=",$request->public_status);
            }
            else{
                $results = $results->where('public_status',"=",$request->public_status);
            }
        }
        if( $results == null ){
            $count = Result::count();
            $results = Result::join('areas','results.area_id','=','areas.id')
                    ->join('amounts','results.amount_id','=','amounts.id')
                    ->join('house_types','results.housetype_id','=','house_types.id')
                    ->select('results.id','areas.name','house_types.type','amounts.type','results.title','results.public_status')
                    ->paginate(5);
        }
        else{
            $count = $results->count();
            $results = $results->join('areas','results.area_id','=','areas.id')
                    ->join('amounts','results.amount_id','=','amounts.id')
                    ->join('house_types','results.housetype_id','=','house_types.id')
                    ->select('results.id','areas.name','house_types.type','amounts.type','results.title','results.public_status')
                    ->paginate(5);
        }
        // $Results = Result::latest()->paginate(5);
        // $categories = Category::all();s
        return view('admin.results.pagination_data',compact('results','count'));
    }
}
