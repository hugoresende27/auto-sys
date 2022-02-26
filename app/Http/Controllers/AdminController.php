<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use File;

class AdminController extends Controller
{
    //

    public function allusers()
    {
        $users = User::all();
        return view('admin.allusers', compact('users'));
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
