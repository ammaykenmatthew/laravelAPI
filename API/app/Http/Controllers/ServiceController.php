<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ServiceController extends Controller
{
    //

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
        $user = Service::where('user_id', $user_id)->get();
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
            'fullname' => 'required',
            'email' => 'required',
            'cpNumber' => 'required',
            'role' => 'required',
            'address' => 'required',
        ]);

        return Service::create($request->all());
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
        return Service::find($id);
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
        $service = Service::find($id);
        $service->update($request->all());
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
        return response()->json($service);
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
       return Service::destroy($id);
       return response()->json($service);

       return [
        'message' => 'Deleted'
    ];
        // $pets->delete();
        // return response()->json($pets);
        
    }
}
