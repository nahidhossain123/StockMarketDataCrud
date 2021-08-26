<?php

namespace App\Http\Controllers;

use App\Models\json_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JsonModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        echo "Storing...";
        $file=$request->file('json');
        $file->move('upload',$file->getClientOriginalName());

        $contents=file_get_contents('../public/upload/'.$file->getClientOriginalName());
        $decode=json_decode($contents,true);
        $data_len=count($decode);
        set_time_limit(0);
        foreach($decode as $val)
        {   
            $data=new json_model();
            $data->date=$val['date'];
            $data->trade_code=$val['trade_code'];
            $data->high=$val['high'];
            $data->low=$val['low'];
            $data->open=$val['open'];
            $data->close=$val['close'];
            $data->volume=$val['volume'];
            $data->save();
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\json_model  $json_model
     * @return \Illuminate\Http\Response
     */
    public function show(json_model $json_model,Request $request)
    {
        $val=$request->trade_code;
        if($val==null)
        {
            $val=DB::table('json_models')->select('trade_code')->first();
            if($val!=null)
            {
                $val=$val->trade_code;
            }
        }
        $users = DB::table('json_models')
            ->select('trade_code')
            ->groupBy('trade_code')
            ->get();

        $chart_data=DB::table('json_models')->where('trade_code','=',$val)->get();
        $data="";
        foreach ($chart_data as $value) {
            $data.="['".$value->date."',".(int)$value->high.",".(int)$value->low.",".(int)$value->open.",".(int)$value->close."],";
        }
        $dataArry=json_model::paginate(15);
        return view('welcome',compact('users','dataArry','data','val'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\json_model  $json_model
     * @return \Illuminate\Http\Response
     */
    public function edit(json_model $json_model ,$id)
    {
        $data=json_model::find($id);
        return view('Update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\json_model  $json_model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, json_model $json_model)
    {
        $newData=json_model::find($request->id);
        $newData->date=$request->input('date');
        $newData->trade_code=$request->input('trade_code');
        $newData->high=$request->input('high');
        $newData->low=$request->input('low');
        $newData->open=$request->input('open');
        $newData->close=$request->input('close');
        $newData->volume=$request->input('volume');
        $newData->save();
        $request->session()->flash('message','Updated Successfully');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\json_model  $json_model
     * @return \Illuminate\Http\Response
     */
    public function destroy(json_model $json_model,$id)
    {
        json_model::destroy(array('id',$id));
        session()->flash('message','Deleted Successfully');
        return redirect('/');
    }
}
