<?php

namespace App\Http\Controllers;

use File;
use App\Models\Car;
use App\Models\Make;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    
    public function __construct()
    {
  
        $this->middleware('auth');
        //$this->middleware(Auth::user()->role == 3) ;
    }

    public function allusers()
    {
        $users = User::all();
        return view('admin.allusers', compact('users'));
    }

    public function allmakes()
    {
        
        
        $makes = Make::orderBy('code')->paginate(10);
        return view('admin.allmakes', compact('makes'));
    }

    public function allcars()
    {
        
        
        $cars = Car::orderBy('make')->paginate(10);
        return view('admin.allcars', compact('cars'));
    }

 

    public function teste()
    {
        $json = File::get(base_path("database/data/makes.json"));
        $cars = json_decode($json);
  
        // foreach ($cars as  $car) {
            
            foreach($cars as $key => $model){
           
                $car = $model->value;
                foreach ($model->models as $k => $m){
                    $mod = $m->value;
                    $mod2 = $m->title;
                }
               
             

            
            }
           
        
        // }
        dd(get_defined_vars());
       
        return view('admin.teste');
    }
}
