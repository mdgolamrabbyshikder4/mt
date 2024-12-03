<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\deposit;
use App\Models\withdroad;
use App\Models\order;
use Illuminate\Support\Facades\Validator;
class admincontrol extends Controller
{
    // authenticate function for admin pawore
    public function __construct()
    {
        $this->middleware('auth');
      
    }
    // dashbord function for adnim pawore
    public function index(){
        return view('admin-mt.index');
    }
        // user function for adnim pawore
    public function user(){
        // user all data get
        $users = User::all();
        return view('admin-mt.user', ['users' => $users]);

    }
        // user function for adnim pawore
    public function user_view($id){
        // user single data view
        $users = User::find($id);
        return view('admin-mt.single_user', ['users' => $users]);

    }
     // user delete function for adnim pawore
    public function user_delete($id){
        // user find
        $userse = User::find($id);
        if (!$userse) {
            return redirect()->back()->with('error', 'User not found.');
        }
        // delete user
        $userse->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');

    }
     // user Approval function for adnim pawore
    public function user_approval($id){
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Validate the incoming request if necessary

        $user->update(['approval' => 1]);

        return redirect()->back()->with('success', 'User Aprove successfully.');

    }
     // user Suspend function for adnim pawore
    public function user_suspend($id){
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Validate the incoming request if necessary

        $user->update(['approval' => 0]);

        return redirect()->back()->with('success', 'User Suspend successfully.');

    }

    // deposit function for admin view
    public function deposit(){
        $deposit = deposit::all();
        return view('admin-mt/deposit',['deposit'=>$deposit]);
    }

    // deposit function for adnim pawore
    public function deposit_single_view($id){
        // user single data view
        $deposit = deposit::find($id);
        return view('admin-mt.single_deposit', ['deposit' => $deposit]);

    }

        // deposit approval function for admin
    public function deposit_approval($id){
        $deposit = deposit::find($id);
        $deposit_user = $deposit->user_id;
        $user = User::find($deposit_user);
        $user_balance =$user->calance;
        $deposit_amount = $deposit->amount;
        $user_update_balance = $user_balance+$deposit_amount;

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Validate the incoming request if necessary

        $deposit->update(['status' => 1]);
        $user->update(['balance' => $user_update_balance]);


        

        return redirect()->back()->with('success', 'User Deposit successfully.'.$user_update_balance);
    }
        // deposit approval function for admin
    public function deposit_back($id){
        $deposit = deposit::find($id);
        $deposit_user = $deposit->user_id;
        $user = User::find($deposit_user);
        $user_balance =$user->balance;
        $deposit_amount = $deposit->amount;
        $user_update_balance = $user_balance-$deposit_amount;

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Validate the incoming request if necessary

        $deposit->update(['status' => 0]);
        $user->update(['balance' => $user_update_balance]);


        

        return redirect()->back()->with('success', 'User Deposit successfully.'.$user_update_balance);
    }

        // deposit delete function for admin view
    public function deposit_delete($id){
        $deposit = deposit::find($id);
        if (!$deposit) {
            return redirect()->back()->with('error', 'Deposit not found.');
        }
        // delete user
        $deposit->delete();

        return redirect()->back()->with('success', 'Deposit deleted successfully.');
    }

    // withdroad function for admin view
    public function withdroad(){
        $withdroad = withdroad::all();
        return view('admin-mt/withdroad',['withdroad'=>$withdroad]);
    }

    // deposit function for adnim pawore
    public function withdroad_single_view($id){
        // user single data view
        $withdroad = withdroad::find($id);
        return view('admin-mt.single_deposit', ['withdroad' => $withdroad,]);

    }

        // withdroad approval function for admin
    public function withdroad_approval($id){
        $withdroad = withdroad::find($id);
        return view('admin-mt/withdroad_update_form',['withdroad'=>$withdroad]);
    }
    // update withdroad function
    public function withdroad_approval_update(Request $data, $id){
        $withdroad = withdroad::find($id);
        $validator = Validator::make($data->all(), [
            'number'    => 'required|integer',
            'trid'      => 'required|string',
        ]);

        if (!$withdroad) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Validate the incoming request if necessary

        $withdroad->update(['status' => 1]);
        $withdroad->update(['sendernumber'  => $data->number]);
        $withdroad->update(['trid'          => $data->trid]);
        return redirect()->back()->with('success', 'Withdro Complete successfully!');
        
    }

        // deposit approval function for admin
    public function withdroad_back($id){
        $deposit = withdroad::find($id);
        $deposit_user = $deposit->user_id;
        $user = User::find($deposit_user);
        $user_balance =$user->balance;
        $deposit_amount = $deposit->amount;
        $user_update_balance = $user_balance-$deposit_amount;

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Validate the incoming request if necessary

        $deposit->update(['status' => 0]);
        $user->update(['balance' => $user_update_balance]);


        

        return redirect()->back()->with('success', 'User Deposit successfully.'.$user_update_balance);
    }

        // deposit delete function for admin view
    public function withdroad_delete($id){
        $withdroad = withdroad::find($id);
        if (!$withdroad) {
            return redirect()->back()->with('error', 'Deposit not found.');
        }
        // delete user
        $withdroad->delete();

        return redirect()->back()->with('success', 'Deposit deleted successfully.');
    }
            // Withdroad edit function for admin view
    public function withdroad_edit($id){
        $withdroad = withdroad::find($id);
        if (!$withdroad) {
            return redirect()->back()->with('error', 'Withdroad not found.');
        }
        return view('admin-mt/withdroad_edit',['withdroad'=>$withdroad]);
    }
    // Withdroad edit function for admin view
    public function withdroad_update(Request $data, $id){
         $withdroad = withdroad::find($id);
        $validator = Validator::make($data->all(), [
            'number'            => 'required|integer',
            'sendernumber'      => 'required|string',
            'methods'           => 'required|string',
            'trid'              => 'required|string',
        ]);

        if (!$withdroad) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Validate the incoming request if necessary

        $withdroad->update(['number'        => $data->number]);
        $withdroad->update(['sendernumber'  => $data->sendernumber]);
        $withdroad->update(['methods'       => $data->methods]);
        $withdroad->update(['trid'          => $data->trid]);
        return redirect()->back()->with('success', 'Withdro Edit successfully!');
    }


}


