<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use App\Consult;
use App\Categorie;
use App\Consultant;
use App\Consultation;
use App\Service;
use App\Portfolio;
use App\Client;
use App\Post;
use App\Initiative;
use App\Statistic;
use App\Data;
use DB;
use App\Notifications\notify_me;
use App\Notifications\notify;
use App\User;
use Auth;

class HomeController extends Controller {

    public function getIndex() {
        $contact = new Contact;
        $data = new Data;

        return view('site.pages.home',compact('contact','data'));
    }

    public function getAbout() {
        
        $data = new Data;
        $clients = Client::all()->where('active','=',1);
        $contact = new Contact;

        return view('site.pages.about',compact('data','contact','clients'));
    }

    public function getServices() {

            $data = new Data;
            $categories = Categorie::all();
            $services = DB::table('services')
                ->join('categories','services.category_id','=','categories.category_id')
                ->select('services.*','categories.*')
                ->get();
            $contact = new Contact;
        
        return view('site.pages.services',compact('data','contact','services','categories'));
    }

    public function getConsultations() {
        
        $data = new Data;
        $consultants = Consultant::all()->where('active','=',1);
        $consultations = Consultation::all()->where('active','=',1);
        $contact = new Contact;

        return view('site.pages.consultations',compact('data','contact','consultants','consultations'));
    }

    public function postConsultations(Request $request) {
        
        $v = validator($request->all() ,[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'consultant_id' => 'required',
        ] ,[
            'name.required' => 'من فضلك أدخل اسمك',
            'phone.required' => 'من فضلك أدخل رقم الهاتف',
            'message.required' => 'من فضلك أكتب رسالتك',
            'email.required' => 'من فضلك أدخل بريدك الالكترونى',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $consult_name = $request->input('consult_name');
        $consult_time = $request->input('time');
        $consult_date = $request->input('date');
        $full_name = $request->input('name');
        $phone = $request->input('phone');
        $message = $request->input('message');
        $email = $request->input('email');
        $consultant_id = $request->input('consultant_id');

        $data = array('consult_name'=>$consult_name,'consult_time'=>$consult_time,'consult_date'=>$consult_date,
            'full_name'=>$full_name,'phone'=>$phone,'email'=>$email,'message'=>$message,'consultant_id'=>$consultant_id);

        $m = DB::table('consults')->insert($data);

        if ($m) {
            Auth::guard('admins')->user()->notify(new notify());
            return ['status' => 'succes' ,'data' => 'تم ارسال الاستشارة بنجاح'];
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك حاول مرة أخرى'];
        }
    }

    public function getInitiatives() {
        
        $data = new Data;
        $initiatives = Initiative::all()->where('active','=',1);
        $statistics = Statistic::all()->where('active','=',1);
        $contact = new Contact;

        return view('site.pages.initiatives',compact('data','contact','initiatives','statistics'));
    }

    public function getContact() {
        
        $data = new Data;
        $contact = new Contact;

        return view('site.pages.contact',compact('data','contact'));
    }

    public function message(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required|min:6',
            'message' => 'required',
            'email' => 'required|email',
        ] ,[
            'name.required' => 'من فضلك أدخل اسمك',
            'email.required' => 'من فضلك أدخل بريدك الالكترونى',
            'message.required' => 'من فضلك أكتب رسالتك',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        $data = array('name'=>$name,'email'=>$email,'message'=>$message);

        $m = DB::table('messages')->insert($data);

        if ($m) {
            Auth::guard('admins')->user()->notify(new notify_me());
            return ['status' => 'succes' ,'data' => 'تم ارسال الرسالة بنجاح'];
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك حاول مرة أخرى'];
        }
    }
    
    public function error() {

        $data = new Data;
        $contact = new Contact;

        return view('site.pages.error', compact('data','contact'));
    }

}
