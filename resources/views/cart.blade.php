@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<div class="container">
    <div class="row w-100">
        <div class="col-lg-12 col-md-12 col-12">
        @if($cart_items->isEmpty())
            <h2 class="mb-2 text-center">Your cart is empty</h2>
        @else
            <h2 class="mb-2 text-center">Shopping Cart</h2>
            <table id="shoppingCart" class="table table-condensed table-responsive mt-5">
                <thead>
                    <tr>
                        <th style="width:60%">Product</th>
                        <th style="width:12%">Price</th>
                        <th style="width:10%">Quantity</th>
                        <th style="width:16%"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($cart_items as $item)
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
                        <td id="itemPrice" data-th="Price">${{ $item->price * $item->quantity }}</td>
                        <td data-th="Quantity">{{ $item->quantity }}</td>
                        <td class="actions" data-th="">
                            <div class="text-right">
                                <a class="btn btn-danger btn-md mx-2" href="{{ route('cart.delete', ['product_id' => $item->product_id]) }}"><i class="bi bi-trash3"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right text-right">
                <h4 class="mt-2" id="totalPrice"></h4>
                <a href="{{ route('cart.checkout', ['user_id' => auth()->user()->id]) }}" class="btn btn-success mt-3 btn-md pl-5 pr-5">Checkout</a>
            </div>
        @endif
        </div>
    </div>
</div>

<script>
    function calculateTotalPrice() 
    {
        var itemPriceElements = document.querySelectorAll('#itemPrice');

        var totalPrice = 0;

        itemPriceElements.forEach(function(itemPriceElement) 
        {
            var price = parseFloat(itemPriceElement.textContent.replace('$', ''));

            totalPrice += price;
        });

        return totalPrice;
    }

    var total = calculateTotalPrice();

    var totalPriceElement = document.getElementById('totalPrice');

    totalPriceElement.textContent = 'Subtotal: $' + total; // Display the total price with two decimal places
</script>
 @endsection