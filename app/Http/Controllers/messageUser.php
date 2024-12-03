<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\messageUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class messageUser extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
{
    $user_id = Auth::id();
    $contact_id = $id;

    // Fetch freelancer info; handle case if user not found
    $frelancer_info = User::find($id);
    if (!$frelancer_info && $id != 0) {
        return response()->json(['error' => 'User not found'], 404);
    }

    // Fetch messages grouped by unique_id
    $data = messageUsers::where('sender_id', $user_id)
                        ->orWhere('reciv_id', $user_id)
                        ->get()
                        ->groupBy('unique_id');

    // Count total messages exchanged
    $total_message = messageUsers::where(function ($query) use ($user_id, $id) {
                            $query->where('sender_id', $user_id)
                                  ->where('reciv_id', $id);
                        })
                        ->orWhere(function ($query) use ($user_id, $id) {
                            $query->where('reciv_id', $user_id)
                                  ->where('sender_id', $id);
                        })
                        ->get();

    $total_message_number = $total_message->count();

    // Return the view with the required data
    return view('client/control/admin-mt/client_message', [
        'user_message_list' => $data,
        'contact_id' => $contact_id,
        'frelancer_info' => $frelancer_info,
        'total_message_number' => $total_message_number
    ]);
}

    // public function index($id)
    // {
    //     $user_id                = Auth::id();
    //     $contact_id             = $id;
    //     $frelancer_info         = User::find($id);
    //     $data                   = messageUsers::where('sender_id', $user_id)
    //                             ->orWhere('reciv_id', $user_id)
    //                             ->get()
    //                             ->groupBy('unique_id');
    //     $total_message          = messageUsers::where('sender_id', $user_id)->where('reciv_id', $id)
    //                             ->orWhere('reciv_id', $user_id)->where('sender_id', $id)
    //                             ->get();


    //     $total_message_number   =   $total_message->count();
    //     if($frelancer_info or $id==0){
    //         return view('client/control/admin-mt/client_message', 
    //     ['user_message_list'    => $data,
    //     'contact_id'            => $contact_id, 
    //     'frelancer_info'        => $frelancer_info,
    //     'total_message_number'  => $total_message_number
    // ]);
    //     }else{
    //         echo "this is not user";
    //     }
       
    // }
    // single inbox function
    public function single_inbox($id){
        $user_id        = Auth::id();
        
                
        $data = messageUsers::where('sender_id', $user_id)
                    ->orWhere('reciv_id', $user_id)
                    ->get()
                    ->groupBy('unique_id');
       return view('client/control/admin-mt/client_message', ['user_message_list'  => $data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {

        $now                = Carbon::now();
        $sanding_sate       = $now->format('Y-m-d H:i:s');
        $reciver_id         = User::find($id);
        $reciver_user_name  = $reciver_id->name;   
        $reciver_user_img   = $reciver_id->img;   
        $user_id            = Auth::id();
        $sender_img         = Auth::user()->img;
        $semder_name        = Auth::user()->name;
        $unique_id_data = messageUsers::where(function($query) use ($user_id, $id) {
                         $query->where('sender_id', $user_id)
                               ->where('reciv_id', $id);
                     })
                     ->orWhere(function($query) use ($user_id, $id) {
                         $query->where('reciv_id', $user_id)
                               ->where('sender_id', $id);
                     })
                     ->orderBy('created_at', 'desc') // Order by the latest message
                     ->value('unique_id');
        $unique_id_co      = messageUsers::where('sender_id', $user_id)->where('reciv_id', $id)
                     ->orWhere('reciv_id', $user_id)->where('sender_id', $id)
                     ->count();
        // unique id generate for gourupby messanger user name
        if($unique_id_co == 0){
            $unique_id_gen = md5(rand().time());
        }else{
        $unique_id_gen = $unique_id_data;
        }


        
            // only text sent
        if($request->msg and empty($request->message_img)){
            messageUsers::create([
                'img_stutas'            =>0,
                'sander_user_name'      =>$semder_name,
                'reciver_user_name'     =>$reciver_user_name,
                'reciver_user_img'      =>$reciver_user_img,
                'sender_img'            =>$sender_img,
                'unique_id'             =>$unique_id_gen,
                'sender_id'             =>$user_id,
                'reciv_id'              =>$id,
                'datetime'              =>$sanding_sate,
                'discription'           =>$request->msg,
                'reciv_seen'            =>0,

            ]);
        }

            // only Image sent
        if($request->message_img and empty($request->msg)){
            $image          = $request->file('message_img');
            $imageName      = md5(rand().time()).'.'.$image->getClientOriginalExtension();
            if($image->getClientOriginalExtension()== 'jpg' or $image->getClientOriginalExtension()== 'jpeg' or $image->getClientOriginalExtension()== 'png'){
                $image->move(public_path('images'), $imageName);
                messageUsers::create([
                'img'                   =>$imageName,
                'img_stutas'            =>1,
                'sander_user_name'      =>$semder_name,
                'reciver_user_name'     =>$reciver_user_name,
                'reciver_user_img'      =>$reciver_user_img,
                'sender_img'            =>$sender_img,
                'unique_id'             =>$unique_id_gen,
                'sender_id'             =>$user_id,
                'reciv_id'              =>$id,
                'datetime'              =>$sanding_sate,
                'reciv_seen'            =>0,

            ]);
        }
    }
        // all fild is not empty
        if(!empty($request->msg) and !empty($request->message_img)){
            $image          = $request->file('message_img');
            $imageName      = md5(rand().time()).'.'.$image->getClientOriginalExtension();
            if($image->getClientOriginalExtension()== 'jpg' or $image->getClientOriginalExtension()== 'jpeg' or $image->getClientOriginalExtension()== 'png'){
                $image->move(public_path('images'), $imageName);
                messageUsers::create([
                'discription'           =>$request->msg,
                'img'                   =>$imageName,
                'img_stutas'            =>2,
                'sander_user_name'      =>$semder_name,
                'reciver_user_name'     =>$reciver_user_name,
                'reciver_user_img'      =>$reciver_user_img,
                'sender_img'            =>$sender_img,
                'unique_id'             =>$unique_id_gen,
                'sender_id'             =>$user_id,
                'reciv_id'              =>$id,
                'datetime'              =>$sanding_sate,
                'reciv_seen'            =>0,

            ]);
        }


        }
       
    }
 
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $user_id        = Auth::id();
        // $data = messageUsers::where('sender_id', $user_id)->orWhere('reciv_id', '$user_id')->get();

        $user_id = Auth::id();
        $data = messageUsers::where('sender_id', $user_id)->where('reciv_id', $id)
                     ->orWhere('reciv_id', $user_id)->where('sender_id', $id)
                     ->get();

        $total_message_number   =   $data->count();
        return view('client/control/admin-mt/message', ['user_message_list'  => $data, 'total_message_number' => $total_message_number]);
    }

    /**
     * Display the specified resource.
     */
    public function count()
    {
        // $user_id        = Auth::id();
        // $data = messageUsers::where('sender_id', $user_id)->orWhere('reciv_id', '$user_id')->get();
        $user_id = Auth::id();
        $data = messageUsers::where('sender_id', $user_id)
                     ->orWhere('reciv_id', $user_id)
                     ->get();

        $total_message_number   =   $data->count();
        return response()->json($total_message_number);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function personal_text_count($id)
    {
        $user_id            = Auth::id();
        $personalmsg_id_co      = messageUsers::where('sender_id', $user_id)->where('reciv_id', $id)
                     ->orWhere('reciv_id', $user_id)->where('sender_id', $id)
                     ->count();
        return response()->json($personalmsg_id_co);

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
