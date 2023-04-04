<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
{
    $cart = session()->get('cart');
    return view('cart.index', compact('cart'));
    $cart = session('cart', []);

    return view('checkout.index', ['cart' => $cart]);
}

public function update(Request $request, $id)
{
    $cart = session()->get('cart');

    if (isset($cart[$id])) {
        $cart[$id]['quantity'] = $request->quantity;
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Cart updated successfully');
    }

    return redirect()->back()->with('error', 'Item not found in cart');
}

public function remove($id)
{
    $cart = session()->get('cart');

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Item removed successfully');
    }

    return redirect()->back()->with('error', 'Item not found in cart');
}

public function Checkout()
{
    // Get the current cart items from session
    $cartItems = session('cart', []);

    // Calculate the total price of all cart items
    $totalPrice = collect($cartItems)->sum(function ($item) {
        return $item['price'] * $item['quantity'];
    });

    // Render the checkout page with cart items and total price
    return view('cart.checkout', compact('cartItems', 'totalPrice'));
}

public function store(Request $request)
    {
        // Process the checkout and save the order to the database
        // You can access the cart data from the $request object
        // and use it to create the order

        // Clear the cart after the checkout is completed
        session()->forget('cart');

        // Redirect the user to a thank-you page
        return redirect()->route('thankyou');
    }
}


