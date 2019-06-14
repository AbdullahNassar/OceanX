<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ContactsController extends Controller {

	public function getContacts()
    {
        $contacts = DB::table('contacts')->select('contacts.*')->where('id','=', 1)->get();
        return view('admin.pages.contacts', compact('contacts'));
    }


    public function updateContacts(Request $request)
    {
        $v = validator($request->all() ,[
            'phone' => 'required',
            'email' => 'required|email',
            'address_ar' => 'required',
            'address_en' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'google' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'map' => 'required',
            'linkedin' => 'required',
        ] ,[
            'phone.required' => 'Please Enter Phone Number',
            'email.required' => 'Please Enter Email Address',
            'address_ar.required' => 'Please Enter Address in Arabic',
            'address_en.required' => 'Please Enter Address in English',
            'facebook.required' => 'Please Enter Facebook URL',
            'twitter.required' => 'Please Enter Twitter URL',
            'google.required' => 'Please Enter Google+ URL',
            'instagram.required' => 'Please Enter Instagram URL',
            'youtube.required' => 'Please Enter Youtube URL',
            'map.required' => 'Please Enter Map URL',
            'linkedin.required' => 'Please Enter Linkedin URL',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $phone = $request->input('phone');
        $email = $request->input('email');
        $address_ar = $request->input('address_ar');
        $address_en = $request->input('address_en');
        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $google = $request->input('google');
        $instagram = $request->input('instagram');
        $youtube = $request->input('youtube');
        $map = $request->input('map');
        $linkedin = $request->input('linkedin');

        $data = array('phone' => $phone ,'email' => $email,'address_ar' => $address_ar ,'address_en' => $address_en,'linkedin' => $linkedin ,'google' => $google,'twitter' => $twitter,'facebook' => $facebook,'youtube' => $youtube,'instagram' => $instagram,'map' => $map);

        $con = DB::table('contacts')->where('id', 1)->update($data);

        if ($con){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
        
    }
}
