<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class clientOrder extends Controller
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
        $user               = auth()->user();
        $user_id = $user->id;
        $order = order::where('orderprice', '>', '10')->where('frid', $user_id)
              ->orWhere('clid', $user_id)->get();
              return view('client.control.admin-mt.order_list', ['order'=> $order]);
}
 public function custom_order($id){
        return view('client/control/admin-mt/custom_order', ['id'=> $id]);
    }
    // order place function
    public function custom_order_store(Request $request, $id){
            $services_find = service::find($id);
            $validator = Validator::make($request->all(), [
            'order_discripton'          => ['required', 'string', 'max:255'],
            'order_price'               => ['required', 'string', ],
            'order_date'                => ['required', 'string', ],
            'order_img'                 => ['required|image|mimes:jpeg,png,jpg,gif|max:200',],
        ]);
            $date = date('Y-m-d H:i:s');
            $time = date('H:i:s');
            $user                       = auth()->user();
            $client_balance             = $user->balance;
            $client_pay_for_work        = ($request->order_price/100)*120;
            $freelancer_pay_for_work    = ($request->order_price/100)*80;
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
                'orderprice'                        => $request->order_price,
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
// order complete client
    // order complete function
    public function order_complete($id){
      $single_order     =order::find($id);
      $user               = auth()->user();
      $user_id = $user->id;
      if($single_order->order_stutas ==7 ){
      if($user->id == $single_order->clid and $single_order->accetp_req =='f1'){
      $frelancer_id             =$single_order->frid;
      $frelancer_account        =User::find($frelancer_id);
      $admin_account            =User::find(1);
      $admin_balance            = $admin_account->balance;
      $admin_update_balance     = $admin_balance+$single_order->adminprofit;
      $frelancer_balance        = $frelancer_account->balance;
      $complete_update_balance  =$frelancer_balance+$single_order->freelancer_pay;
      $frelancer_account->update(['balance'             => $complete_update_balance]);
      $admin_account->update(['balance'                 => $admin_update_balance]);
      $single_order->update(['order_stutas'             => 1]);
        return redirect()->back()->with('success', 'Order Complete successfully!');
     }else{
        return redirect()->back()->with('error', 'You can not Complete This order. Please Contact Support');
     }

    }else{
      return redirect()->back()->with('error', 'Order is already complete');  
    }
    }
    // order cancle request client
    public function order_cancle($id){
        $single_order     =order::find($id);
        $user               = auth()->user();
        $user_id = $user->id;
        if($user->id == $single_order->clid and $single_order->order_stutas ==1 or $single_order->order_stutas ==4){
        $single_order->update(['cansel_req'                  => 'c1']);
        $single_order->update(['order_stutas'                => '3']);
        return redirect()->back()->with('success', 'Order Cancle Request successfully!');
   }else{
        return redirect()->back()->with('error', 'You Can Not Send Order Cancle Request');
   }

    }
    // order cancle request Frelancer
    public function cancle_order_freelancer($id){
        $single_order     =order::find($id);
        $user               = auth()->user();
        $user_id = $user->id;
        if($user->id == $single_order->frid and $single_order->order_stutas ==0 or $single_order->order_stutas ==4){
        $single_order->update(['cansel_req'                  => 'f1']);
        $single_order->update(['order_stutas'                => '3']);
        return redirect()->back()->with('success', 'Order Cancle Request successfully!');
   }else{
        return redirect()->back()->with('error', 'You Can Not Send Order Cancle Request');
   }

    }
   // freelancer cancle request reject
    public function order_cancle_request_reject_fr($id){
        $single_order     =order::find($id);
        $user               = auth()->user();
        $user_id = $user->id;
        if($user->id == $single_order->frid and $single_order->order_stutas ==3){
        $single_order->update(['order_stutas'                => 4]);
        return redirect()->back()->with('success', 'Order Cancle Request Reject successfully!');
   }else{
        return redirect()->back()->with('error', 'You Can Not Reject Cancle Request');
   }
    }
    // accept cancle request frelancer
    public function order_cancle_request_accept_fr($id){
        $single_order     =order::find($id);
        $user               = auth()->user();
        $user_id = $user->id;
      if($single_order->order_stutas ==3 and $single_order->frid ==  $user_id and $single_order->cansel_req == 'c1'){
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
      $client_account->update(['balance'                => $client_update_balance]);
      $frelancer_account->update(['balance'             => $complete_update_balance]);
      $admin_account->update(['balance'                 => $admin_update_balance]);
      $single_order->update(['order_stutas'             => 2]);
        return redirect()->back()->with('success', 'Order Cancle successfully!');

    }else{
      return redirect()->back()->with('error', 'Order Can not Cancle Order already Completed Please Use Back Button !');  
    }
    }
 
 // freelancer cancle request reject
    public function order_cancle_request_reject_cl($id){
        $single_order     =order::find($id);
        $user               = auth()->user();
        $user_id = $user->id;
        if($user->id == $single_order->clid and $single_order->order_stutas ==3 and $single_order->cansel_req == 'f1'){
        $single_order->update(['order_stutas'                => 4]);
        $single_order->update(['cansel_req'                 => 'c1']);
        return redirect()->back()->with('success', 'Order Cancle Request Reject successfully!');
   }else{
        return redirect()->back()->with('error', 'You Can Not Reject Cancle Request');
   }
    }
    // accept cancle request frelancer
    public function order_cancle_request_accept_cl($id){
      $single_order     =order::find($id);
      $single_order     =order::find($id);
        $user               = auth()->user();
        $user_id = $user->id;
      if($single_order->order_stutas ==3 and $single_order->clid ==  $user_id and $single_order->cansel_req == 'f1'){
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
      $single_order->update(['order_stutas'             => 2]);
        return redirect()->back()->with('success', 'Order Cancle successfully!');

    }else{
      return redirect()->back()->with('error', 'Order Can not Cancle Order already Completed Please Contact Admin');  
    }
    }
 
    public function show(string $id)
    {
        $single_order   =order::find($id);
        $frelancer      = User::find($single_order->frid);
        $client         = User::find($single_order->clid);
        return view('client.control.admin-mt.single_order', ['single_order'=> $single_order, 'frelancer'=> $frelancer, 'client'=>$client]);
    }


 

    public function destroy(string $id)
    {
        //
    }
      
}

