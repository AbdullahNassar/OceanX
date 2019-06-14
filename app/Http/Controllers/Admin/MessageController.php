<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use DB;

class MessageController extends Controller {
	
    public function getIndex() {
        $objects = Message::get();
        return view('admin.pages.message', compact('objects'));
    }

    public function getConsultations() {
        $consultations = DB::table('consults')
                ->join('consultants','consults.consultant_id','=','consultants.consultant_id')
                ->select('consults.*','consultants.*')
                ->get();

        return view('admin.pages.consultations', compact('consultations'));
    }

}
