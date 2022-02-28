<?php

namespace App\Http\Controllers;

use App\Models\Manu;
use App\Models\Modelo;
use Illuminate\Http\Request;

class ManuController extends Controller
{
    //
    public function __construct()
    {
  
        $this->middleware('auth');
    }
    //
    public function show (Manu $manu)
    {
        
        // $modelos = Modelo::where('make_id',$make->code)->get();

        // $mds = Modelo::with('make')->where('make_id', $manu->make)->paginate(10);
        $mds = Modelo::with('make')->where('make_id', $manu->make)->get();

        // dd(get_defined_vars());
        return view ('makes.index', compact('manu','mds'));
    }
}
