<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Area;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $areas = Area::orderBy('order_index','ASC')->get();
        return view('admin.results.area.list',compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $area = new Area;
        $area->name = $request->name_input;
        $max_order = Area::max('order_index');
        $area->order_index = $max_order + 1;
        $area->save();
        return redirect('/admin/results_area/create');
        //
    }
    public function updateOrder(Request $request)
    {
        $datas = $request->order_list;
        foreach ($datas as $data){
            $id = $data["id"];
            $row = Area::find($id);
            $order_index = $data["order_index"];
            $row->order_index = $order_index;
            $row->save();
        }
        return response()->json(['success'=>true]);
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
        $area = Area::where('id',$id)->first();
        return view('admin.results.area.edit',compact(['area']));
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
        $area = Area::find($id);
        $area->name = $request->name;
        $area->save();
        return response()->json(['success'=>true,'name'=>$area->name]);
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
        Area::find($id)->delete();
        return response()->json(['success'=>true]);
    }
}
