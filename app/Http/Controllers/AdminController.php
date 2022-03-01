<?php

namespace App\Http\Controllers;

use File;
use App\Models\Car;
use App\Models\Make;
use App\Models\Manu;
use App\Models\Modelo;
use App\Models\Base_db;
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
        // dd(get_defined_vars());
        return view('admin.allmakes', compact('makes'));
    }

    public function allcars()
    {
        
        
        $cars = Car::orderBy('make')->paginate(10);
        return view('admin.allcars', compact('cars'));
    }

    public function all()
    {
        $all = Modelo::orderBy('make_id')->paginate(10);
        return view('admin.all', compact('all'));
    }

 

    public function teste()
    {
        $curl = curl_init();
        $where = urlencode('{
            "Model": {
                    "$exists": true
                }
            }');
        curl_setopt($curl, CURLOPT_URL, 'https://parseapi.back4app.com/classes/Carmodels_Car_Model_List?limit=10&where=' . $where);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'X-Parse-Application-Id: Mk7r1mx7hIxOQbSkxiCxr3WGfpGHQy2igRHWCm4k', // This is your app's application id
            'X-Parse-REST-API-Key: MshLu8S3TdAwsQPfuTzbjYuvKs5OS5t2YnNbqjSq' // This is your app's REST API key
        ));
        $data = json_decode(curl_exec($curl)); // Here you have the data that you need
        print_r(json_encode($data, JSON_PRETTY_PRINT));
        dd(get_defined_vars());
        curl_close($curl);
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
           
        // $results3 = User::query()
        //     ->where('name', 'LIKE', "%{$search}%")        
        //     ->get('name');
           
        $results4 = Car::query()
            ->where('plate', 'LIKE', "%{$search}%")        
            ->get('plate');

        // $results5 = Base_db::query()
        //     ->where('make', 'LIKE', "%{$search}%")        
        //     ->orWhere('model', 'LIKE', "%{$search}%")
        //     ->orWhere('year', 'LIKE', "%{$search}%")
        //     ->paginate(10)->withQueryString();
           

        $collection = collect([$results1,$results2,$results4]);
        $count = 0;
        foreach ($collection as $item) {
        // foreach ($results5 as $item) {
            $count += count($item);
        }

      

        
       
    //    dd(get_defined_vars());
        // Return the search view with the resluts compacted
        return view('admin.search', compact('collection','count'));
    }
}
