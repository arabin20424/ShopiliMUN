<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // READ: Display all available products
    
public function index(Request $request)
{
    $products = Product::with('user')
        ->where('status', 'Available')
        ->when($request->search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        })
        ->when($request->category, function ($query, $category) {
            $query->where('category', $category);
        })
        ->latest()
        ->paginate(9)
        ->withQueryString();

    return view('products', compact('products'));
}

    // Show the form for creating a product
    public function create()
    {
        return view('products-create');
    }

    // CREATE: Save a new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|in:Uniforms,Books,School Supplies,Other',
            'listing_type' => 'required|in:Sale,Rent',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('products', 'public');
        }

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'Available';

        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product posted successfully!');
    }

    // Show the edit form (owner only)
    public function edit($id)
    {
        $product = Product::where('user_id', Auth::id())
            ->findOrFail($id);

        return view('products-edit', compact('product'));
    }

    // UPDATE: Save changes to a product
    public function update(Request $request, $id)
    {
        $product = Product::where('user_id', Auth::id())
            ->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|in:Uniforms,Books,School Supplies,Other',
            'listing_type' => 'required|in:Sale,Rent',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $validated['image'] = $request->file('image')
                ->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully!');
    }

    // DELETE: Remove a product (owner only)
    public function destroy($id)
    {
        $product = Product::where('user_id', Auth::id())
            ->findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully!');
    }
}