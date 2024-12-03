<?php

namespace App\Http\Controllers;
use App\Models\order;
use Illuminate\Support\Facades\DB;
use App\Models\service;
use App\Models\User;
use Illuminate\Http\Request;

class globalDataSend extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $searchRoute = route('search_searvice.search_searvice');
        $all_Service = service::paginate(20);
        return view('client/index', compact('all_Service', 'searchRoute'));
    }
    // single service
    public function Single_service($id){
        $searchRoute = route('search_searvice.search_searvice');
        $services           = service::find($id);
        $frelancer_info     = User::find($services->user_id);
        return view('client/single_service_view',compact('services', 'searchRoute'));
    }

     // client order count
    public function count_order($id){
    $all_ord = DB::table('orders')->where('frid', $id)->where('order_stutas', 0)->count();
     return $all_ord;
     //response()->json(['count' => $order_count]);
    }
    public function notif_order(){
        return 'ok ok ok';
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
