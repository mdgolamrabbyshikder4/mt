<?php
namespace App\Http\Controllers;
use App\Models\HomeMadeFoodSell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeMadeFoodSellController extends Controller
{
    // Show all food records
    public function index()
    {
        $foods = HomeMadeFoodSell::where('user_id', Auth::id())->get();
        return view('client.control.admin-mt.home-made-food-sell.index', compact('foods'));
    }
    // show single line
    public function show(HomeMadeFoodSell $homeMadeFoodSell)
{
    $userId = Auth::id();

        if ($homeMadeFoodSell->user_id !== $userId) {
            abort(403, 'Unauthorized action.');
        }
    return view('client.control.admin-mt.home-made-food-sell.show', compact('homeMadeFoodSell'));
}

    // Show form to create a new food item
    public function create()
    {
        return view('client.control.admin-mt.home-made-food-sell.create');
    }

    // Store the new food item in the database
    public function store(Request $request)
    {
        $request->validate([
            'food_name'         => 'required',
            'food_title'        => 'required',
            'food_description'  => 'required',
            'food_price'        => 'required|numeric',
            'food_delivery_cost'=> 'required|numeric',
            'food_quantity'     => 'required|integer',
            'food_location'     => 'required',
            'food_image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('food_image')) {
            $imagePath = $request->file('food_image')->store('food_images', 'public');
        }

        HomeMadeFoodSell::create([
            'user_id'           => Auth::id(),
            'food_name'         => $request->food_name,
            'food_title'        => $request->food_title,
            'food_description'  => $request->food_description,
            'food_price'        => $request->food_price,
            'food_delivery_cost'=> $request->food_delivery_cost,
            'food_quantity'     => $request->food_quantity,
            'food_approve_type' => 1, // Approved by default
            'food_location'     => $request->food_location,
            'food_image'        => $imagePath,
        ]);

        return redirect()->route('home-made-food-sell.index')->with('success', 'Food item added successfully');
    }

    // Show form to edit an existing food item
    public function edit(HomeMadeFoodSell $homeMadeFoodSell)
    {
        $userId = Auth::id();

        if ($homeMadeFoodSell->user_id !== $userId) {
            abort(403, 'Unauthorized action.');
        }
        return view('client.control.admin-mt.home-made-food-sell.edit', compact('homeMadeFoodSell'));
    }

    // Update the existing food item in the database
    public function update(Request $request, HomeMadeFoodSell $homeMadeFoodSell)
    {
        $userId = Auth::id();

        if ($homeMadeFoodSell->user_id !== $userId) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'food_name'         => 'required',
            'food_title'        => 'required',
            'food_description'  => 'required',
            'food_price'        => 'required|numeric',
            'food_delivery_cost'=> 'required|numeric',
            'food_quantity'     => 'required|integer',
            'food_location'     => 'required',
            'food_image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $homeMadeFoodSell->food_image;
        if ($request->hasFile('food_image')) {
            if ($homeMadeFoodSell->food_image) {
                \Storage::delete('public/' . $homeMadeFoodSell->food_image);
            }
            $imagePath = $request->file('food_image')->store('food_images', 'public');
        }

        $homeMadeFoodSell->update([
            'food_name'         => $request->food_name,
            'food_title'        => $request->food_title,
            'food_description'  => $request->food_description,
            'food_price'        => $request->food_price,
            'food_delivery_cost'=> $request->food_delivery_cost,
            'food_quantity'     => $request->food_quantity,
            'food_location'     => $request->food_location,
            'food_image'        => $imagePath,
            'food_approve_type' => $request->has('food_approve_type') ? 1 : 0, // Toggle approval
        ]);

        return redirect()->route('home-made-food-sell.index')->with('success', 'Food item updated successfully');
    }

    // Delete a food item from the database
    public function destroy(HomeMadeFoodSell $homeMadeFoodSell)
    {
         $userId = Auth::id();

        if ($homeMadeFoodSell->user_id !== $userId) {
            abort(403, 'Unauthorized action.');
        }
        if ($homeMadeFoodSell->food_image) {
            \Storage::delete('public/' . $homeMadeFoodSell->food_image);
        }

        $homeMadeFoodSell->delete();

        return redirect()->route('home-made-food-sell.index')->with('success', 'Food item deleted successfully');
    }
}
