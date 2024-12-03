<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\AddClickEarn;
use Illuminate\Support\Facades\Storage;

class AddClickEarnController extends Controller
{
    public function index()
{
    $click_earns = AddClickEarn::where('user_id',   auth()->id())->get();
    return view('client.control.admin-mt.add_click_earn.index', compact('click_earns'));
}

public function create()
{
    return view('client.control.admin-mt.add_click_earn.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'work_vacancy' => 'required|integer',
        'work_price' => 'required|numeric',
        'work_img' => 'nullable|image',
        'work_link' => 'required|url',
    ]);

    $imagePath = null;
    if ($request->hasFile('work_img')) {
        $imagePath = $request->file('work_img')->store('work_images', 'public');
    }
    $total_cost = $request->work_price*$request->work_vacancy;
    if(Auth::user()->balance > $total_cost){
        $user = Auth::user();
        $user->balance -= $total_cost;
        $user->save();
        $user_admin = User::find(1);
        $user_admin->balance += $total_cost;
        $user_admin->save();
        AddClickEarn::create([
        'user_id' => auth()->id(),
        'title' => $request->title,
        'description' => $request->description,
        'work_vacancy' => $request->work_vacancy,
        'work_price' => $request->work_price,
        'work_img' => $imagePath,
        'work_approval' => 1,
        'work_suspand' => 0,
        'work_link' => $request->work_link,
    ]);

    return redirect()->route('add_click_earn.index')->with('success', 'Work added successfully');
    }else{
    return redirect()->route('add_click_earn.index')->with('error', 'Low Balance');  
    }

}

public function show(AddClickEarn $addClickEarn)
{
    $userId = Auth::id();

        if ($addClickEarn->user_id !== $userId) {
            abort(403, 'Unauthorized action.');
        }
    return view('client.control.admin-mt.add_click_earn.show', compact('addClickEarn'));
}

public function edit(AddClickEarn $addClickEarn)
{
    $userId = Auth::id();

        if ($addClickEarn->user_id !== $userId) {
            abort(403, 'Unauthorized action.');
        }
    return view('client.control.admin-mt.add_click_earn.edit', compact('addClickEarn'));
}

public function update(Request $request, AddClickEarn $addClickEarn)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'work_vacancy' => 'required|integer',
        'work_price' => 'required|numeric',
        'work_img' => 'nullable|image',
        'work_link' => 'required|url',
    ]);

    $imagePath = $addClickEarn->work_img;
    if ($request->hasFile('work_img')) {
        if ($addClickEarn->work_img) {
            Storage::disk('public')->delete($addClickEarn->work_img);
        }
        $imagePath = $request->file('work_img')->store('work_images', 'public');
    }

    $addClickEarn->update([
        'title' => $request->title,
        'description' => $request->description,
        'work_vacancy' => $request->work_vacancy,
        'work_img' => $imagePath,
        'work_link' => $request->work_link,
    ]);

    return redirect()->route('add_click_earn.index')->with('success', 'Work updated successfully');
}

public function destroy(AddClickEarn $addClickEarn)
{
    $userId = Auth::id();

        if ($addClickEarn->user_id !== $userId) {
            abort(403, 'Unauthorized action.');
        }
        $update_balance = $addClickEarn->work_price*$addClickEarn->work_vacancy;
        $user = Auth::user();
        $user->balance += $update_balance;
        $user->save();
        $user_admin = User::find(1);
        $user_admin->balance -= $update_balance;
        $user_admin->save();
    if ($addClickEarn->work_img) {
        Storage::disk('public')->delete($addClickEarn->work_img);
    }

    $addClickEarn->delete();

    return redirect()->route('add_click_earn.index')->with('success', 'Work deleted successfully');
}

}
