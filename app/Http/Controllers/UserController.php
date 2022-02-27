<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
  
        $this->middleware('auth');
    }
    //
    public function myAutos()
    {
        $cars = Car::where('user_id',Auth::user()->id)->get();
        // dd(get_defined_vars());
        return view ('users.myauto',compact('cars'));
    }
}
