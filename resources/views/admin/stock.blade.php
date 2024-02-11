@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row w-100">
        <div class="col-lg-12 col-md-12 col-12">
        @if($products->isEmpty())
            <h2 class="mb-2 text-center">Stocks is empty</h2>
        @else
            <h2 class="mb-2 text-center">Stocks</h2>
            <div class="d-flex justify-content-end mt-5">
                <a href="{{ route('stock.add') }}" class="btn btn-danger">Add New</a>
            </div>
            <table id="shoppingCart" class="table table-condensed table-responsive mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th style="width:20%">Product</th>
                        <th style="width:7%">Price</th>
                        <th style="width:9%">Image</th>
                        <th style="width:10%">Description</th>
                        <th style="width:10%">Quantity</th>
                        <th>Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td data-th="Price">{{ $product->price }}</td>
                        <td data-th="Image">{{ Str::limit($product->image, 50, '...') }}</td>
                        <td data-th="Description">{{ $product->description }}</td>
                        <td data-th="Quantity">{{ $product->quantity }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td><a href="{{ route('stock.update', ['product_id' => $product->id]) }}" class="btn btn-sm btn-primary">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination d-flex justify-content-center mt-3">
                {{ $products->links() }}
            </div>
        @endif
        </div>
    </div>
</div>
 @endsection