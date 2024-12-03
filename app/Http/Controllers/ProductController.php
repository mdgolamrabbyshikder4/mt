<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\catagory;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $products = Product::where('user_id',   auth()->id())->get();
        return view('client.control.admin-mt.product.index', compact('products'));
    } 
    /**
     * Product a listing of the resource.
     */
    // public function list()
    // {
    //     // $products = Product::all();
    //     // return view('client.control.admin-mt.product.list', compact('products'));
    //     echo "ok ok";
    // }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {

        $categories = catagory::where('type', 2)->get();
        return view('client.control.admin-mt.product.create', compact('categories'));
    }

    /**
     * Store a newly created product in the database.
     */
     /**
     * Store a newly created product in the database.
     */
   public function store(Request $request)
    {
        $request->validate([
            'product_name'          => 'required',
            'title'                 => 'required',
            'description'           => 'required',
            'price'                 => 'required|numeric',
            'contact_info'          => 'required',
            'location'              => 'required',
            'tag'                   => 'required',
            'category_id'           => 'required|exists:catagories,id',
            'image'                 => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        Product::create([
            'user_id'               => auth()->id(),
            'product_name'          => $request->product_name,
            'title'                 => $request->title,
            'description'           => $request->description,
            'image'                 => $imagePath,
            'price'                 => $request->price,
            'contact_info'          => $request->contact_info,
            'location'              => $request->location,
            'tag'                   => $request->tag,
            'category_id'           => $request->category_id,
            'sales_type'            => 0, // Default to not sold
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
         $userId = auth()->user()->id;

        // Check if the authenticated user is the owner of the product
        if ($product->user_id !== $userId) {
            abort(403, 'Unauthorized action.');
        }
        return view('client.control.admin-mt.product.show', compact('product'));
    }


    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $categories = catagory::where('type', 2)->get();
        $userId = auth()->user()->id;

        // Check if the authenticated user is the owner of the product
        if ($product->user_id !== $userId) {
            abort(403, 'Unauthorized action.');
        }
        return view('client.control.admin-mt.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product in the database.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'contact_info' => 'required',
            'location' => 'required',
            'category_id' => 'required|exists:catagories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            if ($product->image) {
               Storage::delete('public/' . $product->image);
            }
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        $product->update([
            'product_name' => $request->product_name,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'price' => $request->price,
            'contact_info' => $request->contact_info,
            'location' => $request->location,
            'category_id' => $request->category_id,
            'sales_type' => $request->has('sales_type') ? 1 : 0,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }


    /**
     * Remove the specified product from the database.
     */
    public function destroy(Product $product)
    {
        $userId = auth()->user()->id;

        // Check if the authenticated user is the owner of the product
        if ($product->user_id !== $userId) {
            abort(403, 'Unauthorized action.');
        }
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    /**
     * Mark the product as sold.
     */
    public function markAsSold(Product $product)
    {
        $userId = auth()->user()->id;

        // Check if the authenticated user is the owner of the product
        if ($product->user_id !== $userId) {
            abort(403, 'Unauthorized action.');
        }
        $product->update(['sales_type' => 1]); // Mark as sold

        return redirect()->route('products.index')->with('success', 'Product marked as sold');
    } 
    /**
     * Mark the product as In stock.
     */
    public function markAsInstock(Product $product)
    {
        $userId = auth()->user()->id;

        // Check if the authenticated user is the owner of the product
        if ($product->user_id !== $userId) {
            abort(403, 'Unauthorized action.');
        }
        $product->update(['sales_type' => 0]); // Mark as sold

        return redirect()->route('products.index')->with('success', 'Product marked as sold');
    }
}