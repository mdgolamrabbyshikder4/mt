<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class client extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // client dashord function
    public function index(){
        $user               = auth()->user();
        $user_id = $user->id;
        $services = DB::table('services')->where('user_id', '=', $user_id)->orderBy('created_at', 'desc')->get();
        return view('client/control/admin-mt/index', ['services'=>$services]);
    }

    // client Deposit function
    public function deposit_histry(){
        $user_id = auth()->user()->id;
        $deposit_histry = DB::table('deposits')->where('user_id', '=', $user_id)->orderBy('created_at', 'desc')->get();
        return view('client/control/admin-mt/deposit_histry', ['deposit_histry'=> $deposit_histry]);
    }
    // client Withdroad function
    public function withdroad_histry(){
        $user_id = auth()->user()->id;
        $withdroad_histry = DB::table('withdroads')->where('user_id', '=', $user_id)->orderBy('created_at', 'desc')->get();
        return view('client/control/admin-mt/withdroad_histry', ['withdroad_histry'=> $withdroad_histry]);
    }
    // profile update form function
    public function update_profile(){
        return view('client/control/admin-mt/update_profile');
    }
    // profile update form function
    public function update_profile_save(Request $request){
        $validator = Validator::make($request->all(), [
            'name'          => ['required', 'string', 'max:255'],
            'nid'           => ['required', 'string', ],
            'number'        => ['required', 'string', ],
            'discription'   => ['required', 'string', ],
            'location'      => ['required', 'string',],
            'location'      => ['required', 'string',],
            'img'           => ['required|image|mimes:jpeg,png,jpg,gif|max:200',],
        ]);
            $user               = auth()->user();

            if ($request->hasFile('img') && $request->hasFile('nid_img')){
                // profile validation and upload
            $image          = $request->file('img');
            $imageName      = md5(rand().time()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
                // nid validation and upload
            $nid_img        = $request->file('nid_img');
            $nid_imgName    = md5(rand().time()).'.'.$image->getClientOriginalExtension();
            $nid_img->move(public_path('images'), $nid_imgName);
              if($user->img != 0 && $user->nid_img != 0){
             unlink(public_path('/images/').$user->nid_img);  
             unlink(public_path('/images/').$user->img);
            }
            // Update the user's image path in the database

            $user->name         = $request->name;
            $user->nid_img      = $nid_imgName;
            $user->img          = $imageName;
            $user->discription  = $request->discription;
            $user->mobile       = $request->number;
            $user->location     =  $request->location;
            $user->save();

            return redirect()->back()->with('success', 'Profile updated successfully');
        }elseif(!$request->hasFile('nid_img') && $request->hasFile('img')){
                        // profile validation and upload
            $image          = $request->file('img');
            $imageName      = md5(rand().time()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
                if($user->img != 0){ 
             unlink(public_path('/images/').$user->img);
            }
            // Update the user's image path in the database

            $user->name         = $request->name;
            $user->img          = $imageName;
            $user->discription  = $request->discription;
            $user->mobile       = $request->number;
            $user->location     = $request->location;
            $user->save();

            return redirect()->back()->with('success', 'Profile updated successfully');
        }elseif(!$request->hasFile('img') && $request->hasFile('nid_img') ){
             // nid validation and upload
            $nid_img        = $request->file('nid_img');
            $nid_imgName    = md5(rand().time()).'.'.$image->getClientOriginalExtension();
            $nid_img->move(public_path('images'), $nid_imgName);
            if($user->nid_img != 0){
             unlink(public_path('/images/').$user->nid_img);
            }
            // Update the user's image path in the database
            $user->nid_img      = $nid_imgName;
            $user->name         = $request->name;
            $user->discription  = $request->discription;
            $user->mobile       = $request->number;
            $user->location     = $request->location;
            $user->save();

            return redirect()->back()->with('success', 'Profile updated successfully');
        }elseif(!$request->hasFile('img') && !$request->hasFile('nid_img')){
            $user->name         = $request->name;
            $user->discription  = $request->discription;
            $user->mobile       = $request->number;
            $user->location     = $request->location;
            $user->save();
            return redirect()->back()->with('success', 'Profile updated successfully');
        }

        return redirect()->back()->with('error', 'Failed to update image');
    }
    }


