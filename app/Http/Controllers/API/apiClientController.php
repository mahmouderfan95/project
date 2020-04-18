<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use Validator;
use Response;

class apiClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::get();
        return response()->json(['data' => $clients,'msg'=> 'clients showed success']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client_data = $request->all();
        $arr = [
            'name'  => 'required',
            'address'   => 'required',
            'phone'     => 'required'
        ];

        $vaild = Validator::make($client_data,$arr);
        if($vaild->fails()){
            return response(json(['data' => $vaild->errors()]));
        }

        $client = Client::create([
            'name'  => $request->name,
            'address'   => $request->address,
            'phone'     => $request->phone,
        ]);

        return response()->json(['data' => $client,'msg'=>'client created success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return response()->json(['data'=>$client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $client = Client::findOrFail($id);
        $client_data = $request->all();
        $arr = [
            'name'  => 'required',
            'address'   => 'required',
            'phone'     => 'required'
        ];

        $vaild = Validator::make($client_data,$arr);
        if($vaild->fails()){
            return response()->json($vaild->errors());
        }

        $client->name = $request->name;
        $client->address = $request->address;
        $client->phone = $request->phone;

        $client->save();

        return response()->json(['data' => $client,'msg' => 'clients updated success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete($id);
        return response()->json(['data' => $client,'msg' => 'client deleted success']);
    }
}
