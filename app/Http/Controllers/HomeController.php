<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\deposit;
use App\Models\withdroad;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('client/index');
    }
    // deposit function
    public function deposit()
    {
        $searchRoute = route('search_our_service_client_view.search_our_service_client_view');
        return view('client.deposit_form', compact('searchRoute'));;
    }
        // deposit store function
    public function deposit_store(Request $data)
    {
          $validator = Validator::make($data->all(), [
            'number'    => 'required|string',
            'amount'    => 'required|integer',
            'trid'      => 'required|string',
            'methods'   => 'required|string',
        ]);
    $ldate = date('Y-m-d H:i:s');
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Deposit request Faild');
        }
        $user_id = auth()->user()->id;
        deposit::create([
            'number'        => $data['number'],
            'amount'        => $data['amount'],
            'trid'          => $data['trid'],
            'methods'       => $data->input('methods'),
            'status'        => 0,
            'user_id'       => $user_id,
            'dateandtime'   => $ldate,
        ]);
        return redirect()->back()->with('success', 'Deposit request successfully! Please Wet for some time'.$ldate);
    }
    // deposit function
    public function withdroad()
    {
        $searchRoute = route('search_our_service_client_view.search_our_service_client_view');
        return view('client/withdroad_form', compact('searchRoute'));
    }
        // deposit store function
    public function withdroad_store(Request $data)
    {
          $validator = Validator::make($data->all(), [
            'number'    => 'required|string',
            'amount'    => 'required|integer',
            'methods'   => 'required|string',
        ]);
    $ldate = date('Y-m-d H:i:s');
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Withdroad request Faild');
        }
        $user_id = auth()->user()->id;
        $user_balance = auth()->user()->balance;
        if($user_balance == $data['amount'] or $user_balance > $data['amount']){

        $user = User::find($user_id);
        $withdroaw_amount = $data->amount;
        $user_update_balance = $user_balance-$withdroaw_amount;
        // Validate the incoming request if necessary

        $user->update(['balance' => $user_update_balance]);



        withdroad::create([
            'number'        => $data['number'],
            'amount'        => $data['amount'],
            'sendernumber'  => 'null',
            'trid'          => 'null',
            'methods'       => $data->input('methods'),
            'status'        => 0,
            'user_id'       => $user_id,
            'dateandtime'   => $ldate,
        ]);;
        return redirect()->back()->with('success', 'Withdroad request successfully! Please Wet for some time');  
        }else{
        return redirect()->back()->with('success', 'Your Balance is not enought. Please check your balance. Thank you');  
        }

    }
}
