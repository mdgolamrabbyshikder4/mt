<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\service;
class orderClientall extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
     public function order_freelancer_complete_request($id){
        $single_order           =order::find($id);
        $user                   = auth()->user();
        $user_id = $user->id;
        if($user->id == $single_order->frid and $single_order->order_stutas !=1){
        $single_order->update(['cansel_req'                  => 'f1']);
        $single_order->update(['order_stutas'                => '7']);
        return redirect()->back()->with('success', 'Complete Request successfully.');
    }else{
        return redirect()->back()->with('Error', 'This Order Can not Send Complete Request.');
    }
}


public function first_package_order($id){
        return view('client/control/admin-mt/first_package_order', ['id'=> $id]);
    }
    // order place function
    public function first_package_order_store(Request $request, $id){
       
            $services_find = service::find($id);
            $validator = Validator::make($request->all(), [
            'order_discripton'          => ['required', 'string', 'max:255'],
            'order_date'                => ['required', 'string', ],
            'order_img'                 => ['required|image|mimes:jpeg,png,jpg,gif|max:200',],
        ]);
            $date = date('Y-m-d H:i:s');
            $time = date('H:i:s');
            $user                       = auth()->user();
            $client_balance             = $user->balance;

            $client_pay_for_work        = ($services_find->first_price/100)*120;
            $freelancer_pay_for_work    = ($request->first_price/100)*80;
            $client_update_balance      = $client_balance-$client_pay_for_work;
            $admin_profit               =$client_pay_for_work-$freelancer_pay_for_work;
            $image          = $request->file('order_img');
            $imageName      = md5(rand().time()).'.'.$image->getClientOriginalExtension();

            if(!$validator){
                return redirect()->back()->with('error', 'Validation not found');
            }else{

                if($client_balance == $client_pay_for_work or $client_balance>$client_pay_for_work){
            
            if($image->getClientOriginalExtension()== 'jpg' or $image->getClientOriginalExtension()== 'jpeg' or $image->getClientOriginalExtension()== 'png'){
                $image->move(public_path('images'), $imageName);
            order::create([
                'img'                               => $imageName,
                'service_id'                        => $id,
                'service_review'                    => 0,
                'discription'                       => $request->order_discripton,
                'orderprice'                        => $services_find->first_price,
                'order_date'                        => $date,
                'order_time'                        => $time,
                'ending_order_date'                 => $request->order_date,
                'ending_order_time'                 => $request->order_date,
                'frid'                              => $services_find->user_id,
                'clid'                              => $user->id,
                'adminprofit'                       => $admin_profit,
                'client_pay'                        => $client_pay_for_work,
                'freelancer_pay'                    => $freelancer_pay_for_work,
                'order_stutas'                      => 1,
                'accetp_req'                        => 0,
                'cansel_req'                        => 0,
                ]);
                $user->balance     = $client_update_balance;
                $user->save();
                return redirect()->back()->with('success', 'Order Create success. Enjoy our service');
            }else{
                    return redirect()->back()->with('error', 'Your file is not image'); 
            }
            }else{
                 return redirect()->back()->with('error', 'You have not enought Blance');
            }

            }
    }
    public function index()
    {
        //
    }
    // secend package order function
public function second_package_order($id){
        return view('client/control/admin-mt/second_package_order', ['id'=> $id]);
    }
    // order place function
    public function second_package_order_store(Request $request, $id){
       
            $services_find = service::find($id);
            $validator = Validator::make($request->all(), [
            'order_discripton'          => ['required', 'string', 'max:255'],
            'order_date'                => ['required', 'string', ],
            'order_img'                 => ['required|image|mimes:jpeg,png,jpg,gif|max:200',],
        ]);
            $date = date('Y-m-d H:i:s');
            $time = date('H:i:s');
            $user                       = auth()->user();
            $client_balance             = $user->balance;

            $client_pay_for_work        = ($services_find->second_price/100)*120;
            $freelancer_pay_for_work    = ($request->second_price/100)*80;
            $client_update_balance      = $client_balance-$client_pay_for_work;
            $admin_profit               =$client_pay_for_work-$freelancer_pay_for_work;
            $image          = $request->file('order_img');
            $imageName      = md5(rand().time()).'.'.$image->getClientOriginalExtension();

            if(!$validator){
                return redirect()->back()->with('error', 'Validation not found');
            }else{

                if($client_balance == $client_pay_for_work or $client_balance>$client_pay_for_work){
            
            if($image->getClientOriginalExtension()== 'jpg' or $image->getClientOriginalExtension()== 'jpeg' or $image->getClientOriginalExtension()== 'png'){
                $image->move(public_path('images'), $imageName);
            order::create([
                'img'                               => $imageName,
                'service_id'                        => $id,
                'service_review'                    => 0,
                'discription'                       => $request->order_discripton,
                'orderprice'                        => $services_find->second_price,
                'order_date'                        => $date,
                'order_time'                        => $time,
                'ending_order_date'                 => $request->order_date,
                'ending_order_time'                 => $request->order_date,
                'frid'                              => $services_find->user_id,
                'clid'                              => $user->id,
                'adminprofit'                       => $admin_profit,
                'client_pay'                        => $client_pay_for_work,
                'freelancer_pay'                    => $freelancer_pay_for_work,
                'order_stutas'                      => 1,
                'accetp_req'                        => 0,
                'cansel_req'                        => 0,
                ]);
                $user->balance     = $client_update_balance;
                $user->save();
                return redirect()->back()->with('success', 'Order Create success. Enjoy our service');
            }else{
                    return redirect()->back()->with('error', 'Your file is not image'); 
            }
            }else{
                 return redirect()->back()->with('error', 'You have not enought Blance');
            }

            }
    }
        // third order function
        public function third_package_order($id){
        return view('client/control/admin-mt/third_package_order', ['id'=> $id]);
    }
    // order place function
        public function third_package_order_store(Request $request, $id){
       
            $services_find = service::find($id);
            $validator = Validator::make($request->all(), [
            'order_discripton'          => ['required', 'string', 'max:255'],
            'order_date'                => ['required', 'string', ],
            'order_img'                 => ['required|image|mimes:jpeg,png,jpg,gif|max:200',],
        ]);
            $date = date('Y-m-d H:i:s');
            $time = date('H:i:s');
            $user                       = auth()->user();
            $client_balance             = $user->balance;

            $client_pay_for_work        = ($services_find->third_price/100)*120;
            $freelancer_pay_for_work    = ($request->third_price/100)*80;
            $client_update_balance      = $client_balance-$client_pay_for_work;
            $admin_profit               =$client_pay_for_work-$freelancer_pay_for_work;
            $image          = $request->file('order_img');
            $imageName      = md5(rand().time()).'.'.$image->getClientOriginalExtension();

            if(!$validator){
                return redirect()->back()->with('error', 'Validation not found');
            }else{

                if($client_balance == $client_pay_for_work or $client_balance>$client_pay_for_work){
            
            if($image->getClientOriginalExtension()== 'jpg' or $image->getClientOriginalExtension()== 'jpeg' or $image->getClientOriginalExtension()== 'png'){
                $image->move(public_path('images'), $imageName);
            order::create([
                'img'                               => $imageName,
                'service_id'                        => $id,
                'service_review'                    => 0,
                'discription'                       => $request->order_discripton,
                'orderprice'                        => $services_find->third_price,
                'order_date'                        => $date,
                'order_time'                        => $time,
                'ending_order_date'                 => $request->order_date,
                'ending_order_time'                 => $request->order_date,
                'frid'                              => $services_find->user_id,
                'clid'                              => $user->id,
                'adminprofit'                       => $admin_profit,
                'client_pay'                        => $client_pay_for_work,
                'freelancer_pay'                    => $freelancer_pay_for_work,
                'order_stutas'                      => 1,
                'accetp_req'                        => 0,
                'cansel_req'                        => 0,
                ]);
                $user->balance     = $client_update_balance;
                $user->save();
                return redirect()->back()->with('success', 'Order Create success. Enjoy our service');
            }else{
                    return redirect()->back()->with('error', 'Your file is not image'); 
            }
            }else{
                 return redirect()->back()->with('error', 'You have not enought Blance');
            }

            }
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
        //
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
