<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestServ;
use App\Models\Service;
use App\Models\User;


class RequestServController extends Controller
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
        

        $service_id = $request->service_id;
        $user = RequestServ::where('service_id', $service_id)->get();
        // $user = User::where('id', Auth::id())->get();
        return response()->json($user);
        // return RequestServ::all();
        

        // $service_id = $request->service_id;
        // $user = RequestServ::where('service_id', $service_id)->get();
        // return response()->json($user);
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
            'fullName' => 'required',
            'eMail' => 'required',
            'cpNumber' => 'required',
            'service_id'=>'required',

        ]);

        return RequestServ::create($request->all());

        // $data = new request_serv;
        // $data->fullName = $request->fullName;
        // $data->eMail = $request->eMail;
        // $data->cpNumber = $request->cpNumber;
        // $data->service_id = $request->service_id;
        // $data->status = 'In Progress';

        // $data->save();
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
       return RequestServ::destroy($id);

       return [
        'message' => 'Deleted'
    ];
        // $pets->delete();
        // return response()->json($pets);
        
    }
}

