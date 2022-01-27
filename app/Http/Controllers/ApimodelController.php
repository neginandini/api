<?php

namespace App\Http\Controllers;
use App\Http\Resources\Apiresc;

use App\Models\Apimodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApimodelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Apimodel::latest()->get();
        //$data=["msg"=>"Task Api call"];
        return response()->json($data); 
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
        $validator=Validator::make($request->all(),[
            'name'=>['required','max:5'],
            'description'=>['required','max:10']
        ]);
        if($validator->fails()){
            return response(['errors'=>$validator->errors()]);
        }
        else{
            $data = new Apimodel();
            $data->name=$request->name;
            $data->description=$request->description;
            if($data->save()){
                return response(['data'=>new Apiresc($data),"message"=>"data stored"],201);
               // return response()->json($data);
            }
            else{
               // return response()->json(['msg'=>'api not added']);
               return response(['msg'=>"data not stored"]);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apimodel  $apimodel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(['data'=>new Apiresc(Apimodel::find($id)),"message"=>"fetched"],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apimodel  $apimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Apimodel $apimodel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apimodel  $apimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idd)
    {
        $validator=Validator::make($request->all(),[
            'name'=>['required','max:5'],
            'description'=>['required','max:10']
        ]);
        if($validator->fails()){
            return response(['errors'=>$validator->errors()]);
        }
        else{
            $data =Apimodel::find($idd);
            $data->name=$request->name;
            $data->description=$request->description;
            if($data->save()){
                return response(['data'=>new Apiresc($data),"message"=>"data updated"],201);
               // return response()->json($data);
            }
            else{
               // return response()->json(['msg'=>'api not added']);
               return response(['msg'=>"data not updated"]);
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apimodel  $apimodel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task=Apimodel::find($id);
        $task->delete();
        return response(['data'=>new Apiresc($task),"message"=>"deleted"],201);

    }
}
