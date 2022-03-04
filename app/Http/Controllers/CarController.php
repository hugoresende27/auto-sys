<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Make;
use App\Models\Manu;
use App\Models\User;
use App\Models\Modelo;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{

    public function __construct()
    {
  
        $this->middleware('auth');
    }
    
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
       
     
        //  $makes['data'] = Make::orderby("code","asc")
        //  ->select('code','title')
         $makes['data'] = Manu::orderby("make","asc")
         ->select('make')
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

        
        $this->validate($request, [
           
            'year'=>'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         
        ],
        [
            'year.required' => 'Year required',
            // 'image'=>'Invalid image'
         
        ]);

        $new_car = new Car;

        $new_car->make = $request->input('sel_mak');
        $new_car->model = $request->input('sel_mod');
        $new_car->plate = $request->input('plate');
        $new_car->color = $request->input('color');
        $new_car->kms = $request->input('kms');
        $new_car->value = $request->input('value');
        $new_car->year = $request->input('year');
        $new_car->last_revision = $request->input('last_rev');
        $new_car->next_revision = $request->input('last_rev')+10000;
        $new_car->details = $request->input('details');
        $new_car->driver  = Auth::user()->name;

        $new_car->user_id = Auth::user()->id;

        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images'), $imageName);

        $new_car->images_nr = $imageName;
        $new_car->save();

      

        // dd(get_defined_vars());
        return redirect ('/welcome')->with('message','Auto added');
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
        $car = Car::where('id',$id)->get();
        // dd(get_defined_vars());
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        
        $makes['data'] = Manu::orderby("make","asc")
         ->select('make')
         ->get();

        //  dd(get_defined_vars());
        return view ('cars.update',compact('makes','car'));
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
        $this->validate($request, [
           
            'year'=>'required|integer',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         
        ],
        [
            'year.required' => 'Year required',
            // 'image'=>'Invalid image'
         
        ]);

        if (isset($request->image)){
            Cloudder::upload($request->file('image'), null, array(
                "folder" => "auto-sys",  "overwrite" => FALSE,
                "resource_type" => "image", "responsive" => TRUE, "transformation" => array("quality" => "70", "width" => "400", "height" => "400", "crop" => "scale")
            ));
                $public_id = Cloudder::getPublicId();

                $width = 250;
                $height = 250;

                $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height" => $height, "crop" => "scale", "quality" => 70, "secure" => "true"]);
            } 
            else 
            {
                $image_url = User::where('id',$auth_id)->first();
                $image_url = $image_url->image_nr;
            }
       

        $save = Car::where('id',$id)->update([
            'plate' => $request->input('plate'),
            'color' => $request->input('color'),
            'kms' => $request->input('kms'),
            'year' => $request->input('year'),
            'value' => $request->input('value'),
            'last_revision' => $request->input('last_rev'),
            'next_revision' => $request->input('last_rev')+10000,
            'details' => $request->input('details'),
            'images_nr'=>   $image_url,
            
        ]);
        

       
        return redirect ('/showcar/'.$id.'/show/')->with('message','Record Updated');
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
        $car = Car::where('id', $id);
      
        $car->delete();
       
        return redirect('/myautos')->with ('message', 'Record Deleted');
    }
}
