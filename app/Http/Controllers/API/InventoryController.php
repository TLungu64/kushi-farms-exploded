<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inventory;


class InventoryController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->authorize('isAdmin'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // returns the latest inventory info and constricts the page to entries
        return Inventory::latest()->paginate(10);
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
    'name' => 'required|string|max:191',
    
]);

        // function creates an array of the fields in the form
        return Inventory::create([
            'name'=> $request['name'],
            'category'=> $request['category'],
            'unitOfMeasure'=> $request['unitOfMeasure'],
            'pricePerUnit'=> $request['pricePerUnit'],
            'available'=> $request['available'],
            'photo'=> $request['photo'],
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
        $inventory = Inventory::FindOrFail($id);

        $this->validate($request,[
            'name' => 'required|string|max:191',
        ]);

        $inventory -> update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isAdmin'); 
        $inventory = Inventory::FindOrFail($id);

        // Delete the inventory

        $inventory -> delete();

        return ['message' => 'Inventory Deleted'];
    }

    public function search(){
        if ($search = \Request::get('q')) {
            $inventory = Inventory::where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%");
            })->paginate(20);
        }else{
            $inventory = Inventory::latest()->paginate(5);
                }
        return $inventory;
    }
}
