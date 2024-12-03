<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Contactmt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Contact extends Controller
{
       /**
     * Display a listing of the resource.
     */
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $searchRoute = route('search_searvice.search_searvice');
        $user_id        = Auth::id();
        $all_message   = Contactmt::where('user_id', $user_id)->get();
         return view('client/contact',compact('all_message', 'searchRoute'));

    }

    public function create_message(Request $data){

        //data validation
        $validator = Validator::make($data->all(), [
            'message'          => ['required', 'string'],
        ]);

        // variable area
        $now            = Carbon::now();
        $sanding_sate   = $now->format('Y-m-d H:i:s');
        $user_id        = Auth::id();
        $msg_data       = $data->message;

        if(!$validator){
                return redirect()->back()->with('error', 'Validation not found');
            }else{
        //data create in custommer support
       Contactmt::create([
        'user_id'               =>$user_id,
        'seen'                  =>0,
        'message'               =>$msg_data,
        'datecontact'           =>$sanding_sate,
        'timecontact'           =>$sanding_sate,
        'type'                  =>1,
       ]);
       return redirect()->back();
    }
}
}
