<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HouseType;
class HouseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $housetypes = HouseType::all();
        return view('admin.results.housetype.list',compact('housetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $housetypes = HouseType::orderBy('order_index','ASC')->get();
        return view('admin.results.housetype.list',compact('housetypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $max_order = HouseType::max('order_index');
        $housetype = new HouseType;
        $housetype->type = $request->new_type;
        $housetype->order_index = $max_order + 1;
        $housetype->save();
        return redirect('/admin/results_housetype/create');

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
        $housetype = Housetype::where('id',$id)->first();
        return view('admin.results.housetype.edit',compact(['housetype']));
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
        $housetype = Housetype::find($id);
        $housetype->type = $request->type;
        $housetype->save();
        return response()->json(['success'=>true,'type'=>$housetype->type]);
    }
    public function updateOrder(Request $request)
    {
        $datas = $request->order_list;
        foreach ($datas as $data){
            $id = $data["id"];
            $row = HouseType::find($id);
            $order_index = $data["order_index"];
            $row->order_index = $order_index;
            $row->save();
        }
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
        //
        HouseType::find($id)->delete();
        return response()->json(['success'=>true]);
    }
}
