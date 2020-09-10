<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stock;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // returns the latest Stock info and constricts the page to entries
        return Stock::latest()->paginate(10);

        // return Inventory::all();
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //validation of selected fields
        $this->validate($request,[
            'type' => 'required|string|max:191',
            
        ]);

        // function creates an array of the fields in the form
        return Stock::create([
            'type'=> $request['type'],
            'inventory_id'=> $request['inventory_id'],
            'price'=> $request['price'],
            'Unit'=> $request['Unit'],
            'status'=> $request['status'],
            'dateToMaturity'=> $request['dateToMaturity'],
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stock = Stock::FindOrFail($id);

        $this->validate($request,[
            'inventory_id' => 'string|max:191',
        ]);

        $stock -> update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::FindOrFail($id);

        // Delete the stock

        $stock -> delete();

        return ['message' => 'Stock Deleted'];
    }

    public function search(){
        if ($search = \Request::get('q')) {
            $stock = Stock::where(function($query) use ($search){
                $query->where('inventory_id','LIKE',"%$search%")->orWhere('status','LIKE',"%$search%");
            })->paginate(20);
        }else{
            $stock = Stock::latest()->paginate(5);
                }
        return $stock;
    }
}
