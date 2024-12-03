<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class BuySellController extends Controller
{
    // Display all Buy & Sell posts
    public function index()
    {
        $searchRoute = route('search_product.search_product');
        $posts = Product::paginate(20); // Fetch all jobs // Fetch all buy & sell posts
        return view('client.all-product-show-client', compact('posts', 'searchRoute'));
    }

    // Show a single post
    public function show($id)
    {
        $searchRoute = route('search_product.search_product');
        $product        = Product::findOrFail($id); // Fetch single post
        return view('client.single-product-show', compact('product', 'searchRoute'));
    }

    // Order now
    public function orderNow($id, Request $request)
    {
        $order = new Order();
        $order->post_id = $id;
        $order->user_id = auth()->id();
        $order->status = 'Pending';
        $order->save();

        return redirect()->back()->with('success', 'Order placed successfully!');
    }

    // Mark order as complete
    public function orderComplete($id, Request $request)
    {
        $order = Order::where('post_id', $id)->where('user_id', auth()->id())->firstOrFail();
        $order->status = 'Completed';
        $order->save();

        return redirect()->back()->with('success', 'Order marked as completed!');
    }

    // Cancel order
    public function orderCancel($id, Request $request)
    {
        $order = Order::where('post_id', $id)->where('user_id', auth()->id())->firstOrFail();
        $order->status = 'Cancelled';
        $order->save();

        return redirect()->back()->with('success', 'Order cancelled successfully!');
    }
}

