<?php

namespace App\Http\Controllers;

use App\Models\Make;
use App\Models\Modelo;
use Illuminate\Http\Request;

class MakeController extends Controller
{
    public function __construct()
    {
  
        $this->middleware('auth');
    }
    //
    public function show (Make $make)
    {
        
        // $modelos = Modelo::where('make_id',$make->code)->get();

        $mds = Modelo::with('make')->where('make_id', $make->code)->paginate(10);

        // dd(get_defined_vars());
        return view ('makes.index', compact('make','mds'));
    }



}
