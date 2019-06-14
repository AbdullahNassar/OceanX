<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Categorie;
use DB;
use Alert;

class ServicesController extends Controller
{
    public function getIndex() {
    	$services = Service::all();
        return view('admin.pages.service.index', compact('services'));
    }

    public function getAdd() {
        $categories = Categorie::all();
        return view('admin.pages.service.add', compact('categories'));
    }

    public function postAdd(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'head_ar' => 'required',
            'head_en' => 'required',
            'content_ar' => 'required',
            'content_en' => 'required',
            'category_id' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'head_ar.required' => 'Please Enter Service Header in English',
            'head_en.required' => 'Please Enter Service Header in Arabic',
            'content_ar.required' => 'Please Enter Service Content in English',
            'content_en.required' => 'Please Enter Service Content in Arabic',
            'category_id.required' => 'Please Select Ctegory',
            'active.required' => 'Please Select Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $head_ar = $request->input('head_ar');
        $head_en = $request->input('head_en');
        $content_ar = $request->input('content_ar');
        $content_en = $request->input('content_en');
        $steps_ar = $request->input('steps_ar');
        $steps_en = $request->input('steps_en');
        $image = $request->input('image');
        $active = $request->input('active');
        $category_id = $request->input('category_id');

        for ($i=1; $i <= 6 ; $i++) { 
            $step_ar['s_ar'.$i] = $request->input('s_ar'.$i);
        }
        $steps_ar = json_encode($step_ar);
        for ($i=1; $i <= 6 ; $i++) { 
            $step_en['s_en'.$i] = $request->input('s_en'.$i);
        }
        $steps_en = json_encode($step_en);

        $data = array('head_ar' => $head_ar ,'head_en' => $head_en ,'content_ar' => $content_ar ,'content_en' => $content_en ,'steps_ar' => $steps_ar ,'steps_en' => $steps_en ,'image' => $image ,'category_id' => $category_id,'active' => $active);
        $R = Service::create($data);
        if ($R){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function getEdit($id) {
        if (isset($id)) {
            $services = DB::table('services')
                ->join('categories','services.category_id','=','categories.category_id')
                ->select('services.*','categories.name_en')
                ->where('services.id','=', $id)
                ->get();
            $categories = Categorie::all();
            return view('admin.pages.service.edit', compact('services','categories'));
        }        
    }

    public function postEdit(Request $request) {
        
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'head_ar' => 'required',
            'head_en' => 'required',
            'content_ar' => 'required',
            'content_en' => 'required',
            'category_id' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'head_ar.required' => 'Please Enter Service Header in English',
            'head_en.required' => 'Please Enter Service Header in Arabic',
            'content_ar.required' => 'Please Enter Service Content in English',
            'content_en.required' => 'Please Enter Service Content in Arabic',
            'category_id.required' => 'Please Select Ctegory',
            'active.required' => 'Please Select Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $id = $request->input('s_id');
        $head_ar = $request->input('head_ar');
        $head_en = $request->input('head_en');
        $content_ar = $request->input('content_ar');
        $content_en = $request->input('content_en');
        $steps_ar = $request->input('steps_ar');
        $steps_en = $request->input('steps_en');
        $image = $request->input('image');
        $active = $request->input('active');
        $category_id = $request->input('category_id');

        for ($i=1; $i <= 6 ; $i++) { 
            $step_ar['s_ar'.$i] = $request->input('s_ar'.$i);
        }
        $steps_ar = json_encode($step_ar);
        for ($i=1; $i <= 6 ; $i++) { 
            $step_en['s_en'.$i] = $request->input('s_en'.$i);
        }
        $steps_en = json_encode($step_en);

        $data = array('head_ar' => $head_ar ,'head_en' => $head_en ,'content_ar' => $content_ar ,'content_en' => $content_en ,'steps_ar' => $steps_ar ,'steps_en' => $steps_en ,'image' => $image ,'category_id' => $category_id,'active' => $active);

        $R = DB::table('services')->where('id','=', $id)->update($data);
        if ($R){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            DB::table('services')->where('id','=', $id)->delete();
            return back();
        }
    }

}
