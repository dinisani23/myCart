@extends('layouts.app')

@section('content')
    <div class="container-md">
        <h3>Our Products</h3>
        <div class="container overflow-hidden text-center p-3">
            <div class="row g-5">
                @foreach ($products as $product)
                <div class="col">
                    <img src="{{ url($product->image) }}" alt="" style="width: 300px; height: 420px;">
                    <div class="p-3">
                        <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                        <h4 class="text-gray-700 uppercase">{{ $product->description }}</h4>
                        <span class="mt-2 text-gray-500">${{ $product->price }}</span>
                        @if (Auth::check() && Auth::user()->type === 'customer')
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            <input type="hidden" value="1" name="quantity">
                            <button class="px-4 py-1.5 btn btn-success" {{ empty($product->quantity) ? 'disabled' : '' }}>Add To Cart</button>
                        </form>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>  
@endsection

