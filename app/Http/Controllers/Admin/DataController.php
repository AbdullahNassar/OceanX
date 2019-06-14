<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DataController extends Controller {

	public function getData()
    {
        $statics = DB::table('statics')->select('statics.*')->where('id','=', 1)->get();
        return view('admin.pages.data', compact('statics'));
    }


    public function updateData(Request $request)
    {
      $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'site_name_ar' => 'required',
            'site_name_en' => 'required',
            'slider_ar' => 'required',
            'slider_en' => 'required',
            'about_ar' => 'required',
            'about_en' => 'required',
            'about_head_ar' => 'required',
            'about_head_en' => 'required',
            'about_content_ar' => 'required',
            'about_content_en' => 'required',
            'vision_ar' => 'required',
            'vision_en' => 'required',
            'offers_ar' => 'required',
            'offers_en' => 'required',
            'initiatives_ar' => 'required',
            'initiatives_en' => 'required',
            'consulting_ar' => 'required',
            'consulting_en' => 'required',
            'consulting_content_ar' => 'required',
            'consulting_content_en' => 'required',
            'services_ar' => 'required',
            'services_en' => 'required',
            'services_head_ar' => 'required',
            'services_head_en' => 'required',
            'services_content_ar' => 'required',
            'services_content_en' => 'required',
            'contact_head_ar' => 'required',
            'contact_head_en' => 'required',
            'contact_content_ar' => 'required',
            'contact_content_en' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'site_name_ar.required' => 'Please Enter Site Name in Arabic',
            'site_name_en.required' => 'Please Enter Site Name in English',
            'slider_ar.required' => 'Please Enter Slider Header in Arabic',
            'slider_en.required' => 'Please Enter Slider Header in English',
            'about_ar.required' => 'Please Enter Home About Content in Arabic',
            'about_en.required' => 'Please Enter Home About Content in English',
            'about_head_ar.required' => 'Please Enter About Header Content in Arabic',
            'about_head_en.required' => 'Please Enter About Header Content in English',
            'about_content_ar.required' => 'Please Enter About Content in Arabic',
            'about_content_en.required' => 'Please Enter About Content in English',
            'vision_ar.required' => 'Please Enter Home Vision Content in Arabic',
            'vision_en.required' => 'Please Enter Home Vision Content in English',
            'offers_ar.required' => 'Please Enter What We Offer in Arabic',
            'offers_en.required' => 'Please Enter What We Offer in English',
            'initiatives_ar.required' => 'Please Enter Initiatives Content in Arabic',
            'initiatives_en.required' => 'Please Enter Initiatives Content in English',
            'initiatives_ar.required' => 'Please Enter Home Initiatives Content in Arabic',
            'initiatives_en.required' => 'Please Enter Home Initiatives Content in English',
            'consulting_ar.required' => 'Please Enter Consulting Content in Arabic',
            'consulting_en.required' => 'Please Enter Consulting Content in English',
            'consulting_content_ar.required' => 'Please Enter Home Consulting Content in Arabic',
            'consulting_content_en.required' => 'Please Enter Home Consulting Content in English',
            'services_ar.required' => 'Please Enter Home Services Content in Arabic',
            'services_en.required' => 'Please Enter Home Services Content in English',
            'services_head_ar.required' => 'Please Enter Services Header in Arabic',
            'services_head_en.required' => 'Please Enter Services Header in English',
            'services_content_ar.required' => 'Please Enter Services Content in Arabic',
            'services_content_en.required' => 'Please Enter Services Content in English',
            'contact_head_ar.required' => 'Please Enter Contact Us Header in Arabic',
            'contact_head_en.required' => 'Please Enter Contact Us Header in English',
            'contact_content_ar.required' => 'Please Enter Contact Us Content in Arabic',
            'contact_content_en.required' => 'Please Enter Contact Us Content in English',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $image = $request->input('image');
        $site_name_ar = $request->input('site_name_ar');
        $site_name_en = $request->input('site_name_en');
        $slider_ar = $request->input('slider_ar');
        $slider_en = $request->input('slider_en');
        $about_ar = $request->input('about_ar');
        $about_en = $request->input('about_en');
        $about_head_ar = $request->input('about_head_ar');
        $about_head_en = $request->input('about_head_en');
        $about_content_ar = $request->input('about_content_ar');
        $about_content_en = $request->input('about_content_en');
        $vision_ar = $request->input('vision_ar');
        $vision_en = $request->input('vision_en');
        $offers_ar = $request->input('offers_ar');
        $offers_en = $request->input('offers_en');
        $initiatives_ar = $request->input('initiatives_ar');
        $initiatives_en = $request->input('initiatives_en');
        $initiatives_content_ar = $request->input('initiatives_content_ar');
        $initiatives_content_en = $request->input('initiatives_content_en');
        $consulting_ar = $request->input('consulting_ar');
        $consulting_en = $request->input('consulting_en');
        $consulting_content_ar = $request->input('consulting_content_ar');
        $consulting_content_en = $request->input('consulting_content_en');
        $services_ar = $request->input('services_ar');
        $services_en = $request->input('services_en');
        $services_head_ar = $request->input('services_head_ar');
        $services_head_en = $request->input('services_head_en');
        $services_content_ar = $request->input('services_content_ar');
        $services_content_en = $request->input('services_content_en');
        $contact_head_ar = $request->input('contact_head_ar');
        $contact_head_en = $request->input('contact_head_en');
        $contact_content_ar = $request->input('contact_content_ar');
        $contact_content_en = $request->input('contact_content_en');

        $data = array( 'image' => $image,
                       'site_name_ar' => $site_name_ar,
                       'site_name_en' => $site_name_en,
                       'slider_ar' => $slider_ar,
                       'slider_en' => $slider_en,
                       'about_ar' => $about_ar,
                       'about_en' => $about_en,
                       'about_head_ar' => $about_head_ar,
                       'about_head_en' => $about_head_en,
                       'about_content_ar' => $about_content_ar,
                       'about_content_en' => $about_content_en,
                       'vision_ar' => $vision_ar,
                       'vision_en' => $vision_en,
                       'offers_ar' => $offers_ar,
                       'offers_en' => $offers_en,
                       'initiatives_ar' => $initiatives_ar,
                       'initiatives_en' => $initiatives_en,
                       'initiatives_content_ar' => $initiatives_content_ar,
                       'initiatives_content_en' => $initiatives_content_en,
                       'consulting_ar' => $consulting_ar,
                       'consulting_en' => $consulting_en,
                       'consulting_content_ar' => $consulting_content_ar,
                       'consulting_content_en' => $consulting_content_en,
                       'services_ar' => $services_ar,
                       'services_en' => $services_en,
                       'services_head_ar' => $services_head_ar,
                       'services_head_en' => $services_head_en,
                       'services_content_ar' => $services_content_ar,
                       'services_content_en' => $services_content_en,
                       'contact_head_ar' => $contact_head_ar,
                       'contact_head_en' => $contact_head_en,
                       'contact_content_ar' => $contact_content_ar,
                       'contact_content_en' => $contact_content_en
                       );
        
        $c = DB::table('statics')->where('id', 1)->update($data);

        if ($c){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }
}
