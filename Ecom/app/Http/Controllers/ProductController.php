<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'quantity' => 'sometimes|nullable|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = new Product;
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        if (isset($validatedData['quantity'])) {
            $product->quantity = $validatedData['quantity'];
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public');
            $filename = basename($path);
            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'quantity' => 'nullable|numeric|min:0',
        'image' => 'nullable|image|max:2048',
    ]);

    $product->name = $validatedData['name'];
    $product->description = $validatedData['description'];
    $product->price = $validatedData['price'];
    
    if (isset($validatedData['quantity'])) {
        $product->quantity = $validatedData['quantity'];
    }

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('public');
        $filename = basename($path);
        $product->image = $filename;
    }

    $product->save();

    return redirect()->route('products.index')->with('success', 'Product updated successfully!');
}


public function destroy($id)
{
Product::destroy($id);

return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
}

public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => $request->input('quantity'),
                    "price" => $product->price,
                    "image" => $product->image
                ]
            ];
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->input('quantity');
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product quantity updated successfully!');
        }

        $cart[$id] = [
            "name" => $product->name,
            "quantity" => $request->input('quantity'),
            "price" => $product->price,
            "image" => $product->image
        ];
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    public function clearCart()
    {
        session()->forget('cart');

        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }
}









    