<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //order list
        $userId = auth()->user()->id;
        //$data = Cart::where('id', $userId)->get();
        //print_r($data);
        //die();   
        $order_items = Order::join('products as p', 'orders.product_id', '=', 'p.id')
        ->where('orders.user_id', $userId)
        ->select('orders.user_id', 'orders.status', 'orders.quantity', 'p.name', 'p.price', 'p.image')
        ->paginate(5);

        return view('order', compact('order_items'));
    }

    public function orderList()
    {
        $orders = Order::join('products as p', 'orders.product_id', '=', 'p.id')
        ->join('users as u', 'orders.user_id', '=', 'u.id')
        ->select('orders.id', 'orders.user_id', 'orders.status', 'orders.quantity', 'orders.updated_at', 'p.name', 'p.price', 'p.image', 'u.name as customer_name')
        ->paginate(10);
        return view('/admin/orderlist', compact('orders'));
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
        //save status
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //save status
        //Order::create($request->all());
        $itemId = $request->input('order_id');
        $status = $request->input('order_status');
        //dd($request->order_status);
        print_r($status);
        die();
        //$items = [];

        foreach ($itemId as $id) 
        {
            $row = Order::find($id);
            
            if ($row)
            {
                foreach ($status as $new_status)
                {
                    $row->update(['status'=> $new_status]);
                    print_r($row['status']);
                    die();
                }
            }
            else
            {
                print_r('id not found');
                die();
            }
        }
        echo "<script> alert('Changes applied successfully.'); window.location.href='/myCart/public/order/admin'; </script>";


        /*$orderItem = Order::find($itemId);

        if ($orderItem)
        {
            //$orderItem->status = $status;
            //$orderItem->save();
            $orderItem->update(['status' => $status]);
            //alert success or msg
            echo "<script> alert('Changes applied successfully.'); window.location.href='/myCart/admin/orderlist'; </script>";
        }
        else 
        {
            echo "<script> alert('An error has occured. Please try again later.'); window.location.href='/myCart/admin/orderlist'; </script>";
        }*/
    }
    public function updateStatus($orderId)
    {
        //
        $order = Order::where('id', $orderId)->first();

        if ($order)
        {
            $order->update(['status' => 'Shipped']);

            echo "<script> alert('Changes applied successfully.'); window.location.href='/myCart/public/order/admin'; </script>";
        }
        else
        {
            echo "<script> alert('Order not found.'); window.location.href='/myCart/public/order/admin'; </script>";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
