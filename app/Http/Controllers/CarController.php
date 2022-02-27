<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Make;
use App\Models\Modelo;
use Illuminate\Http\Request;

class CarController extends Controller
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
       
     
         $makes['data'] = Make::orderby("code","asc")
         ->select('code','title')
         ->get();

        // Load index view
        return view('cars.create')->with("makes",$makes);
    }

       // Fetch records
       public function getModelos($make_id=0){
   
        // Fetch Employees by Departmentid
        $modelosData['data'] = Modelo::orderby("make_id","asc")
           ->select('make_id','title')
           ->where('make_id',$make_id)
           ->get();
   
         
        return response()->json($modelosData);
   
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

        $new_car = new Car;

        $new_car->make = $request->input('sel_mak');
        $new_car->model = $request->input('sel_mod');

        $new_car->save();
        // dd(get_defined_vars());
        return redirect ('/welcome')->with('message','Car added');
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
    }
}
