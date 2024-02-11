@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row w-100">
        <div class="col-lg-12 col-md-12 col-12">
        @if($order_items->isEmpty())
            <h2 class="mb-2 text-center">Your order is empty</h2>
        @else
            <h2 class="mb-2 text-center">Your Orders</h2>
            <table id="shoppingCart" class="table table-condensed table-responsive mt-5">
                <thead>
                    <tr>
                        <th style="width:60%">Product</th>
                        <th style="width:12%">Price</th>
                        <th style="width:10%">Quantity</th>
                        <th style="width:10%">Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($order_items as $item)
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-md-3 text-left">
                                    <img src="{{ url($item->image) }}" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                </div>
                                <div class="col-md-9 text-left mt-sm-2">
                                    <h5>{{ $item->name }}</h5>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $item->price * $item->quantity }}</td>
                        <td data-th="Quantity">{{ $item->quantity }}</td>
                        <td data-th="Status">{{ $item->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination d-flex justify-content-center mt-3">
                {{ $order_items->links() }}
            </div>
        @endif
        </div>
    </div>
</div>
 @endsection