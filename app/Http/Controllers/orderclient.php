<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\service;
use App\Models\User;
class orderclient extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    // custom order function
    public function orderClientall($id){
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
                'order_stutas'                      => 0,
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
