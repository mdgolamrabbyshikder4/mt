<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\our_service;

class OurServiceClient extends Controller
{
    // Display all services with pagination
    public function index()
    {
        $searchRoute = route('search_our_service_client_view.search_our_service_client_view');
        // Paginate the results
        $services = our_service::paginate(6); // Change number of items per page as needed
        return view('client.our_service_client_view', compact('services', 'searchRoute'));
    }

    // Display a single service
    public function show($id)
    {
        $searchRoute = route('search_product.search_product');
        $service = OurService::findOrFail($id);
        return view('our_services.show', compact('service', 'searchRoute'));
    }
}