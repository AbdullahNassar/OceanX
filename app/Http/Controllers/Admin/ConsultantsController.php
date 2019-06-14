<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Consultant;
use DB;

class ConsultantsController extends Controller
{
    public function getIndex() {
        $consultants = Consultant::all();
        return view('admin.pages.consultant.index', compact('consultants'));
    }

    public function getAdd() {
        return view('admin.pages.consultant.add');
    }

    public function insert(Request $request) {

        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'consultant_name_ar' => 'required',
            'consultant_name_en' => 'required',
            'consultant_details_ar' => 'required',
            'consultant_details_en' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'consultant_name_en.required' => 'Please Enter Consultant Name in English',
            'consultant_name_ar.required' => 'Please Enter Consultant Name in Arabic',
            'consultant_details_en.required' => 'Please Enter Consultant Details in English',
            'consultant_details_ar.required' => 'Please Enter Consultant Details in Arabic',
            'active.required' => 'Please Enter Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
    	$consultant_name_ar = $request->input("consultant_name_ar");
        $consultant_name_en = $request->input("consultant_name_en");
        $consultant_details_ar = $request->input("consultant_details_ar");
        $consultant_details_en = $request->input("consultant_details_en");
        $image = $request->input("image");
        $active = $request->input("active");

        $data = array('consultant_name_ar' => $consultant_name_ar , 'consultant_name_en' => $consultant_name_en,'consultant_details_ar' => $consultant_details_ar , 'consultant_details_en' => $consultant_details_en,'image' => $image , 'active' => $active);
    	$con = Consultant::create($data);
        
        if ($con){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function getEdit($id) {
        if (isset($id)) {
            $consultants = DB::table('consultants')->select('consultants.*')
                ->where('consultant_id','=', $id)->get();
            return view('admin.pages.consultant.edit', compact('consultants'));
        }        
    }

    public function postEdit(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'consultant_name_ar' => 'required',
            'consultant_name_en' => 'required',
            'consultant_details_ar' => 'required',
            'consultant_details_en' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'consultant_name_en.required' => 'Please Enter Consultant Name in English',
            'consultant_name_ar.required' => 'Please Enter Consultant Name in Arabic',
            'consultant_details_en.required' => 'Please Enter Consultant Details in English',
            'consultant_details_ar.required' => 'Please Enter Consultant Details in Arabic',
            'active.required' => 'Please Enter Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $id = $request->input('s_id');
        $consultant_name_ar = $request->input("consultant_name_ar");
        $consultant_name_en = $request->input("consultant_name_en");
        $consultant_details_ar = $request->input("consultant_details_ar");
        $consultant_details_en = $request->input("consultant_details_en");
        $image = $request->input("image");
        $active = $request->input("active");

        $data = array('consultant_name_ar' => $consultant_name_ar , 'consultant_name_en' => $consultant_name_en,'consultant_details_ar' => $consultant_details_ar , 'consultant_details_en' => $consultant_details_en,'image' => $image , 'active' => $active);

        $c =  DB::table('consultants')->where('consultant_id','=', $id)->update($data);

        if ($c){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
    	if (isset($id)) {
	    	DB::table('consultants')->where('consultant_id','=', $id)->delete();
            return back();
	    }
    }

}
