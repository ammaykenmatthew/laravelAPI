<?php

namespace App\Http\Controllers;
use App\Models\Pets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{

    // public function ___construct(){
    //     $this->middleware('auth');
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return Pets::all();
        // $pets = Pets::all();
        // $id = Pets::find($id);
        

        $user_id = $request->user_id;
        $user = Pets::where('user_id', $user_id)->get();
        return response()->json($user);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'user_id'=>'required',
            'name' => 'required',
            'type' => 'required',
            'breed' => 'required',
            'gender' => 'required',
            'age' => 'required',
        ]);

        // $pets = new Pets();
        // $pets->name = $request->name;
        // $pets->type = $request->type;
        // $pets->breed = $request->breed;
        // $pets->gender = $request->gender;
        // $pets->age = $request->age;
        // $pets->user_id = Auth::id();
        return Pets::create($request->all());
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
        return Pets::find($id);
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
        $pets = Pets::find($id);
        $pets->update($request->all());
        // return $pets;

        // $request->validate([
        //     'name' => 'required',
        //     'type' => 'required',
        //     'breed' => 'required',
        //     'gender' => 'required',
        //     'age' => 'required',
        // ]);

        // $pets->update([
        //     'name' =>$request->name,
        //     'type' =>$request->type,
        //     'breed' =>$request->breed,
        //     'gender' =>$request->gender,
        //     'age' =>$request->age,
            
        // ]);
        return response()->json($pets);
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
       return Pets::destroy($id);
       return response()->json($pets);

       return [
        'message' => 'Deleted'
    ];
        // $pets->delete();
        // return response()->json($pets);
        
    }

     /**
     * Search for a name
     *
     * @param  str $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        //
       return Pets::where('name', 'like', '%'.$name.'%')->get();
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function getpets(Request $request, $pets)
    {

        return Pets::all();
       
    
        // $user_id = $request->user_id;
        // $user = Pets::where('user_id', $user_id)->get();
        // return response()->json($user);
    }
}
