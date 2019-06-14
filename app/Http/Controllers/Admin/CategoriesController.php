<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorie;
use DB;

class CategoriesController extends Controller
{
    public function getIndex() {
    	$categories = Categorie::all();
        return view('admin.pages.category.index', compact('categories'));
    }

    public function getAdd() {
        return view('admin.pages.category.add');
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'name_ar' => 'required',
            'name_en' => 'required',
            'head_ar' => 'required',
            'head_en' => 'required',
            'active' => 'required',
        ] ,[
            'name_en.required' => 'Please Enter Category Name in English',
            'name_ar.required' => 'Please Enter Category Name in Arabic',
            'head_en.required' => 'Please Enter Category Header in English',
            'head_ar.required' => 'Please Enter Category Header in Arabic',
            'active.required' => 'Please Enter Category Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
    	$name_en = $request->input('name_en');
        $name_ar = $request->input('name_ar');
        $head_en = $request->input('head_en');
        $head_ar = $request->input('head_ar');
    	$active = $request->input('active');
    	$data = array('name_ar' => $name_ar ,'name_en' => $name_en ,'c_head_ar' => $head_ar ,'c_head_en' => $head_en ,'active' => $active);
    	$category = Categorie::create($data);

        if ($category){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    	
    }

    public function getEdit($id) {
    	if (isset($id)) {
	        $categories = DB::table('categories')
	            ->select('categories.*')
	            ->where('category_id','=', $id)
	            ->get();
	        return view('admin.pages.category.edit', compact('categories'));
        }        
    }

    public function postEdit(Request $request) {
    	
    	$v = validator($request->all() ,[
            'name_ar' => 'required',
            'name_en' => 'required',
            'head_ar' => 'required',
            'head_en' => 'required',
            'active' => 'required',
        ] ,[
            'name_en.required' => 'Please Enter Category Name in English',
            'name_ar.required' => 'Please Enter Category Name in Arabic',
            'head_en.required' => 'Please Enter Category Header in English',
            'head_ar.required' => 'Please Enter Category Header in Arabic',
            'active.required' => 'Please Enter Category Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $id = $request->input('s_id');
        $name_en = $request->input('name_en');
        $name_ar = $request->input('name_ar');
        $head_en = $request->input('head_en');
        $head_ar = $request->input('head_ar');
        $active = $request->input('active');
        $data = array('name_ar' => $name_ar ,'name_en' => $name_en ,'c_head_ar' => $head_ar ,'c_head_en' => $head_en ,'active' => $active);

    	$category = DB::table('categories')->where('category_id','=', $id)->update($data);
    	if ($category){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
    	if (isset($id)) {
	    	DB::table('categories')->where('category_id','=', $id)->delete();
	    	return back();
	    }
    }

}
