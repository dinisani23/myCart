@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row w-100">
        <div class="col-lg-12 col-md-12 col-12">
        @if($orders->isEmpty())
            <h2 class="mb-2 text-center">Order List is empty</h2>
        @else
            <h2 class="mb-2 text-center">Order List</h2>
            <table id="shoppingCart" class="table table-condensed table-responsive mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th style="width:30%">Product</th>
                        <th style="width:12%">Price</th>
                        <th style="width:10%">Quantity</th>
                        <th style="width:10%">Status</th>
                        <th>Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($orders as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->customer_name }}</td>
                        <td data-th="Product">{{ $item->name }}</td>
                        <td data-th="Price">${{ $item->price * $item->quantity }}</td>
                        <td data-th="Quantity">{{ $item->quantity }}</td>
                        <td data-th="Status">
                            <a type="button" class="toggleButton btn btn-outline-primary" href="{{ route('order.status', ['order_id' => $item->id]) }}">{{ $item->status }}</a>
                        </td>
                        <td>{{ $item->updated_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination d-flex justify-content-center mt-3">
                {{ $orders->links() }}
            </div>
        @endif
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() 
    {
        var buttons = document.querySelectorAll('.toggleButton');
        
        buttons.forEach(function(button) {
            if (button.textContent === "Shipped") {
                //button.disabled = true;
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                });
                button.classList.remove('btn-outline-primary'); // Remove the old class
                button.classList.add('btn', 'btn-success');
            }
            else {
                var originalText = button.textContent; // Store the original text
                var newText = 'Shipped'; // Define the text to change when hovering
            
                // Event listener for mouseover
                button.addEventListener('mouseover', function() {
                    button.textContent = newText; // Change the text on hover
                });
                
                // Event listener for mouseout
                button.addEventListener('mouseout', function() {
                    button.textContent = originalText; // Restore the original text
                });
            }
        });
    });
</script>
 @endsection