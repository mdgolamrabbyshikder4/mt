<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\service;
use App\Models\AddClickEarn;
use App\Models\JobPost;
use App\Models\Product;
use App\Models\HomeMadeFoodSell;
use App\Models\our_service;
use App\Models\FindPartner;
use App\Models\SearchHistory;
class search extends Controller
{
    public function search_searvice(Request $search_data){
        $searchRoute = route('search_searvice.search_searvice');
        // Get search query from the request
        $keyword = $search_data->input('search_data');
        // Query the service model to search in both title and description
        $all_Service = service::where(function($query) use ($keyword) {
                        $query->where('title', 'LIKE', "%{$keyword}%")->where('tag', 'LIKE', "%{$keyword}%")
                              ->orWhere('description', 'LIKE', "%{$keyword}%");
                    })->paginate(20);
        $search_data->validate([
        'search_data' => 'required|string|max:255',
    ]);

        // Store the search hestory
        SearchHistory::create(array_merge($search_data->all(), ['user_id' => auth()->id()]));

        return view('client/index', compact('all_Service', 'searchRoute'));
    } 

    public function search_click_earn(Request $search_data){
        $searchRoute = route('search_click_earn.search_click_earn');
        // Get search query from the request
        $keyword = $service_search->input('search_data');
        // Query the service model to search in both title and description
        $clickEarns = AddClickEarn::where(function($query) use ($keyword) {
                        $query->where('title', 'LIKE', "%{$keyword}%")
                              ->orWhere('description', 'LIKE', "%{$keyword}%");
                    })->paginate(20);
        $search_data->validate([
        'search_data' => 'required|string|max:255',
    ]);

        // Store the search hestory
        SearchHistory::create(array_merge($search_data->all(), ['user_id' => auth()->id()]));
        return view('client.all_click_earn', compact('clickEarns', 'searchRoute'));
    }

    public function search_job_post(Request $search_data){
        $searchRoute = route('search_job_post.search_job_post');
        // Get search query from the request
        $keyword = $search_data->input('search_data');
        // Query the service model to search in both title and description
        $jobs = JobPost::where(function($query) use ($keyword) {
                        $query->where('job_title', 'LIKE', "%{$keyword}%")
                              ->orWhere('description', 'LIKE', "%{$keyword}%");
                    })->paginate(20);
        $search_data->validate([
        'search_data' => 'required|string|max:255',
    ]);

        // Store the search hestory
        SearchHistory::create(array_merge($search_data->all(), ['user_id' => auth()->id()]));
        return view('client.all-job', compact('jobs', 'searchRoute'));
    }
    public function search_product(Request $search_data){
        $searchRoute = route('search_product.search_product');
        // Get search query from the request
        $keyword = $search_data->input('search_data');
        // Query the service model to search in both title and description
        $posts = Product::where(function($query) use ($keyword) {
                        $query->where('title', 'LIKE', "%{$keyword}%")->orWhere('product_name', 'LIKE', "%{$keyword}%")
                              ->orWhere('description', 'LIKE', "%{$keyword}%");
                    })->paginate(20);
        $search_data->validate([
        'search_data' => 'required|string|max:255',
    ]);

        // Store the search hestory
        SearchHistory::create(array_merge($search_data->all(), ['user_id' => auth()->id()]));
        return view('client.all-product-show-client', compact('posts', 'searchRoute'));
    }
    public function search_home_made_food_sell(Request $search_data){
        $searchRoute = route('search_home_made_food_sell.search_home_made_food_sell');
        // Get search query from the request
        $keyword = $search_data->input('search_data');
        // Query the service model to search in both title and description
        $foods = HomeMadeFoodSell::where(function($query) use ($keyword) {
                        $query->where('food_title', 'LIKE', "%{$keyword}%")->orWhere('food_name', 'LIKE', "%{$keyword}%")
                              ->orWhere('food_description', 'LIKE', "%{$keyword}%");
                    })->paginate(20);
        $search_data->validate([
        'search_data' => 'required|string|max:255',
    ]);

        // Store the search hestory
        SearchHistory::create(array_merge($search_data->all(), ['user_id' => auth()->id()]));
        return view('client.all_home_made_food', compact('foods', 'searchRoute'));
    }   
    public function search_our_service_client_view(Request $search_data){
        $searchRoute = route('search_home_made_food_sell.search_home_made_food_sell');
        // Get search query from the request
        $keyword = $search_data->input('search_data');
        // Query the service model to search in both title and description
        $foods = our_service::where(function($query) use ($keyword) {
                        $query->where('title', 'LIKE', "%{$keyword}%")
                              ->orWhere('description', 'LIKE', "%{$keyword}%");
                    })->paginate(20);
        $search_data->validate([
        'search_data' => 'required|string|max:255',
    ]);

        // Store the search hestory
        SearchHistory::create(array_merge($search_data->all(), ['user_id' => auth()->id()]));
        return view('client.our_service_client_view', compact('foods', 'searchRoute'));
    }
        public function search_find_partner_client_view(Request $search_data){
        $searchRoute = route('search_find_partner_client_view.search_find_partner_client_view');
        // Get search query from the request
        $keyword = $search_data->input('search_data');
        // Query the service model to search in both title and description
        $partners = FindPartner::where(function($query) use ($keyword) {
                        $query->where('title', 'LIKE', "%{$keyword}%")
                              ->orWhere('description', 'LIKE', "%{$keyword}%");
                    })->paginate(20);
        $search_data->validate([
        'search_data' => 'required|string|max:255',
    ]);

        // Store the search hestory
        SearchHistory::create(array_merge($search_data->all(), ['user_id' => auth()->id()]));
        return view('client.all-partner-post', compact('partners', 'searchRoute'));
    }
}
