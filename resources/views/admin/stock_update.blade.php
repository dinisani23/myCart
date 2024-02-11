@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col mt-1">{{ __('Update ') }}{{ $product->name }}</div>
                        <div class="col-auto">
                            <a href="{{ route('stock.delete', ['product_id' => $product->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('stock.edit', ['product_id' => $product->id]) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $product->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">Price</label>
                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ $product->price }}" required autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">Image URL/Directory</label>
                            <div class="col-md-6">
                                <input id="image" type="text" class="form-control" name="image" value="{{ $product->image }}" required autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $product->description }}" required autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="quantity" class="col-md-4 col-form-label text-md-end">Quantity</label>
                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control" name="quantity" value="{{ $product->quantity }}" required autofocus>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
