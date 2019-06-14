<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Initiative;
use DB;

class InitiativesController extends Controller
{
    public function getIndex() {
    	$initiatives = Initiative::all();
        return view('admin.pages.initiative.index', compact('initiatives'));
    }

    public function getAdd() {
        return view('admin.pages.initiative.add');
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'image2' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'initiative_name_en' => 'required',
            'initiative_name_ar' => 'required',
            'initiative_content_en' => 'required',
            'initiative_content_ar' => 'required',
            'url' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'image2.required' => 'Please upload image',
            'image2.image' => 'Please upload image not video',
            'image2.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image2.max' => 'Max Size 20 MB',
            'initiative_name_en.required' => 'Please Enter initiative Name in English',
            'initiative_name_ar.required' => 'Please Enter initiative Name in Arabic',
            'initiative_content_en.required' => 'Please Enter initiative Content in English',
            'initiative_content_ar.required' => 'Please Enter initiative Content in Arabic',
            'url.required' => 'Please Enter Client URL',
            'active.required' => 'Please Enter Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $icon = $request->input('image2');
        $image = $request->input('image');
    	$initiative_name_ar = $request->input('initiative_name_ar');
        $initiative_name_en = $request->input('initiative_name_en');
        $initiative_content_ar = $request->input('initiative_content_ar');
        $initiative_content_en = $request->input('initiative_content_en');
        $content = $request->input('content');
        $content_ar = $request->input('content_ar');
    	$url = $request->input('url');
        $active = $request->input('active');
    	$data = array('icon' => $icon ,'image' => $image ,'initiative_name_ar' => $initiative_name_ar ,'initiative_name_en' => $initiative_name_en ,'initiative_content_ar' => $initiative_content_ar ,'initiative_content_en' => $initiative_content_en ,'url' => $url,'active' => $active);
    	$d = Initiative::create($data);
        if ($d){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    	
    }

    public function getEdit($id) {
    	if (isset($id)) {
            $initiatives = DB::table('initiatives')
                ->select('initiatives.*')
                ->where('id','=', $id)
                ->get();
	        return view('admin.pages.initiative.edit', compact('initiatives'));
        }        
    }

    public function postEdit(Request $request) {
    	
    	$v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'image2' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'initiative_name_en' => 'required',
            'initiative_name_ar' => 'required',
            'initiative_content_en' => 'required',
            'initiative_content_ar' => 'required',
            'url' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'image2.required' => 'Please upload image',
            'image2.image' => 'Please upload image not video',
            'image2.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image2.max' => 'Max Size 20 MB',
            'initiative_name_en.required' => 'Please Enter initiative Name in English',
            'initiative_name_ar.required' => 'Please Enter initiative Name in Arabic',
            'initiative_content_en.required' => 'Please Enter initiative Content in English',
            'initiative_content_ar.required' => 'Please Enter initiative Content in Arabic',
            'url.required' => 'Please Enter Client URL',
            'active.required' => 'Please Enter Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $id = $request->input('s_id');
        $icon = $request->input('image2');
        $image = $request->input('image');
        $initiative_name_ar = $request->input('initiative_name_ar');
        $initiative_name_en = $request->input('initiative_name_en');
        $initiative_content_ar = $request->input('initiative_content_ar');
        $initiative_content_en = $request->input('initiative_content_en');
        $content = $request->input('content');
        $content_ar = $request->input('content_ar');
        $url = $request->input('url');
        $active = $request->input('active');
        $data = array('icon' => $icon ,'image' => $image ,'initiative_name_ar' => $initiative_name_ar ,'initiative_name_en' => $initiative_name_en ,'initiative_content_ar' => $initiative_content_ar ,'initiative_content_en' => $initiative_content_en ,'url' => $url,'active' => $active);
    	$d = DB::table('initiatives')->where('id','=', $id)->update($data);
    	if ($d){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
    	if (isset($id)) {
	    	$d = DB::table('initiatives')->where('id','=', $id)->delete();
	    	return back();
	    }
    }

}
