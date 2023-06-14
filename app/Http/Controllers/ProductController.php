<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->query('search');

        $products = Product::when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        })->paginate(10);

        $query = Product::query();

        // Apply filters if provided
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
    
        if ($request->filled('type')) {
            $query->where('type', 'like', '%' . $request->input('type') . '%');
        }
    
        $products = $query->paginate(10);
    
    
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = auth()->user();
        $userID = $user->id; 
        //dd($userID);

        try {
        
            $product = Product::create([
                'user_id' => $userID, // Assign the user's ID to the 'user_id' column
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'size' => $request->input('size'),
                'price' => $request->input('price')
                // Add other product fields as needed
            ]);
        
            return redirect()->route('products.index')->with('success', 'Product added successfully.');


        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }

    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product=Product::findOrFail($id);
        return view('product.index',compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // edit products list page 
        return view('products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'size' => 'required',
            // Add validation rules for other product fields
        ]);
    
        $product->update($validatedData);
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // delete the resource for products 
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
