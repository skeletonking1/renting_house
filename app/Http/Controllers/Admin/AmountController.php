<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Amount;
class AmountController extends Controller
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
        $amounts = Amount::orderBy('order_index','ASC')->get();
        return view('admin.results.amount.list',compact('amounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $max_order = Amount::max('order_index');
        $amount = new Amount;
        $amount->type = $request->type_input;
        $amount->order_index = $max_order + 1;
        $amount->save();
        $amounts = Amount::all();
        return redirect('/admin/results_amount/create');
        //
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
        $amount = Amount::where('id',$id)->first();
        return view('admin.results.amount.edit',compact(['amount'])); 
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
        $amount = Amount::find($id);
        $amount->type = $request->type;
        $amount->save();
        return response()->json(['success'=>true,'type'=>$amount->type]);
    }
    public function updateOrder(Request $request)
    {
        $datas = $request->order_list;
        foreach ($datas as $data){
            $id = $data["id"];
            $row = Amount::find($id);
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
        Amount::find($id)->delete();
        return response()->json(['success'=>true]);
    }
}
