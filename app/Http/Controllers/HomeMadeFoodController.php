<?php
namespace App\Http\Controllers;

use App\Models\HomeMadeFoodSell;
use Illuminate\Http\Request;

class HomeMadeFoodController extends Controller
{
    public function index()
    {
        $searchRoute = route('search_home_made_food_sell.search_home_made_food_sell');
        // Retrieve all food items with pagination
        $foods = HomeMadeFoodSell::where('food_approve_type', 1)->paginate(20);
        return view('client.all_home_made_food', compact('foods', 'searchRoute'));
    }

    public function show($id)
    {
        $searchRoute = route('search_home_made_food_sell.search_home_made_food_sell');
        // Retrieve single food item by ID
        $food = HomeMadeFoodSell::findOrFail($id);
        return view('client.single_home_made_food', compact('food', 'searchRoute'));
    }
}
