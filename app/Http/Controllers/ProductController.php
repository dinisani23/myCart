<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }

    public function stock()
    {
        $products = Product::paginate(10);

        return view('/admin/stock', compact('products'));
    }

    public function stock_update($stockId)
    {
        $product= Product::where('id', $stockId)->first();
        return view('/admin/stock_update', compact('product'));
    }

    public function edit(Request $request, $stockId)
    {
        $stock = Product::where('id', $stockId)->first();

        $stock->fill($request->all());
        //$stock->type = 'admin';

        $stock->save();

        //return redirect()->route('admin.list');
        return redirect()->route('stock.list')->with('success', 'Stock updated successfully.');
    }

    public function addStock()
    {
        return view('/admin/stock_new');
    }

    public function store(Request $request)
    {
        //
        $data = $request->all();

        Product::create($data);

        session()->flash('success', 'New stock is added successfully.');

        return redirect()->route('stock.list');
    }

    public function destroy($stockId)
    {
        $stock = Product::where('id', $stockId)->first();

        if($stock)
        {
            $stock->delete();
            session()->flash('success', 'Product deleted successfully.');
        }
        else
        {
            session()->flash('error', 'Product not found or already deleted.');
        }
        return redirect()->route('stock.list');
    }
}
