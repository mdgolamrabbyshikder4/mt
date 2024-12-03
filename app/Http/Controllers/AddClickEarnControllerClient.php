<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AddClickEarn;

class AddClickEarnControllerClient extends Controller
{
    // Fetch all the posts and display them in the index view
    public function index()
    {
        $searchRoute = route('search_click_earn.search_click_earn');
        $clickEarns = AddClickEarn::where('work_approval', 1)
                                  ->where('work_suspand', 0)
                                  ->paginate(20);
        return view('client.all_click_earn', compact('clickEarns', 'searchRoute'));
    }

    // Fetch a single post and display it in the show view
    public function show($id)
    {
        $searchRoute = route('search_click_earn.search_click_earn');
        $clickEarn = AddClickEarn::findOrFail($id);
        return view('client.show_click_earn', compact('clickEarn','searchRoute'));
    }
}
