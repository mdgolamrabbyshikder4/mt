<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\service;
use App\Models\catagory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class serviceCreate extends Controller
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
        $user               = auth()->user();
        $user_id            = $user->id;
        $service_list           = DB::table('services')->where('user_id', '=', $user_id)->get();
        return view('client/control/admin-mt/service_list',['service_list' => $service_list]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $catagory = DB::table('catagories')->where('type', '=', 1)->get();


        return view('client/control/admin-mt/service_create',['catagory'=> $catagory]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $data)
    {
       $validator = Validator::make($data->all(), [
            'title'                         => ['required', 'string', 'max:255'],
            'catagory'                      => ['required', 'string', ],
            'tag'                           => ['required', 'string', ],
            'firstpakagetitle'              => ['required', 'string', ],
            'firstpakageprice'              => ['required', 'string', ],
            'secendpakagetitle'             => ['required', 'string', ],
            'secondpakageprice'             => ['required', 'string', ],
            'thirdpakagetitle'              => ['required', 'string', ],
            'sthirdpakageprice'             => ['required', 'string', ],
            'discription'                   => ['required', 'string', ],
            'reqerment'                     => ['required', 'string', ],
            'img'                           => 'required|image|mimes:jpeg,png,jpg,gif|max:300',
        ]);
            $user               = auth()->user();
            $image              = $data->file('img');
            $imageName          = md5(rand().time()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        service::create([
            'title'                     => $data['title'],
            'catagory'                  => $data['catagory'],
            'description'               => $data['discription'],
            'img'                       => $imageName,
            'first_price'               => $data['firstpakageprice'],
            'second_price'              => $data['secondpakageprice'],
            'third_price'               => $data['sthirdpakageprice'],
            'first_title'               => $data['firstpakagetitle'],
            'second_title'              => $data['secendpakagetitle'],
            'third_title'               => $data['thirdpakagetitle'],
            'user_id'                   => $user->id,
            'rank'                      => 500,
            'review'                    => 0,
            'tag'                       => $data['tag'],
            'requirdfile'               => $data['reqerment'],
            'aproval'                   => 1,
        ]);
        return redirect()->back()->with('success', 'Service successfully!');

    }

    // show all service list

    public function service_list(){
        $user               = auth()->user();
        $user_id            = $user->id;
        $service_list           = DB::table('services')->where('user_id', '=', $user_id)->get();
        return view('client/control/admin-mt/service_list',['service_list' => $service_list]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user               = auth()->user();
        $user_id            = $user->id;
        $services           = DB::table('services')->where('user_id', '=', $user_id)->where('id', '=', $id)->get();
        return view('client/control/admin-mt/single_service',['services' => $services]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $catagory = DB::table('catagories')->where('type', '=', 1)->get();
        $user               = auth()->user();
        $user_id            = $user->id;
        $services           = DB::table('services')->where('user_id', '=', $user_id)->where('id', '=', $id)->first();
        return view('client/control/admin-mt/service_edit',['services' => $services, 'catagory' =>$catagory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::where('id', $id)
                  ->where('user_id', $user_id)
                  ->first(); // Find the service by id and user_id
        $user               = auth()->user();
        $user_id            = $user->id;
        $validator = Validator::make($request->all(), [
            'title'                         => ['required', 'string', 'max:255'],
            'catagory'                      => ['required', 'string', 'max:255'],
            'tag'                           => ['required', 'string', 'max:255'],
            'firstpakagetitle'              => ['required', 'string', 'max:255'],
            'firstpakageprice'              => ['required', 'string', 'max:255'],
            'secendpakagetitle'             => ['required', 'string', 'max:255'],
            'secondpakageprice'             => ['required', 'string', 'max:255'],
            'thirdpakagetitle'              => ['required', 'string', 'max:255'],
            'thirdpakageprice'              => ['required', 'string', 'max:255'],
            'discription'                   => ['required', 'string', 'max:1400'],
            'reqerment'                     => ['required', 'string', 'max:255'],
            'img'                           => ['required', 'string', 'max:255'],
        ]);
        

    if ($service) {
        if($request->newimg){
                $user               = auth()->user();
                $image              = $request->file('newimg');
                $imageName          = md5(rand().time()).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
            }else{
               $imageName=  $request->img;
            }

    // Update the service with the new data
    $service->update([
        'title'           => $request['title'],
        'catagory'        => $request['catagory'],
        'discription'     => $request['discription'],
        'img'             => $imageName, // Update with new or existing image
        'first_price'     => $request['firstpakageprice'],
        'second_price'    => $request['secondpakageprice'],
        'third_price'     => $request['thirdpakageprice'],
        'first_title'     => $request['firstpakagetitle'],
        'second_title'    => $request['secendpakagetitle'],
        'third_title'     => $request['thirdpakagetitle'],
        'tag'             => $request['tag'],
        'requirdfile'     => $request['reqerment'],
    ]);
    return redirect()->back()->with('success', 'Service updated successfully');
    } else {
       return redirect()->back()->with('error', 'Service Not Found');
    }


    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    $user = auth()->user();
    $user_id = $user->id;

    // Use the correct syntax for the query and retrieve the service
    $service = Service::where('id', $id)->where('user_id', $user_id)->first();

    if ($service) {
        $service->delete();
        return redirect()->back()->with('success', 'Service deleted successfully');
    } else {
        return redirect()->back()->with('error', 'Service not found');
    }
}

}
