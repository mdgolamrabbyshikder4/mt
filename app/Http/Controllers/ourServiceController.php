<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\our_service;
use Illuminate\Http\Request;

class ourServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
      
    }
    // Display a listing of the resource
    public function index()
    {
        $services = our_service::all();
        return view('admin-mt.our_services.index', compact('services'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('admin-mt.our_services.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'processing_time' => 'required|integer',
            'demo_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $service = new our_service();
        $service->user_id = auth()->id();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->processing_time = $request->processing_time;
        $service->cupon_code = $request->cupon_code;
        $service->cupon_discount = $request->cupon_discount;
        $service->demo_link = $request->demo_link;
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('our_servoce_images', 'public');
        }
        $service->image = $imageName;
        // if ($request->hasFile('image')) {
        //     $imageName = time().'.'.$request->image->extension();
        //     $request->image->move(public_path('images'), $imageName);
        //     $service->image = $imageName;
        // }

        $service->save();

        return redirect()->route('our_services.index')->with('success', 'Service created successfully');
    }

    // Display the specified resource
    public function show(our_service $our_service)
    {
        return view('admin-mt.our_services.show', compact('our_service'));
    }

    // Show the form for editing the specified resource
    public function edit(our_service $our_service)
    {
        return view('admin-mt.our_services.edit', compact('our_service'));
    }

    // Update the specified resource in storage
    public function update(Request $request, our_service $our_service)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'processing_time' => 'required|integer',
            'demo_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $our_service->title = $request->title;
        $our_service->description = $request->description;
        $our_service->price = $request->price;
        $our_service->processing_time = $request->processing_time;
        $our_service->cupon_code = $request->cupon_code;
        $our_service->cupon_discount = $request->cupon_discount;
        $our_service->demo_link = $request->demo_link;

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('our_servoce_images', 'public');
            $our_service->image = $imageName;
        }

        $our_service->save();

        return redirect()->route('our_services.index')->with('success', 'Service updated successfully');
    }

    // Remove the specified resource from storage
    public function destroy(our_service $our_service)
    {
        $our_service->delete();
        return redirect()->route('our_services.index')->with('success', 'Service deleted successfully');
    }
}
