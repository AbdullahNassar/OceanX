<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Statistic;
use App\Initiative;
use DB;

class StatisticsController extends Controller
{
    public function getIndex() {
    	$statistics =  DB::table('statistics')
            ->join('initiatives','initiatives.id','=','statistics.initiative_id')
            ->select('statistics.*','initiatives.initiative_name_en')
            ->get();
        return view('admin.pages.statistic.index', compact('statistics'));
    }

    public function getAdd() {
        $initiatives = Initiative::all();
        return view('admin.pages.statistic.add', compact('initiatives'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'statistic_name_en' => 'required',
            'statistic_name_ar' => 'required',
            'number' => 'required',
            'initiative' => 'required',
            'active' => 'required',
        ] ,[
            'statistic_name_en.required' => 'Please Enter Statistic Name in English',
            'statistic_name_ar.required' => 'Please Enter Statistic Name in Arabic',
            'number.required' => 'Please Enter Statistic Number',
            'initiative.required' => 'Please Enter Initiative',
            'active.required' => 'Please Enter Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

    	$statistic_name_ar = $request->input('statistic_name_ar');
        $statistic_name_en = $request->input('statistic_name_en');
        $number = $request->input('number');
        $initiative = $request->input('initiative');
    	$active = $request->input('active');
    	$data = array('statistic_name_ar' => $statistic_name_ar ,'statistic_name_en' => $statistic_name_en ,'number' => $number ,'initiative_id' => $initiative ,
            'active' => $active);
    	$statistic = Statistic::create($data);

        if ($statistic){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function getEdit($id) {
    	if (isset($id)) {
	        $statistics = DB::table('statistics')
            ->join('initiatives','initiatives.id','=','statistics.initiative_id')
            ->select('statistics.*','initiatives.initiative_name_en')
            ->where('statistic_id','=', $id)
            ->get();
            $initiatives = Initiative::all();
	        return view('admin.pages.statistic.edit', compact('statistics','initiatives'));
        }
    }

    public function postEdit(Request $request) {
        $v = validator($request->all() ,[
            'statistic_name_en' => 'required',
            'statistic_name_ar' => 'required',
            'number' => 'required',
            'initiative_id' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'statistic_name_en.required' => 'Please Enter Statistic Name in English',
            'statistic_name_ar.required' => 'Please Enter Statistic Name in Arabic',
            'number.required' => 'Please Enter Statistic Number',
            'initiative_id.required' => 'Please Enter Initiative',
            'active.required' => 'Please Enter Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

    	$id = $request->input('s_id');
    	$statistic_name_ar = $request->input('statistic_name_ar');
        $statistic_name_en = $request->input('statistic_name_en');
        $number = $request->input('number');
        $initiative_id = $request->input('initiative_id');
        $active = $request->input('active');
        $data = array('statistic_name_ar' => $statistic_name_ar ,'statistic_name_en' => $statistic_name_en ,'number' => $number ,'initiative_id' => $initiative_id ,
            'active' => $active);

    	$s = DB::table('statistics')->where('statistic_id','=', $id)->update($data);
    	if ($s){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
    	if (isset($id)) {
	    	DB::table('statistics')->where('statistic_id','=', $id)->delete();
	    	return back();
	    }
    }

}
