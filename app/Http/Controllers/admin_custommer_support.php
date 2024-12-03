<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Contactmt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class admin_custommer_support extends Controller
{
          /**
     * Display a listing of the resource.
     */
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         $find_message   = Contactmt::select('contactmts.*')
    ->join(DB::raw('(SELECT MIN(id) as id FROM contactmts GROUP BY user_id) as min_ids'), 'contactmts.id', '=', 'min_ids.id')
    ->get();
         return view('admin-mt/custommer_contact',['all_message'    =>$find_message]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $data, string $id)
    {
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
        'type'                  =>2,
       ]);
       return redirect()->back();
    }
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $find_message       = Contactmt::where('user_id', $id)->get();
       return view('admin-mt/single_Custommer_Support',['all_message'    =>$find_message]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
