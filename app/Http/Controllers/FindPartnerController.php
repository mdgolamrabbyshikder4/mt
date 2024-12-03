<?php

namespace App\Http\Controllers;

use App\Models\FindPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FindPartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display a listing of the resource
    public function index()
    {
        $partners = FindPartner::where('user_id', Auth::id())->get();
        return view('client.control.admin-mt.partnerfind.index', compact('partners'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('client.control.admin-mt.partnerfind.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'age' => 'required|integer',
            'profession' => 'required',
            'marital_status' => 'required',
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
            'contact_number' => 'required',
            'bio_data' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $bioDataPath = $request->file('bio_data') ? $request->file('bio_data')->store('bio_data', 'public') : null;
        $imagePath = $request->file('image') ? $request->file('image')->store('partner_images', 'public') : null;

        FindPartner::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'fathers_name' => $request->fathers_name,
            'mothers_name' => $request->mothers_name,
            'age' => $request->age,
            'profession' => $request->profession,
            'marital_status' => $request->marital_status,
            'title' => $request->title,
            'image' => $imagePath,
            'description' => $request->description,
            'contact_number' => $request->contact_number,
            'bio_data' => $bioDataPath,
            'find_type' => 0, // Default to before marriage
        ]);

        return redirect()->route('find_partner.index')->with('success', 'Partner created successfully.');
    }

    // Display the specified resource
    public function show(FindPartner $findPartner)
    {
        $userId = Auth::id();

        if ($findPartner->user_id !== $userId) {
            abort(403, 'Unauthorized action.');
        }
        return view('client.control.admin-mt.partnerfind.show', compact('findPartner'));
    }

    // Show the form for editing the specified resource
    public function edit(FindPartner $findPartner)
    {
        return view('client.control.admin-mt.partnerfind.edit', compact('findPartner'));
    }

    // Update the specified resource in storage
    public function update(Request $request, FindPartner $findPartner)
    {
        $request->validate([
            'name' => 'required',
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'age' => 'required|integer',
            'profession' => 'required',
            'marital_status' => 'required',
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
            'contact_number' => 'required',
            'bio_data' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($findPartner->image) {
                Storage::disk('public')->delete($findPartner->image);
            }
            $imagePath = $request->file('image')->store('partner_images', 'public');
        } else {
            $imagePath = $findPartner->image;
        }

        // Handle bio data upload
        if ($request->hasFile('bio_data')) {
            if ($findPartner->bio_data) {
                Storage::disk('public')->delete($findPartner->bio_data);
            }
            $bioDataPath = $request->file('bio_data')->store('bio_data', 'public');
        } else {
            $bioDataPath = $findPartner->bio_data;
        }

        $findPartner->update([
            'name' => $request->name,
            'fathers_name' => $request->fathers_name,
            'mothers_name' => $request->mothers_name,
            'age' => $request->age,
            'profession' => $request->profession,
            'marital_status' => $request->marital_status,
            'title' => $request->title,
            'image' => $imagePath,
            'description' => $request->description,
            'contact_number' => $request->contact_number,
            'bio_data' => $bioDataPath,
        ]);

        return redirect()->route('find_partner.index')->with('success', 'Partner updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(FindPartner $findPartner)
    {
        if ($findPartner->image) {
            Storage::disk('public')->delete($findPartner->image);
        }
        if ($findPartner->bio_data) {
            Storage::disk('public')->delete($findPartner->bio_data);
        }

        $findPartner->delete();

        return redirect()->route('find_partner.index')->with('success', 'Partner deleted successfully.');
    }

    // Mark the partner as married
    public function markAsMarried(FindPartner $findPartner)
    {
        $userId = Auth::id();

        if ($findPartner->user_id !== $userId) {
            abort(403, 'Unauthorized action.');
        }

        $findPartner->update(['find_type' => 1]); // After marriage
        return redirect()->route('find_partner.index')->with('success', 'Partner marked as married successfully.');
    }

    // Mark the partner as unmarried
    public function markAsUnmarried(FindPartner $findPartner)
    {
        $userId = Auth::id();

        if ($findPartner->user_id !== $userId) {
            abort(403, 'Unauthorized action.');
        }

        $findPartner->update(['find_type' => 0]); // Before marriage
        return redirect()->route('find_partner.index')->with('success', 'Partner marked as unmarried successfully.');
    }
}
