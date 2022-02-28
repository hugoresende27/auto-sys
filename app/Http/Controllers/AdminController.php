<?php

namespace App\Http\Controllers;

use File;
use App\Models\Car;
use App\Models\Make;
use App\Models\Manu;
use App\Models\Modelo;
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
        
        
        $makes = Manu::orderBy('make')->paginate(10);
        // $makes = Manu::orderBy('make')->paginate(10);
        return view('admin.allmakes', compact('makes'));
    }

    public function allcars()
    {
        
        
        $cars = Car::orderBy('make')->paginate(10);
        return view('admin.allcars', compact('cars'));
    }

 

    public function teste()
    {
        $x = rand (1,5062);

        // $make_model = \DB::table('modelos')->random()->first();
        $make_model = Modelo::all()->random()->first();
        $modelo = $make_model->title;
        $manu = $make_model->make_id;

        // foreach($make_model as $m){
        //     $mak= $m->make_id;
        //     $mod= $m->title;
        // }
        dd(get_defined_vars());
    }


    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $results1 = Manu::query()
            ->where('make', 'LIKE', "%{$search}%")
            // ->orWhere('body', 'LIKE', "%{$search}%")
            ->get();
           
        $results2 = Modelo::query()
            ->where('title', 'LIKE', "%{$search}%")        
            ->get('title');
           
        $results3 = User::query()
            ->where('name', 'LIKE', "%{$search}%")        
            ->get('name');
           
        $results4 = Car::query()
            ->where('plate', 'LIKE', "%{$search}%")        
            ->get('plate');
           

        $collection = collect([$results1,$results2,$results3,$results4]);
        $count = 0;
        foreach ($collection as $item) {
            $count += count($item);
        }
        // $collection->appends
       
       
        // Return the search view with the resluts compacted
        return view('admin.search', compact('collection','count','results1'));
    }
}
