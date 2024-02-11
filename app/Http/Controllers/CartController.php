<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //cart list
        $userId = auth()->user()->id;
        //$data = Cart::where('id', $userId)->get();
        //print_r($userId);
        //die();   
        $cart_items = Cart::join('products as p', 'carts.product_id', '=', 'p.id')
        ->where('carts.user_id', $userId)
        ->where('carts.published', 1)
        ->select('carts.user_id', 'carts.id', 'carts.product_id', 'carts.quantity', 'p.name', 'p.price', 'p.image')
        ->get();

        return view('cart', compact('cart_items'));
    }
    
    public function notification()
    {
        //$userId = auth()->user()->id;
        $userId = Auth::user()->id;
 
        $cart_items = Cart::join('products as p', 'carts.product_id', '=', 'p.id')
        ->where('carts.user_id', $userId)
        ->where('carts.published', 1)
        ->select('carts.user_id', 'carts.id', 'carts.product_id', 'carts.quantity', 'p.name', 'p.price', 'p.image')
        ->get();

        $notification = count($cart_items);
        return $notification;

        //View::share('notification', $notification);
        //view()->share('notification', $notification);
        //return view('app', compact('notification'));
        //return view('/layouts/app')->with('notification', $notification);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //add to cart
        $userId = auth()->user()->id;
        $data = array_merge($request->all(), ['user_id' => $userId]);
        $item_id = $data['product_id'];

        $item = Cart::where('user_id', $userId)
        ->where('product_id', $item_id)
        ->where('published', 1)
        ->first();

        if($item)
        {
            //quantity column value + 1
            $item->update(['quantity' => $item->quantity + 1]);
        }
        else
        {
            Cart::create($data);
        }
        //Cart::create($data);
        //Cart::create($request->all());
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    /*public function update(Request $request, Cart $cart)
    {
        //update quantity value NOT DONE YET
        $itemId = $request->input('item_id');
        $quantity = $request->input('quantity');

        // Find the cart item by ID
        $cartItem = Cart::find($itemId);

        if ($cartItem) 
        {
            // Update the quantity
            $cartItem->quantity = $quantity;
            $cartItem->save();

            // Return a success response
            return response()->json(['message' => 'Quantity updated successfully'], 200);
        } else 
        {
            // Return an error response
            return response()->json(['error' => 'Item not found'], 404);
        }
    }*/

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($productId)
    {
        //delete item in cart
        $userId = auth()->user()->id;

        $item = Cart::where('user_id', $userId)
        ->where('product_id', $productId)
        ->first();

        if($item)
        {
            $item->delete();
            session()->flash('success', 'Cart item deleted successfully.');
        }
        else
        {
            session()->flash('error', 'Cart item not found or already deleted.');
        }
        return redirect()->route('cart.list');
    }

    public function checkout($checkoutId)
    {
        $userId = auth()->user()->id;

        if($userId == $checkoutId)
        {
            $items = Cart::where('user_id', $checkoutId)
            ->where('published', 1)
            ->get();

            foreach ($items as $item)
            {
                $item->update(['published' => 0]);

                $data = array_merge(['user_id' => $userId], ['product_id' => $item->product_id], ['quantity' => $item->quantity]);
                Order::create($data);

                //minus 1 of product here
                $product = Product::find($item->product_id);
                $product->update(['quantity' => $product->quantity - $item->quantity]);

            }
            echo "<script> alert('This assumes user has proceed to payment.'); window.location.href='/myCart/public/order'; </script>";
        }
        else
        {
            echo "<script> alert('An error has occured. Please try again later.'); window.location.href='/myCart/public/products'; </script>";
        }
    }
}
