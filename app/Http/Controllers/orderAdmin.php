<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class orderAdmin extends Controller
{
    // authenticate function for admin pawore
    public function __construct()
    {
        $this->middleware('auth');
      
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = order::all();
        return view('admin-mt.order_list', ['order'=> $order]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        $single_order   =order::find($id);
        $frelancer      = User::find($single_order->frid);
        $client         = User::find($single_order->clid);
        return view('admin-mt.single_order', ['single_order'=> $single_order, 'frelancer'=> $frelancer, 'client'=>$client]);
    }
    // clncle order for admin
    public function order_cancle($id){
      $single_order     =order::find($id);
      if($single_order->order_stutas ==0 ){
      $client_id        =$single_order->clid;
      $client_account   =User::find($client_id);
      $client_balance   = $client_account->balance;
      $client_update_balance =$client_balance+$single_order->client_pay;
      $client_account->update(['balance'          => $client_update_balance]);
      $single_order->update(['order_stutas'          => 2]);
        return redirect()->back()->with('success', 'Order Cancle successfully!');

    }else{
      return redirect()->back()->with('error', 'Order Can not Cancle Order already Completed Please Use Back Button !');  
    }
    }
    // order complete function
    public function order_complete($id){
      $single_order     =order::find($id);
      if($single_order->order_stutas ==0 ){
      $frelancer_id             =$single_order->frid;
      $frelancer_account        =User::find($frelancer_id);
      $admin_account            =User::find(1);
      $admin_balance            = $admin_account->balance;
      $admin_update_balance     = $admin_balance+$single_order->adminprofit;
      $frelancer_balance        = $frelancer_account->balance;
      $complete_update_balance =$frelancer_balance+$single_order->freelancer_pay;
      $frelancer_account->update(['balance'             => $complete_update_balance]);
      $admin_account->update(['balance'                 => $admin_update_balance]);
      $single_order->update(['order_stutas'             => 1]);
        return redirect()->back()->with('success', 'Order Complete successfully!');

    }else{
      return redirect()->back()->with('error', 'Order Can not Complete Order already Completed Please Use Back Button !');  
    }
    }
    // order back function
    public function order_back($id){
      $single_order     =order::find($id);
      if($single_order->order_stutas ==1 ){
      $frelancer_id                     =$single_order->frid;
      $frelancer_account                =User::find($frelancer_id);
      $admin_account                    =User::find(1);
      $admin_balance                    = $admin_account->balance;
      $admin_update_balance             = $admin_balance-$single_order->adminprofit;
      $frelancer_balance                = $frelancer_account->balance;
      $complete_update_balance          =$frelancer_balance-$single_order->freelancer_pay;
      $client_id                        =$single_order->clid;
      $client_account                   =User::find($client_id);
      $client_balance                   = $client_account->balance;
      $client_update_balance            =$client_balance+$single_order->client_pay;
      $client_account->update(['balance'          => $client_update_balance]);
      $frelancer_account->update(['balance'             => $complete_update_balance]);
      $admin_account->update(['balance'                 => $admin_update_balance]);
      $single_order->update(['order_stutas'             => 3]);
        return redirect()->back()->with('success', 'Order Back successfully!');

    }else{
      return redirect()->back()->with('error', 'Order Can not Complete Order already Completed Please Use Back Button !');  
    }
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
    public function destroy($id)
    {
        $single_order   =order::find($id);
        if (!$single_order) {
            return redirect()->back()->with('error', 'Service not found.');
        }
        // delete user
        $single_order->delete();

        return redirect()->back()->with('success', 'Service deleted successfully.');
    }
}
