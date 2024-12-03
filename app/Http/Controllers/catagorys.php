<?php

namespace App\Http\Controllers;
use App\Models\catagory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class catagorys extends Controller
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
        $catagory = catagory::all();
        return view('admin-mt/catagory',['catagory'=>$catagory]);
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
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string',
            'type'    => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Catagory request Faild');
        }
         catagory::create([
            'name'        => $request['name'],
            'type'        => $request['type'],
        ]);;
          return redirect()->back()->with('success', 'Catagory Create Successsfully');
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
    public function edit($id)
    {
        $catagory = catagory::find($id);
        return view('admin-mt/catagory_edit',['catagory'=>$catagory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $catagory = catagory::find($id);
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string',
            'type'    => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Catagory request Faild');
        }
        $catagory->update(['name'          => $request->name]);
        $catagory->update(['type'          => $request->type]);
        return redirect()->back()->with('success', 'Catagory Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $catagory = catagory::find($id);
        if (!$catagory) {
            return redirect()->back()->with('error', 'Deposit not found.');
        }
        // delete user
        $catagory->delete();

        return redirect()->back()->with('success', 'Catagory deleted successfully.');
    }
    
}
