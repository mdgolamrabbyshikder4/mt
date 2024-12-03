<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FindPartner;

class FindPartnerControllerClientView extends Controller
{
    // Display all partner posts with pagination
    public function index()
    {
        $searchRoute = route('search_find_partner_client_view.search_find_partner_client_view');
        $partners = FindPartner::paginate(20); // Change the number per page if needed
        return view('client.all-partner-post', compact('partners', 'searchRoute'));

    }

    // Display a single partner post
    public function show($id)
    {
        $searchRoute = route('search_find_partner_client_view.search_find_partner_client_view');
        $partner = FindPartner::findOrFail($id);
        return view('client.single-partner-show', compact('partner', 'searchRoute'));
    }
}
